package com.abdimas.bukasol.service.impl;

import java.time.Instant;
import java.util.List;
import java.util.UUID;

import org.springframework.data.domain.Page;
import org.springframework.data.domain.Pageable;
import org.springframework.security.authentication.AuthenticationManager;
import org.springframework.security.authentication.UsernamePasswordAuthenticationToken;
import org.springframework.security.core.Authentication;
import org.springframework.security.core.AuthenticationException;
import org.springframework.security.core.GrantedAuthority;
import org.springframework.security.crypto.password.PasswordEncoder;
import org.springframework.security.oauth2.jwt.JwtClaimsSet;
import org.springframework.security.oauth2.jwt.JwtEncoder;
import org.springframework.security.oauth2.jwt.JwtEncoderParameters;
import org.springframework.stereotype.Service;

import com.abdimas.bukasol.data.model.Student;
import com.abdimas.bukasol.data.model.Teacher;
import com.abdimas.bukasol.data.model.User;
import com.abdimas.bukasol.data.repository.StudentRepository;
import com.abdimas.bukasol.data.repository.TeacherRepository;
import com.abdimas.bukasol.data.repository.UserRepository;
import com.abdimas.bukasol.dto.ChangePasswordDTO;
import com.abdimas.bukasol.dto.StudentDTO;
import com.abdimas.bukasol.dto.StudentSaveDTO;
import com.abdimas.bukasol.dto.TeacherDTO;
import com.abdimas.bukasol.dto.TeacherSaveDTO;
import com.abdimas.bukasol.dto.UserDTO;
import com.abdimas.bukasol.dto.UserDetailsDTO;
import com.abdimas.bukasol.dto.login.LoginRequestDTO;
import com.abdimas.bukasol.dto.login.LoginResponseDTO;
import com.abdimas.bukasol.dto.register.RegisterRequestDTO;
import com.abdimas.bukasol.dto.register.RegisterStudentRequestDTO;
import com.abdimas.bukasol.dto.register.RegisterTeacherRequestDTO;
import com.abdimas.bukasol.mapper.StudentMapper;
import com.abdimas.bukasol.mapper.TeacherMapper;
import com.abdimas.bukasol.mapper.UserMapper;
import com.abdimas.bukasol.service.UserService;

import lombok.AllArgsConstructor;

@Service
@AllArgsConstructor
public class UserServiceImpl implements UserService {

    private final UserRepository userRepository;
    private final TeacherRepository teacherRepository;
    private final StudentRepository studentRepository;

    private final UserMapper userMapper;
    private final StudentMapper studentMapper;
    private final TeacherMapper teacherMapper;

    private final PasswordEncoder passwordEncoder;
    private final JwtEncoder jwtEncoder;
    private final AuthenticationManager authenticationManager;

    @Override
    public User findByUsername(String username) {
        return userRepository.findByUsername(username);
    }

    @Override
    public LoginResponseDTO login(LoginRequestDTO userLogin) {
        try {
            // Get user authentication
            Authentication authentication = authenticationManager.authenticate(
                    new UsernamePasswordAuthenticationToken(userLogin.getUsername(), userLogin.getPassword()));

            // Get UserDetailsDTO after success authentication
            UserDetailsDTO userDetails = (UserDetailsDTO) authentication.getPrincipal();
            User user = userDetails.getUser();

            // Claim JWT
            Instant now = Instant.now();
            long expiry = 604800L; // Token valid for 7 days

            JwtClaimsSet claims = JwtClaimsSet.builder()
                    .issuer("Abdimasy")
                    .issuedAt(now)
                    .expiresAt(now.plusSeconds(expiry))
                    .subject(user.getId().toString()) // Store User ID as a subject
                    .claim("username", user.getUsername()) // Store email as a claim
                    .claim("roles", userDetails.getAuthorities().stream()
                            .map(GrantedAuthority::getAuthority).toList())
                    .build();

            // Encode JWT using claim
            String token = jwtEncoder.encode(JwtEncoderParameters.from(claims)).getTokenValue();

            return new LoginResponseDTO(token, user.getRole());
        } catch (AuthenticationException e) {
            throw e;
        }
    }

    @Override
    public User registerAdmin(RegisterRequestDTO userRegister) {
        User newUser = new User();
        newUser.setName(userRegister.getName());
        newUser.setUsername(userRegister.getUsername());
        newUser.setPassword(passwordEncoder.encode(userRegister.getPassword()));
        newUser.setRole("SUPERADMIN");
        
        User user = userRepository.save(newUser);

        return user;
    }

