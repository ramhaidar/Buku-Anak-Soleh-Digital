package com.abdimas.bukasol.service.impl;

import java.time.Instant;

import org.springframework.security.authentication.AuthenticationManager;
import org.springframework.security.authentication.UsernamePasswordAuthenticationToken;
import org.springframework.security.core.Authentication;
import org.springframework.security.core.AuthenticationException;
import org.springframework.security.core.GrantedAuthority;
import org.springframework.security.crypto.password.PasswordEncoder;
import org.springframework.security.oauth2.jwt.JwtClaimsSet;
import org.springframework.security.oauth2.jwt.JwtEncoder;
import org.springframework.security.oauth2.jwt.JwtEncoderParameters;
import org.springframework.stereotype.Service;

import com.abdimas.bukasol.data.model.Student;
import com.abdimas.bukasol.data.model.Teacher;
import com.abdimas.bukasol.data.model.User;
import com.abdimas.bukasol.data.repository.StudentRepository;
import com.abdimas.bukasol.data.repository.TeacherRepository;
import com.abdimas.bukasol.data.repository.UserRepository;
import com.abdimas.bukasol.dto.UserDetailsDTO;
import com.abdimas.bukasol.dto.login.LoginRequestDTO;
import com.abdimas.bukasol.dto.login.LoginResponseDTO;
import com.abdimas.bukasol.dto.register.RegisterRequestDTO;
import com.abdimas.bukasol.dto.register.RegisterStudentRequestDTO;
import com.abdimas.bukasol.dto.register.RegisterTeacherRequestDTO;
import com.abdimas.bukasol.service.UserService;

import lombok.AllArgsConstructor;

@Service
@AllArgsConstructor
public class UserServiceImpl implements UserService {

    private final UserRepository userRepository;
    private final TeacherRepository teacherRepository;
    private final StudentRepository studentRepository;
    private final PasswordEncoder passwordEncoder;
    private final JwtEncoder jwtEncoder;
    private final AuthenticationManager authenticationManager;

    @Override
    public User findByUsername(String username) {
        return userRepository.findByUsername(username);
    }

    @Override
    public LoginResponseDTO login(LoginRequestDTO userLogin) {
        try {
            // Get user authentication
            Authentication authentication = authenticationManager.authenticate(
                    new UsernamePasswordAuthenticationToken(userLogin.getUsername(), userLogin.getPassword()));

            // Get UserDetailsDTO after success authentication
            UserDetailsDTO userDetails = (UserDetailsDTO) authentication.getPrincipal();
            User user = userDetails.getUser();

            // Claim JWT
            Instant now = Instant.now();
            long expiry = 604800L; // Token valid for 7 days

            JwtClaimsSet claims = JwtClaimsSet.builder()
                    .issuer("Abdimasy")
                    .issuedAt(now)
                    .expiresAt(now.plusSeconds(expiry))
                    .subject(user.getId().toString()) // Store User ID as a subject
                    .claim("username", user.getUsername()) // Store email as a claim
                    .claim("roles", userDetails.getAuthorities().stream()
                            .map(GrantedAuthority::getAuthority).toList())
                    .build();

            // Encode JWT using claim
            String token = jwtEncoder.encode(JwtEncoderParameters.from(claims)).getTokenValue();

            return new LoginResponseDTO(token, user.getRole());
        } catch (AuthenticationException e) {
            throw e;
        }
    }

    @Override
    public User registerAdmin(RegisterRequestDTO userRegister) {
        User newUser = new User();
        newUser.setName(userRegister.getName());
        newUser.setUsername(userRegister.getUsername());
        newUser.setPassword(passwordEncoder.encode(userRegister.getPassword()));
        newUser.setRole("SUPERADMIN");
        
        User user = userRepository.save(newUser);

        return user;
    }

    @Override
    public User registerTeacher(RegisterTeacherRequestDTO userRegister) {
        User newUser = new User();
        newUser.setName(userRegister.getName());
        newUser.setUsername(userRegister.getUsername());
        newUser.setPassword(passwordEncoder.encode(userRegister.getPassword()));
        newUser.setRole("TEACHER");

        User user = userRepository.save(newUser);

        Teacher newTeacher = new Teacher();
        newTeacher.setUser(user);
        newTeacher.setNip(userRegister.getNip());
        newTeacher.setClassName(userRegister.getClassName());
        newTeacher.setStudent(null);
        
        teacherRepository.save(newTeacher);
        
        return user;
    }

    @Override
    public User registerStudent(RegisterStudentRequestDTO userRegister) {
        User newUser = new User();
        newUser.setName(userRegister.getName());
        newUser.setUsername(userRegister.getUsername());
        newUser.setPassword(passwordEncoder.encode(userRegister.getPassword()));
        newUser.setRole("STUDENT");

        User user = userRepository.save(newUser);
        Teacher teacher = teacherRepository.findById(userRegister.getTeacherId()).orElse(null);

        Student newStudent = new Student();
        newStudent.setUser(user);
        newStudent.setTeacher(teacher);
        newStudent.setNisn(userRegister.getNisn());
        newStudent.setClassName(userRegister.getClassName());
        newStudent.setParentName(userRegister.getParentName());

        studentRepository.save(newStudent);
        
        return user;
    }
}
