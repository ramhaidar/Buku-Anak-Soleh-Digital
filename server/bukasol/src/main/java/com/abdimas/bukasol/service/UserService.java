package com.abdimas.bukasol.service;

import com.abdimas.bukasol.data.model.User;
import com.abdimas.bukasol.dto.LoginRequest;
import com.abdimas.bukasol.dto.LoginResponseDTO;
import com.abdimas.bukasol.dto.RegisterRequest;

public interface UserService {
    LoginResponseDTO login(LoginRequest userLogin);
    User findByUsername(String username);
    User register(RegisterRequest userRegister);
}
