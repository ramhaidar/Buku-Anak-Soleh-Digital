package com.abdimas.bukasol.controller;

import java.util.List;

import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import com.abdimas.bukasol.data.model.Student;
import com.abdimas.bukasol.data.model.Teacher;
import com.abdimas.bukasol.data.model.User;
import com.abdimas.bukasol.data.repository.StudentRepository;
import com.abdimas.bukasol.data.repository.TeacherRepository;
import com.abdimas.bukasol.data.repository.UserRepository;
import com.abdimas.bukasol.dto.StudentDTO;
import com.abdimas.bukasol.dto.TeacherDTO;
import com.abdimas.bukasol.dto.UserDTO;
import com.abdimas.bukasol.dto.login.LoginRequestDTO;
import com.abdimas.bukasol.dto.login.LoginResponseDTO;
import com.abdimas.bukasol.dto.register.RegisterRequestDTO;
import com.abdimas.bukasol.dto.register.RegisterResponseDTO;
import com.abdimas.bukasol.dto.register.RegisterStudentRequestDTO;
import com.abdimas.bukasol.dto.register.RegisterTeacherRequestDTO;
import com.abdimas.bukasol.mapper.StudentMapper;
import com.abdimas.bukasol.mapper.TeacherMapper;
import com.abdimas.bukasol.mapper.UserMapper;
import com.abdimas.bukasol.service.UserService;

import lombok.AllArgsConstructor;

@RestController
@RequestMapping("/api/v1/users")
@AllArgsConstructor
public class UserController {

    private final UserService userService;
    private final TeacherRepository teacherRepository;
    private final UserRepository userRepository;
    private final StudentRepository studentRepository;

    private final UserMapper userMapper;
    private final TeacherMapper teacherMapper;
    private final StudentMapper studentMapper;

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
    public ResponseEntity<List<StudentDTO>> testing() {
        List<User> teachs = userRepository.findAll();
        List<UserDTO> userDTOs = userMapper.toUserDTOList(teachs);

        List<Teacher> teachss = teacherRepository.findAll();
        List<TeacherDTO> teacherDTOs = teacherMapper.toTeacherDTOList(teachss);

        List<Student> teachsss = studentRepository.findAll();
        List<StudentDTO> studentDTOs = studentMapper.toStudentDTOList(teachsss);

        return ResponseEntity.status(HttpStatus.OK).body(studentDTOs);
    }
}
