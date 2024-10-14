package com.abdimas.bukasol.controller;

import java.util.List;

import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import com.abdimas.bukasol.data.model.User;
import com.abdimas.bukasol.data.repository.TeacherRepository;
import com.abdimas.bukasol.data.repository.UserRepository;
import com.abdimas.bukasol.dto.LoginRequestDTO;
import com.abdimas.bukasol.dto.LoginResponseDTO;
import com.abdimas.bukasol.dto.register.RegisterRequestDTO;
import com.abdimas.bukasol.dto.register.RegisterResponseDTO;
import com.abdimas.bukasol.dto.register.RegisterStudentRequestDTO;
import com.abdimas.bukasol.dto.register.RegisterTeacherRequestDTO;
import com.abdimas.bukasol.service.UserService;

import lombok.AllArgsConstructor;

@RestController
@RequestMapping("/api/v1/users")
@AllArgsConstructor
public class UserController {

    private final UserService userService;
    private final TeacherRepository teacherRepository;
    private final UserRepository userRepository;

    @GetMapping(value = "/auth/login")
    public ResponseEntity<LoginResponseDTO> login(@RequestBody LoginRequestDTO userLogin) {
        LoginResponseDTO response = userService.login(userLogin);

        return ResponseEntity.status(HttpStatus.OK).body(response);
    }

    @PostMapping(value = "/auth/register-admin")
    public ResponseEntity<RegisterResponseDTO> registerAdmin(@RequestBody RegisterRequestDTO userRegister) {
        User user = userService.registerAdmin(userRegister);

        RegisterResponseDTO registerResponse = new RegisterResponseDTO();
        registerResponse.setMessage("Admin Account Successfully Created with Username: " + user.getUsername());
        
        return ResponseEntity.status(HttpStatus.OK).body(registerResponse);
    }

    @PostMapping(value = "/auth/register-teacher")
    public ResponseEntity<RegisterResponseDTO> registerTeacher(@RequestBody RegisterTeacherRequestDTO userRegister) {
        User user = userService.registerTeacher(userRegister);

        RegisterResponseDTO registerResponse = new RegisterResponseDTO();
        registerResponse.setMessage("Teacher Account Successfully Created with Username: " + user.getUsername());
        
        return ResponseEntity.status(HttpStatus.OK).body(registerResponse);
    }

    @PostMapping(value = "/auth/register-student")
    public ResponseEntity<RegisterResponseDTO> registerTeacher(@RequestBody RegisterStudentRequestDTO userRegister) {
        User user = userService.registerStudent(userRegister);

        RegisterResponseDTO registerResponse = new RegisterResponseDTO();
        registerResponse.setMessage("Student Account Successfully Created with Username: " + user.getUsername());
        
        return ResponseEntity.status(HttpStatus.OK).body(registerResponse);
    }

    @GetMapping
    public ResponseEntity<List<User>> testing() {
        List<User> teachs = userRepository.findAll();
        return ResponseEntity.status(HttpStatus.OK).body(teachs);
    }
}
