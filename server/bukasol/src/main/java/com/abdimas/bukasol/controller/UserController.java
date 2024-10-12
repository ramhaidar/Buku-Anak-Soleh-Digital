package com.abdimas.bukasol.controller;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import com.abdimas.bukasol.data.model.User;
import com.abdimas.bukasol.dto.LoginRequest;
import com.abdimas.bukasol.dto.RegisterRequest;
import com.abdimas.bukasol.service.UserService;

@RestController
@RequestMapping("/api/v1/users")
public class UserController {

    @Autowired
    private UserService userService;

    @GetMapping(value = "/login")
    public ResponseEntity<User> login(@RequestBody LoginRequest userLogin) {
        User user = userService.login(userLogin);
        

        return ResponseEntity.status(HttpStatus.OK).body(user);
    }

    @PostMapping(value = "/register")
    public ResponseEntity<User> register(@RequestBody RegisterRequest userRegister) {
        User user = userService.register(userRegister);
        
        return ResponseEntity.status(HttpStatus.OK).body(user);
    }
}
