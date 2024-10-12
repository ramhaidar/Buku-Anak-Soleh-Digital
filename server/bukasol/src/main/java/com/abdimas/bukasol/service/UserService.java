package com.abdimas.bukasol.service;

import com.abdimas.bukasol.data.model.User;
import com.abdimas.bukasol.dto.LoginRequest;
import com.abdimas.bukasol.dto.RegisterRequest;

public interface UserService {
    User login(LoginRequest userLogin);
    User register(RegisterRequest userRegister);
}
