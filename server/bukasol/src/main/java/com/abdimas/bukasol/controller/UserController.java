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
import com.abdimas.bukasol.dto.StudentAdminDTO;
import com.abdimas.bukasol.dto.StudentDTO;
import com.abdimas.bukasol.dto.StudentSaveDTO;
import com.abdimas.bukasol.dto.TeacherAdminDTO;
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

    @PostMapping(value = "/auth/login")
    public ResponseEntity<LoginResponseDTO> login(@Valid @RequestBody LoginRequestDTO userLogin) {
        LoginResponseDTO response = userService.login(userLogin);

        return ResponseEntity.status(HttpStatus.OK).body(response);
    }

    @PostMapping(value = "/auth/register-admin")
    public ResponseEntity<MessageResponseDTO> registerAdmin(@Valid @RequestBody RegisterRequestDTO userRegister) {
        User user = userService.registerAdmin(userRegister);

        MessageResponseDTO registerResponse = new MessageResponseDTO();
        registerResponse.setMessage("Admin Account Successfully Created with Username: " + user.getUsername());
        
        return ResponseEntity.status(HttpStatus.CREATED).body(registerResponse);
    }

    @PostMapping(value = "/auth/register-teacher")
    public ResponseEntity<MessageResponseDTO> registerTeacher(@Valid @RequestBody RegisterTeacherRequestDTO userRegister) {
        User user = userService.registerTeacher(userRegister);

        MessageResponseDTO registerResponse = new MessageResponseDTO();
        registerResponse.setMessage("Teacher Account Successfully Created with Username: " + user.getUsername());
        
        return ResponseEntity.status(HttpStatus.CREATED).body(registerResponse);
    }

    @PostMapping(value = "/auth/register-student")
    public ResponseEntity<MessageResponseDTO> registerStudent(@Valid @RequestBody RegisterStudentRequestDTO userRegister) {
        User user = userService.registerStudent(userRegister);

        MessageResponseDTO registerResponse = new MessageResponseDTO();
        registerResponse.setMessage("Student Account Successfully Created with Username: " + user.getUsername());
        
        return ResponseEntity.status(HttpStatus.CREATED).body(registerResponse);
    }

    @GetMapping(value = "/admin/student-account")
    public ResponseEntity<Page<StudentAdminDTO>> getAllStudentAccount(@RequestParam(defaultValue = "0") int page, @RequestParam(defaultValue = "20") int size) {
        Pageable pageable = PageRequest.of(page, size);
        Page<StudentAdminDTO> studentAccPage = userService.findAllStudentAccount(pageable);

        return ResponseEntity.status(HttpStatus.OK).body(studentAccPage);
    }

    @GetMapping(value = "/admin/teacher-account")
    public ResponseEntity<Page<TeacherAdminDTO>> getAllTeacherAccount(@RequestParam(defaultValue = "0") int page, @RequestParam(defaultValue = "20") int size) {
        Pageable pageable = PageRequest.of(page, size);
        Page<TeacherAdminDTO> teacherAccPage = userService.findAllTeacherAccount(pageable);

        return ResponseEntity.status(HttpStatus.OK).body(teacherAccPage);
    }

    @GetMapping(value = "/admin/teacher/{id}")
    public ResponseEntity<TeacherAdminDTO> adminGetTeacherDetailById(@PathVariable("id") UUID teacherId) {
        TeacherAdminDTO teacher = userService.adminGetTeacher(teacherId);

        return ResponseEntity.status(HttpStatus.OK).body(teacher);
    }

    @GetMapping(value = "/admin/student/{id}")
    public ResponseEntity<StudentAdminDTO> adminGetStudentDetailById(@PathVariable("id") UUID studentId) {
        StudentAdminDTO student = userService.adminGetStudent(studentId);

        return ResponseEntity.status(HttpStatus.OK).body(student);
    }

    @GetMapping(value = "/admin/{id}")
    public ResponseEntity<UserDTO> getAdminDetailById(@PathVariable("id") UUID adminId) {
        UserDTO user = userService.getAdmin(adminId);

        return ResponseEntity.status(HttpStatus.OK).body(user);
    }

    @GetMapping(value = "/teacher/{id}")
    public ResponseEntity<TeacherDTO> getTeacherDetailById(@PathVariable("id") UUID teacherId) {
        TeacherDTO teacher = userService.getTeacher(teacherId);

        return ResponseEntity.status(HttpStatus.OK).body(teacher);
    }

    @GetMapping(value = "/student/{id}")
    public ResponseEntity<StudentDTO> getStudentDetailById(@PathVariable("id") UUID studentId) {
        StudentDTO student = userService.getStudent(studentId);

        return ResponseEntity.status(HttpStatus.OK).body(student);
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
    public ResponseEntity<StudentAdminDTO> updateStudentAccount(@PathVariable("id") UUID studentId, @Valid @RequestBody StudentSaveDTO studentSaveDTO) {
        StudentAdminDTO student = userService.updateStudentDetail(studentId, studentSaveDTO);
        
        return ResponseEntity.status(HttpStatus.OK).body(student);
    }

    @PutMapping(value = "/admin/edit-teacher/{id}")
    public ResponseEntity<TeacherAdminDTO> updateTeacherAccount(@PathVariable("id") UUID teacherId, @Valid @RequestBody TeacherSaveDTO teacherSaveDTO) {
        TeacherAdminDTO teacher = userService.updateTeacherDetail(teacherId, teacherSaveDTO);
        
        return ResponseEntity.status(HttpStatus.OK).body(teacher);
    }

    @PutMapping(value = "/admin/change-password/{id}")
    public ResponseEntity<UserDTO> changePasswordAdming(@PathVariable("id") UUID userId, @Valid @RequestBody ChangePasswordDTO changePasswordDTO) {
        UserDTO user = userService.changePasswordUser(userId, changePasswordDTO);
        
        return ResponseEntity.status(HttpStatus.OK).body(user);
    }
}
