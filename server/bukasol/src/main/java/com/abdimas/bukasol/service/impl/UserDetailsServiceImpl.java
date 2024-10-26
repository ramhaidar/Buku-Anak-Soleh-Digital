package com.abdimas.bukasol.service.impl;

import org.springframework.security.core.userdetails.UserDetails;
import org.springframework.security.core.userdetails.UserDetailsService;
import org.springframework.stereotype.Service;

import com.abdimas.bukasol.data.model.User;
import com.abdimas.bukasol.data.repository.UserRepository;
import com.abdimas.bukasol.dto.UserDetailsDTO;
import com.abdimas.bukasol.exception.AuthenticationInvalidException;

import lombok.AllArgsConstructor;

@Service
@AllArgsConstructor
public class UserDetailsServiceImpl implements UserDetailsService {

    private final UserRepository userRepository;

    @Override
    public UserDetails loadUserByUsername(String username) {
        User user = userRepository.findByUsername(username).orElseThrow(() -> new AuthenticationInvalidException("Invalid Username or Password"));

        return new UserDetailsDTO(user);
    }
}
