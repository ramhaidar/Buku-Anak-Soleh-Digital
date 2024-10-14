package com.abdimas.bukasol.controller;

import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import com.abdimas.bukasol.data.model.User;
import com.abdimas.bukasol.dto.LoginRequestDTO;
import com.abdimas.bukasol.dto.LoginResponseDTO;
import com.abdimas.bukasol.dto.RegisterRequestDTO;
import com.abdimas.bukasol.dto.RegisterResponseDTO;
import com.abdimas.bukasol.service.UserService;

import lombok.AllArgsConstructor;

@RestController
@RequestMapping("/api/v1/users")
@AllArgsConstructor
public class UserController {

    private final UserService userService;

    @GetMapping(value = "/auth/login")
    public ResponseEntity<LoginResponseDTO> login(@RequestBody LoginRequestDTO userLogin) {
        LoginResponseDTO response = userService.login(userLogin);

        return ResponseEntity.status(HttpStatus.OK).body(response);
    }

    @PostMapping(value = "/auth/register-admin")
    public ResponseEntity<RegisterResponseDTO> register(@RequestBody RegisterRequestDTO userRegister) {
        User user = userService.register(userRegister);

        RegisterResponseDTO registerResponse = new RegisterResponseDTO();
        registerResponse.setMessage("Account Successfully Created with Username: " + user.getUsername());
        
        return ResponseEntity.status(HttpStatus.OK).body(registerResponse);
    }

    @GetMapping
    public ResponseEntity<String> testing() {
        return ResponseEntity.status(HttpStatus.OK).body("Success");
    }
}
