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
import com.abdimas.bukasol.dto.StudentAdminDTO;
import com.abdimas.bukasol.dto.StudentDTO;
import com.abdimas.bukasol.dto.StudentSaveDTO;
import com.abdimas.bukasol.dto.TeacherAdminDTO;
import com.abdimas.bukasol.dto.TeacherDTO;
import com.abdimas.bukasol.dto.TeacherSaveDTO;
import com.abdimas.bukasol.dto.UserDTO;
import com.abdimas.bukasol.dto.UserDetailsDTO;
import com.abdimas.bukasol.dto.login.LoginRequestDTO;
import com.abdimas.bukasol.dto.login.LoginResponseDTO;
import com.abdimas.bukasol.dto.register.RegisterRequestDTO;
import com.abdimas.bukasol.dto.register.RegisterStudentRequestDTO;
import com.abdimas.bukasol.dto.register.RegisterTeacherRequestDTO;
import com.abdimas.bukasol.exception.AuthenticationInvalidException;
import com.abdimas.bukasol.exception.DuplicateEntityException;
import com.abdimas.bukasol.exception.EntityNotFoundException;
import com.abdimas.bukasol.exception.MismatchException;
import com.abdimas.bukasol.exception.NoContentException;
import com.abdimas.bukasol.mapper.StudentMapper;
import com.abdimas.bukasol.mapper.TeacherMapper;
import com.abdimas.bukasol.mapper.UserMapper;
import com.abdimas.bukasol.service.UserService;
import com.abdimas.bukasol.utils.RandomCodeGenerator;

