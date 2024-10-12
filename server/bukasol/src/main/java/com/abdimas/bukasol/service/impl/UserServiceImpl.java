package com.abdimas.bukasol.service.impl;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import com.abdimas.bukasol.data.model.User;
import com.abdimas.bukasol.data.repository.UserRepository;
import com.abdimas.bukasol.dto.LoginRequest;
import com.abdimas.bukasol.dto.RegisterRequest;
import com.abdimas.bukasol.service.UserService;

@Service
public class UserServiceImpl implements UserService {

    @Autowired
    private UserRepository userRepository;

    @Override
    public User login(LoginRequest userLogin) {
        User user = userRepository.findUserByUsernameAndPassword(userLogin.getUsername(), userLogin.getPassword());

        return user;
    }

    @Override
    public User register(RegisterRequest userRegister) {
        User newUser = new User();
        newUser.setName(userRegister.getName());
        newUser.setUsername(userRegister.getUsername());
        newUser.setPassword(userRegister.getPassword());
        newUser.setRole("SUPERADMIN");
        
        User user = userRepository.save(newUser);

        return user;
    }
}
