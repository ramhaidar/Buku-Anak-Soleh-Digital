package com.abdimas.bukasol.service;

import com.abdimas.bukasol.data.model.User;
import com.abdimas.bukasol.dto.LoginRequestDTO;
import com.abdimas.bukasol.dto.LoginResponseDTO;
import com.abdimas.bukasol.dto.RegisterRequestDTO;

public interface UserService {
    LoginResponseDTO login(LoginRequestDTO userLogin);
    User findByUsername(String username);
    User register(RegisterRequestDTO userRegister);
}
