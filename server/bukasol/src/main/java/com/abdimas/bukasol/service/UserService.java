package com.abdimas.bukasol.service;

import java.util.List;
import java.util.UUID;

import org.springframework.data.domain.Page;
import org.springframework.data.domain.Pageable;

import com.abdimas.bukasol.data.model.Student;
import com.abdimas.bukasol.data.model.Teacher;
import com.abdimas.bukasol.data.model.User;
import com.abdimas.bukasol.dto.ChangePasswordDTO;
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

public interface UserService {
    LoginResponseDTO login(LoginRequestDTO userLogin);
    User findByUsername(String username);
    
    User findUserById(UUID userId);
    Teacher findTeacherById(UUID teacherId);
    Student findStudentById(UUID studentId);
    
    User registerAdmin(RegisterRequestDTO userRegister);
    User registerTeacher(RegisterTeacherRequestDTO userRegister);
    User registerStudent(RegisterStudentRequestDTO userRegister);

    Page<StudentDTO> findAllStudentAccount(Pageable pageable);
    Page<TeacherDTO> findAllTeacherAccount(Pageable pageable);

    String deleteStudentAccount(UUID studentId);
    String deleteTeacherAccount(UUID teacherId);
    List<Student> getAllStudentByTeacher(UUID id);

    StudentDTO updateStudentDetail(UUID studentId, StudentSaveDTO studentSaveDTO);
    TeacherDTO updateTeacherDetail(UUID teacherId, TeacherSaveDTO teacherSaveDTO);

    UserDTO changePasswordUser(UUID userId, ChangePasswordDTO changePasswordDTO);
}