    @Override
    public User registerTeacher(RegisterTeacherRequestDTO userRegister) {
        User newUser = new User();
        newUser.setName(userRegister.getName());
        newUser.setUsername(userRegister.getUsername());
        newUser.setPassword(passwordEncoder.encode(userRegister.getPassword()));
        newUser.setRole("TEACHER");

        User user = userRepository.save(newUser);

        Teacher newTeacher = new Teacher();
        newTeacher.setUser(user);
        newTeacher.setNip(userRegister.getNip());
        newTeacher.setClassName(userRegister.getClassName());
        newTeacher.setStudent(null);
        
        teacherRepository.save(newTeacher);
        
        return user;
    }

    @Override
    public User registerStudent(RegisterStudentRequestDTO userRegister) {
        User newUser = new User();
        newUser.setName(userRegister.getName());
        newUser.setUsername(userRegister.getUsername());
        newUser.setPassword(passwordEncoder.encode(userRegister.getPassword()));
        newUser.setRole("STUDENT");

        User user = userRepository.save(newUser);
        Teacher teacher = teacherRepository.findById(userRegister.getTeacherId()).orElse(null);

        Student newStudent = new Student();
        newStudent.setUser(user);
        newStudent.setTeacher(teacher);
        newStudent.setNisn(userRegister.getNisn());
        newStudent.setClassName(userRegister.getClassName());
        newStudent.setParentName(userRegister.getParentName());

        studentRepository.save(newStudent);
        
        return user;
    }

    @Override
    public Page<StudentDTO> findAllStudentAccount(Pageable pageable) {
        return studentRepository.findAll(pageable).map(studentMapper::toStudentDTO);
    }

    @Override
    public Page<TeacherDTO> findAllTeacherAccount(Pageable pageable) {
        return teacherRepository.findAll(pageable).map(teacherMapper::toTeacherDTO);
    }

    @Override
    public String deleteStudentAccount(UUID studentId) {
        Student student = studentRepository.findById(studentId).orElse(null);

        if(student == null) {
            return "None";
        }

        User user = student.getUser();
        
        studentRepository.delete(student);

        userRepository.delete(user);

        return "Deleted";
    }

    @Override
    public String deleteTeacherAccount(UUID teacherId) {
        Teacher teacher = teacherRepository.findById(teacherId).orElse(null);

        if(teacher == null) {
            return "None";
        }

        User userTeacher = teacher.getUser();
        List<Student> students = studentRepository.findByTeacher(teacher);

        studentRepository.deleteAll(students);

        for(Student student : students) {
            userRepository.delete(student.getUser());
        }
        
        teacherRepository.delete(teacher);

        userRepository.delete(userTeacher);

        return "Deleted";
    }

    @Override
    public StudentDTO updateStudentDetail(UUID studentId, StudentSaveDTO studentSaveDTO) {
        Student checkStudent = studentRepository.findById(studentId).orElse(null);

        if(checkStudent == null) {
            return null;
        }

        checkStudent.setNisn(studentSaveDTO.getNisn());
        checkStudent.setClassName(studentSaveDTO.getClassName());
        checkStudent.setParentName(studentSaveDTO.getParentName());

        Student updatedStudent = studentRepository.save(checkStudent);
        StudentDTO student = studentMapper.toStudentDTO(updatedStudent);
        
        return student;
    }

    @Override
    public TeacherDTO updateTeacherDetail(UUID teacherId, TeacherSaveDTO teacherSaveDTO) {
        Teacher checkTeacher = teacherRepository.findById(teacherId).orElse(null);

        if(checkTeacher == null) {
            return null;
        }

        checkTeacher.setNip(teacherSaveDTO.getNip());
        checkTeacher.setClassName(teacherSaveDTO.getClassName());

        Teacher updatedTeacher = teacherRepository.save(checkTeacher);
        TeacherDTO teacher = teacherMapper.toTeacherDTO(updatedTeacher);

        return teacher;
    }

    @Override
    public UserDTO changePasswordUser(UUID userId, ChangePasswordDTO changePasswordDTO) {
        User user = userRepository.findById(userId).orElse(null);

        if(user == null) {
            return null;
        }

        if(passwordEncoder.matches(changePasswordDTO.getCurrentPassword(), user.getPassword())) {
            if(changePasswordDTO.getNewPassword().equals(changePasswordDTO.getConfirmNewPassword())) {
                user.setPassword(passwordEncoder.encode(changePasswordDTO.getNewPassword()));

                User updatedUser = userRepository.save(user);
                UserDTO userDTO = userMapper.toUserDTO(updatedUser);

                return userDTO;
            }
        }

        return null;
    }

    @Override
    public List<Student> getAllStudentByTeacher(UUID id) {
        Teacher teacher = teacherRepository.findById(id).orElse(null);
        
        List<Student> student = studentRepository.findByTeacher(teacher);
        
        return student;
    }
}
