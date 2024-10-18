package com.abdimas.bukasol.config;

import java.security.PrivateKey;
import java.security.interfaces.RSAPublicKey;
import java.util.Collection;

import org.springframework.context.annotation.Bean;
import org.springframework.context.annotation.Configuration;
import org.springframework.core.io.ClassPathResource;
import org.springframework.security.authentication.AuthenticationManager;
import org.springframework.security.config.annotation.authentication.configuration.AuthenticationConfiguration;
import org.springframework.security.config.annotation.web.builders.HttpSecurity;
import org.springframework.security.config.annotation.web.configuration.EnableWebSecurity;
import org.springframework.security.core.GrantedAuthority;
import org.springframework.security.crypto.bcrypt.BCryptPasswordEncoder;
import org.springframework.security.crypto.password.PasswordEncoder;
import org.springframework.security.oauth2.jwt.JwtDecoder;
import org.springframework.security.oauth2.jwt.JwtEncoder;
import org.springframework.security.oauth2.jwt.NimbusJwtDecoder;
import org.springframework.security.oauth2.jwt.NimbusJwtEncoder;
import org.springframework.security.oauth2.server.resource.authentication.JwtAuthenticationConverter;
import org.springframework.security.oauth2.server.resource.authentication.JwtGrantedAuthoritiesConverter;
import org.springframework.security.web.SecurityFilterChain;

import com.abdimas.bukasol.utils.PemUtils;
import com.nimbusds.jose.jwk.JWKSet;
import com.nimbusds.jose.jwk.RSAKey;
import com.nimbusds.jose.jwk.source.ImmutableJWKSet;
import com.nimbusds.jose.jwk.source.JWKSource;
import com.nimbusds.jose.proc.SecurityContext;

@Configuration
@EnableWebSecurity
public class SecurityConfig {

    @Bean
    public SecurityFilterChain securityFilterChain(HttpSecurity http) throws Exception {
        http
                .csrf(csrfCustomizer -> csrfCustomizer.disable()) // Disable CSRF
                .authorizeHttpRequests(authorizeRequests -> authorizeRequests
                        .requestMatchers(
                                "/api/v1/users/auth/login"
                                // "/api/v1/users/auth/register-admin"
                                )
                        .permitAll()
                        .requestMatchers(
                                "/api/v1/users/auth/register-admin",
                                "/api/v1/users/auth/register-teacher",
                                "/api/v1/users/auth/register-student",
                                "/api/v1/users/admin/**")
                        .hasAnyAuthority("SUPERADMIN", "ROLE_SUPERADMIN")
                        .requestMatchers(
                                "/api/v1/grades/teacher/**")
                        .hasAnyAuthority("TEACHER", "ROLE_TEACHER")
                        .requestMatchers(
                                "/api/v1/grades/student/**")
                        .hasAnyAuthority("STUDENT", "ROLE_STUDENT")
                        .anyRequest().authenticated() // Protect all other endpoints
                )
                .oauth2ResourceServer(oauth2 -> oauth2
                    .jwt(jwt -> jwt
                        .jwtAuthenticationConverter(jwtAuthenticationConverter())
                    )
                );

        return http.build();
    }

    @Bean
    public JwtAuthenticationConverter jwtAuthenticationConverter() {
        JwtGrantedAuthoritiesConverter jwtGrantedAuthoritiesConverter = new JwtGrantedAuthoritiesConverter();
        jwtGrantedAuthoritiesConverter.setAuthoritiesClaimName("roles"); // Use "roles" claim
        jwtGrantedAuthoritiesConverter.setAuthorityPrefix("ROLE_"); // Add "ROLE_" prefix

        JwtAuthenticationConverter jwtConverter = new JwtAuthenticationConverter();
        jwtConverter.setJwtGrantedAuthoritiesConverter(jwtAuthenticationConverter -> {
            Collection<GrantedAuthority> authorities = jwtGrantedAuthoritiesConverter.convert(jwtAuthenticationConverter);
            authorities.forEach(authority -> {
                System.out.println("Extracted Authority: " + authority.getAuthority());
            });
            return authorities;
        });

        return jwtConverter;
    }

    @Bean
    public PasswordEncoder passwordEncoder() {
        return new BCryptPasswordEncoder();
    }

    @Bean
    public JwtDecoder jwtDecoder() throws Exception {
        // Loading public key from the PEM file
        ClassPathResource resource = new ClassPathResource("keys/public.pem");
        RSAPublicKey publicKey = PemUtils.readPublicKey(resource.getInputStream());
        return NimbusJwtDecoder.withPublicKey(publicKey).build(); // Building the decoder with the public key
    }

    @Bean
    public JwtEncoder jwtEncoder() throws Exception {
        // Load the private key from the PEM file
        ClassPathResource privateKeyResource = new ClassPathResource("keys/private.pem");
        PrivateKey privateKey = PemUtils.readPrivateKey(privateKeyResource.getInputStream());

        // Load the public key again from the PEM file
        ClassPathResource publicKeyResource = new ClassPathResource("keys/public.pem");
        RSAPublicKey publicKey = PemUtils.readPublicKey(publicKeyResource.getInputStream());

        // Create the RSAKey using both the public and private keys
        RSAKey rsaKey = new RSAKey.Builder(publicKey)
                .privateKey(privateKey)
                .build();

        // Configure the JWT encoder using the RSAKey
        JWKSource<SecurityContext> jwkSource = new ImmutableJWKSet<>(new JWKSet(rsaKey));
        return new NimbusJwtEncoder(jwkSource);
    }

    @Bean
    public AuthenticationManager authenticationManager(AuthenticationConfiguration authenticationConfiguration)
            throws Exception {
        return authenticationConfiguration.getAuthenticationManager();
    }
}