import jakarta.transaction.Transactional;
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
    private final RandomCodeGenerator randomCodeGenerator;
    
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

            return new LoginResponseDTO(token, user.getRole(), user.getName());
        } catch (AuthenticationException e) {
            throw new AuthenticationInvalidException("Invalid Username or Password");
        }
    }

    @Override
    public User findUserById(UUID userId) {
        return userRepository.findById(userId)
                .orElseThrow(() -> new EntityNotFoundException("User Not Found"));
    }

    @Override
    public Teacher findTeacherById(UUID teacherId) {
        return teacherRepository.findById(teacherId)
                .orElseThrow(() -> new EntityNotFoundException("Teacher Not Found"));
    }

    @Override
    public Student findStudentById(UUID studentId) {
        return studentRepository.findById(studentId)
                .orElseThrow(() -> new EntityNotFoundException("Student Not Found"));
    }

    @Override
    public List<Student> findStudentByClassName(String className) {
        return studentRepository.findByClassName(className)
                .orElseThrow(() -> new NoContentException("No Student of This Class"));
    }

    @Override
    public TeacherAdminDTO adminGetTeacher(UUID teacherId) {
        Teacher teacher = findTeacherById(teacherId);

        TeacherAdminDTO teacherDTO = teacherMapper.toTeacherAdminDTO(teacher);

        teacherDTO.setPassword(randomCodeGenerator.generatePassword(teacherDTO.getName(), teacherDTO.getNip()));
        
        return teacherDTO;
    }

    @Override
    public StudentAdminDTO adminGetStudent(UUID studentId) {
        Student student = findStudentById(studentId);

        StudentAdminDTO studentDTO = studentMapper.toStudentAdminDTO(student);

        studentDTO.setPassword(randomCodeGenerator.generatePassword(studentDTO.getName(), studentDTO.getNisn()));
        
        return studentDTO;
    }

    @Override
    public UserDTO getAdmin(UUID adminId) {
        User user = findUserById(adminId);

        UserDTO userDTO = userMapper.toUserDTO(user);
        
        return userDTO;
    }

    @Override
    public TeacherDTO getTeacher(UUID teacherId) {
        Teacher teacher = findTeacherById(teacherId);

        TeacherDTO teacherDTO = teacherMapper.toTeacherDTO(teacher);
        
        return teacherDTO;
    }

    @Override
    public StudentDTO getStudent(UUID studentId) {
        Student student = findStudentById(studentId);

        StudentDTO studentDTO = studentMapper.toStudentDTO(student);
        
        return studentDTO;
    }

    @Override
    public User registerAdmin(RegisterRequestDTO userRegister) {
        
        if(userRepository.existsByUsername(userRegister.getUsername())) {
            throw new DuplicateEntityException("User with Username '" + userRegister.getUsername() + "' is already exist");
        }
        
        User newUser = new User();
        newUser.setName(userRegister.getName());
        newUser.setUsername(userRegister.getUsername());
        newUser.setPassword(passwordEncoder.encode(userRegister.getPassword()));
        newUser.setRole("SUPERADMIN");
        
        User user = userRepository.save(newUser);

        return user;
    }

    @Override
    @Transactional
    public User registerTeacher(RegisterTeacherRequestDTO userRegister) {
        if(userRepository.existsByUsername(userRegister.getUsername())) {
            throw new DuplicateEntityException("User with Username '" + userRegister.getUsername() + "' is already exist");
        }

        User newUser = new User();
        newUser.setName(userRegister.getName());
        newUser.setUsername(userRegister.getUsername());
        newUser.setPassword(passwordEncoder.encode(randomCodeGenerator.generatePassword(userRegister.getName(), userRegister.getNip())));
        newUser.setRole("TEACHER");

        User user = userRepository.save(newUser);

        if(teacherRepository.existsByNip(userRegister.getNip())) {
            throw new DuplicateEntityException("Teacher with NIP '" + userRegister.getNip() + "' is already exist"); 
        }

        Teacher newTeacher = new Teacher();
        newTeacher.setUser(user);
        newTeacher.setNip(userRegister.getNip());
        newTeacher.setClassName(userRegister.getClassName());
        
        teacherRepository.save(newTeacher);
        
        return user;
    }

    @Override
    @Transactional
    public User registerStudent(RegisterStudentRequestDTO userRegister) {
        if(userRepository.existsByUsername(userRegister.getUsername())) {
            throw new DuplicateEntityException("User with Username '" + userRegister.getUsername() + "' is already exist");
        }

        User newUser = new User();
        newUser.setName(userRegister.getName());
        newUser.setUsername(userRegister.getUsername());
        newUser.setPassword(passwordEncoder.encode(randomCodeGenerator.generatePassword(userRegister.getName(), userRegister.getNisn())));
        newUser.setRole("STUDENT");

        User user = userRepository.save(newUser);
        Teacher teacher = findTeacherById(userRegister.getTeacherId());

        if(studentRepository.existsByNisn(userRegister.getNisn())) {
            throw new DuplicateEntityException("Student with NISN '" + userRegister.getNisn() + "' is already exist"); 
        }

        Student newStudent = new Student();
        newStudent.setUser(user);
        newStudent.setTeacher(teacher);
        newStudent.setNisn(userRegister.getNisn());
        newStudent.setClassName(userRegister.getClassName());
        newStudent.setParentName(userRegister.getParentName());
        newStudent.setParentCode(randomCodeGenerator.generateNumericCode());

        studentRepository.save(newStudent);
        
        return user;
    }

    @Override
    public Page<StudentAdminDTO> findAllStudentAccount(Pageable pageable) {
        Page<StudentAdminDTO> studentAcc = studentRepository.findAll(pageable)
            .map(student -> {
                StudentAdminDTO dto = studentMapper.toStudentAdminDTO(student);
                dto.setPassword(randomCodeGenerator.generatePassword(dto.getName(), dto.getNisn()));
                return dto;
            });

        if(studentAcc.isEmpty()) {
            throw new NoContentException("There is no Student Account");
        }

        return studentAcc;
    }

    @Override
    public Page<TeacherAdminDTO> findAllTeacherAccount(Pageable pageable) {
        Page<TeacherAdminDTO> teacherAcc = teacherRepository.findAll(pageable)
            .map(teacher -> {
                TeacherAdminDTO dto = teacherMapper.toTeacherAdminDTO(teacher);
                dto.setPassword(randomCodeGenerator.generatePassword(dto.getName(), dto.getNip()));
                return dto;
            });

        if(teacherAcc.isEmpty()) {
            throw new NoContentException("There is no Teacher Account");
        }

        return teacherAcc;
    }

    @Override
    @Transactional
    public String deleteStudentAccount(UUID studentId) {
        Student student = findStudentById(studentId);

        User user = student.getUser();
        
        studentRepository.delete(student);

        userRepository.delete(user);

        return "Student Successfully Deleted";
    }

    @Override
    @Transactional
    public String deleteTeacherAccount(UUID teacherId) {
        Teacher teacher = findTeacherById(teacherId);

        User userTeacher = teacher.getUser();
        List<Student> students = studentRepository.findByTeacher(teacher);

        studentRepository.deleteAll(students);

        for(Student student : students) {
            userRepository.delete(student.getUser());
        }
        
        teacherRepository.delete(teacher);

        userRepository.delete(userTeacher);

        return "Teacher Successfully Deleted";
    }

    @Override
    public StudentAdminDTO updateStudentDetail(UUID studentId, StudentSaveDTO studentSaveDTO) {
        Student checkStudent = findStudentById(studentId);

        if (!checkStudent.getNisn().equals(studentSaveDTO.getNisn())
                && studentRepository.existsByNisn(studentSaveDTO.getNisn())) {
            throw new DuplicateEntityException("Student with NISN '" + studentSaveDTO.getNisn() + "' is already exist");
        }

        checkStudent.setNisn(studentSaveDTO.getNisn()); //Check NISN
        checkStudent.setClassName(studentSaveDTO.getClassName());
        checkStudent.setParentName(studentSaveDTO.getParentName());
        checkStudent.getUser().setPassword(passwordEncoder.encode(randomCodeGenerator.generatePassword(checkStudent.getUser().getName(), studentSaveDTO.getNisn())));

        Student updatedStudent = studentRepository.save(checkStudent);
        StudentAdminDTO student = studentMapper.toStudentAdminDTO(updatedStudent);
        
        return student;
    }

    @Override
    public TeacherAdminDTO updateTeacherDetail(UUID teacherId, TeacherSaveDTO teacherSaveDTO) {
        Teacher checkTeacher = findTeacherById(teacherId);

        if (!checkTeacher.getNip().equals(teacherSaveDTO.getNip())
                && teacherRepository.existsByNip(teacherSaveDTO.getNip())) {
            throw new DuplicateEntityException("Teacher with NIP '" + teacherSaveDTO.getNip() + "' is already exist");
        }

        checkTeacher.setNip(teacherSaveDTO.getNip()); //Check NIP
        checkTeacher.setClassName(teacherSaveDTO.getClassName());
        checkTeacher.getUser().setPassword(passwordEncoder.encode(randomCodeGenerator.generatePassword(checkTeacher.getUser().getName(), teacherSaveDTO.getNip())));

        Teacher updatedTeacher = teacherRepository.save(checkTeacher);
        TeacherAdminDTO teacher = teacherMapper.toTeacherAdminDTO(updatedTeacher);

        return teacher;
    }

    @Override
    public UserDTO changePasswordUser(UUID userId, ChangePasswordDTO changePasswordDTO) {
        User user = findUserById(userId);

        // Check if current password matches
        if(!passwordEncoder.matches(changePasswordDTO.getCurrentPassword(), user.getPassword())) {
            throw new MismatchException("Does not match with Current Password");
        }

        // Check if new password and confirm password are equal
        if(!changePasswordDTO.getNewPassword().equals(changePasswordDTO.getConfirmNewPassword())) {
            throw new MismatchException("New Password does not match with Confirm Password");
        }

        user.setPassword(passwordEncoder.encode(changePasswordDTO.getNewPassword()));

        User updatedUser = userRepository.save(user);
        UserDTO userDTO = userMapper.toUserDTO(updatedUser);

        return userDTO;
    }
}
