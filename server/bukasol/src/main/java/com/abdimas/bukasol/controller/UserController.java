package com.abdimas.bukasol.controller;

import java.util.UUID;

import org.springframework.data.domain.Page;
import org.springframework.data.domain.PageRequest;
import org.springframework.data.domain.Pageable;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.validation.annotation.Validated;
import org.springframework.web.bind.annotation.DeleteMapping;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.PutMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.RestController;

import com.abdimas.bukasol.data.model.User;
import com.abdimas.bukasol.dto.ChangePasswordDTO;
import com.abdimas.bukasol.dto.MessageResponseDTO;
import com.abdimas.bukasol.dto.StudentDTO;
import com.abdimas.bukasol.dto.StudentSaveDTO;
import com.abdimas.bukasol.dto.TeacherDTO;
import com.abdimas.bukasol.dto.TeacherSaveDTO;
import com.abdimas.bukasol.dto.UserDTO;
import com.abdimas.bukasol.dto.login.LoginRequestDTO;
import com.abdimas.bukasol.dto.login.LoginResponseDTO;
import com.abdimas.bukasol.dto.register.RegisterRequestDTO;
import com.abdimas.bukasol.dto.register.RegisterStudentRequestDTO;
import com.abdimas.bukasol.dto.register.RegisterTeacherRequestDTO;
import com.abdimas.bukasol.service.UserService;

import jakarta.validation.Valid;
import lombok.AllArgsConstructor;

@RestController
@RequestMapping("/api/v1/users")
@Validated
@AllArgsConstructor
public class UserController {

    private final UserService userService;

    @GetMapping(value = "/auth/login")
    public ResponseEntity<LoginResponseDTO> login(@Valid @RequestBody LoginRequestDTO userLogin) {
        LoginResponseDTO response = userService.login(userLogin);

        return ResponseEntity.status(HttpStatus.OK).body(response);
    }

    @PostMapping(value = "/auth/register-admin")
    public ResponseEntity<MessageResponseDTO> registerAdmin(@Valid @RequestBody RegisterRequestDTO userRegister) {
        User user = userService.registerAdmin(userRegister);

        MessageResponseDTO registerResponse = new MessageResponseDTO();
        registerResponse.setMessage("Admin Account Successfully Created with Username: " + user.getUsername());
        
        return ResponseEntity.status(HttpStatus.OK).body(registerResponse);
    }

    @PostMapping(value = "/auth/register-teacher")
    public ResponseEntity<MessageResponseDTO> registerTeacher(@Valid @RequestBody RegisterTeacherRequestDTO userRegister) {
        User user = userService.registerTeacher(userRegister);

        MessageResponseDTO registerResponse = new MessageResponseDTO();
        registerResponse.setMessage("Teacher Account Successfully Created with Username: " + user.getUsername());
        
        return ResponseEntity.status(HttpStatus.OK).body(registerResponse);
    }

    @PostMapping(value = "/auth/register-student")
    public ResponseEntity<MessageResponseDTO> registerStudent(@Valid @RequestBody RegisterStudentRequestDTO userRegister) {
        User user = userService.registerStudent(userRegister);

        MessageResponseDTO registerResponse = new MessageResponseDTO();
        registerResponse.setMessage("Student Account Successfully Created with Username: " + user.getUsername());
        
        return ResponseEntity.status(HttpStatus.OK).body(registerResponse);
    }

    @GetMapping(value = "/admin/student-account")
    public ResponseEntity<Page<StudentDTO>> getAllStudentAccount(@RequestParam(defaultValue = "0") int page, @RequestParam(defaultValue = "20") int size) {
        Pageable pageable = PageRequest.of(page, size);
        Page<StudentDTO> studentAccPage = userService.findAllStudentAccount(pageable);

        if(studentAccPage.isEmpty()) {
            return ResponseEntity.status(HttpStatus.NO_CONTENT).build();
        }

        return ResponseEntity.status(HttpStatus.OK).body(studentAccPage);
    }

    @GetMapping(value = "/admin/teacher-account")
    public ResponseEntity<Page<TeacherDTO>> getAllTeacherAccount(@RequestParam(defaultValue = "0") int page, @RequestParam(defaultValue = "20") int size) {
        Pageable pageable = PageRequest.of(page, size);
        Page<TeacherDTO> teacherAccPage = userService.findAllTeacherAccount(pageable);

        if(teacherAccPage.isEmpty()) {
            return ResponseEntity.status(HttpStatus.NO_CONTENT).build();
        }

        return ResponseEntity.status(HttpStatus.OK).body(teacherAccPage);
    }

    @DeleteMapping(value = "/admin/delete-student/{id}")
    public ResponseEntity<MessageResponseDTO> deleteStudentAccount(@PathVariable("id") UUID studentId) {
        String message = userService.deleteStudentAccount(studentId);

        MessageResponseDTO deleteResponse = new MessageResponseDTO(message);

        return ResponseEntity.status(HttpStatus.OK).body(deleteResponse);
    }

    @DeleteMapping(value = "/admin/delete-teacher/{id}")
    public ResponseEntity<MessageResponseDTO> deleteTeacherAccount(@PathVariable("id") UUID teacherId) {
        String message = userService.deleteTeacherAccount(teacherId);

        MessageResponseDTO deleteResponse = new MessageResponseDTO(message);

        return ResponseEntity.status(HttpStatus.OK).body(deleteResponse);
    }

    @PutMapping(value = "/admin/edit-student/{id}")
    public ResponseEntity<StudentDTO> updateStudentAccount(@PathVariable("id") UUID studentId, @Valid @RequestBody StudentSaveDTO studentSaveDTO) {
        StudentDTO student = userService.updateStudentDetail(studentId, studentSaveDTO);
        
        return ResponseEntity.status(HttpStatus.OK).body(student);
    }

    @PutMapping(value = "/admin/edit-teacher/{id}")
    public ResponseEntity<TeacherDTO> updateTeacherAccount(@PathVariable("id") UUID teacherId, @Valid @RequestBody TeacherSaveDTO teacherSaveDTO) {
        TeacherDTO teacher = userService.updateTeacherDetail(teacherId, teacherSaveDTO);
        
        return ResponseEntity.status(HttpStatus.OK).body(teacher);
    }

    @PutMapping(value = "/admin/change-password/{id}")
    public ResponseEntity<UserDTO> changePasswordAdming(@PathVariable("id") UUID userId, @Valid @RequestBody ChangePasswordDTO changePasswordDTO) {
        UserDTO user = userService.changePasswordUser(userId, changePasswordDTO);
        
        return ResponseEntity.status(HttpStatus.OK).body(user);
    }
}
