package com.abdimas.bukasol.service;

import com.abdimas.bukasol.data.model.User;
import com.abdimas.bukasol.dto.LoginRequestDTO;
import com.abdimas.bukasol.dto.LoginResponseDTO;
import com.abdimas.bukasol.dto.register.RegisterRequestDTO;
import com.abdimas.bukasol.dto.register.RegisterStudentRequestDTO;
import com.abdimas.bukasol.dto.register.RegisterTeacherRequestDTO;

public interface UserService {
    LoginResponseDTO login(LoginRequestDTO userLogin);
    User findByUsername(String username);
    User registerAdmin(RegisterRequestDTO userRegister);
    User registerTeacher(RegisterTeacherRequestDTO userRegister);
    User registerStudent(RegisterStudentRequestDTO userRegister);
}
