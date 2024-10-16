package com.abdimas.bukasol.dto.register;

import java.util.UUID;

import jakarta.validation.constraints.NotBlank;
import jakarta.validation.constraints.NotNull;
import lombok.AllArgsConstructor;
import lombok.Data;
import lombok.NoArgsConstructor;

@Data
@NoArgsConstructor
@AllArgsConstructor
public class RegisterStudentRequestDTO {
    @NotNull(message="Guru Wali Kelas is Required")
    private UUID teacherId;

    @NotBlank(message="Name is Required")
    private String name;

    @NotBlank(message="Username is Required")
    private String username;

    @NotBlank(message="Password is Required")
    private String password;

    @NotBlank(message="NISN is Required")
    private String nisn;

    @NotBlank(message="Class Name is Required")
    private String className;

    @NotBlank(message="Parent Name is Required")
    private String parentName;
}
