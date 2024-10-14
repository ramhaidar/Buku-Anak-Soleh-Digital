package com.abdimas.bukasol.dto.register;

import java.util.UUID;

import lombok.AllArgsConstructor;
import lombok.Data;
import lombok.NoArgsConstructor;

@Data
@NoArgsConstructor
@AllArgsConstructor
public class RegisterStudentRequestDTO {
    private UUID teacherId;
    private String name;
    private String username;
    private String password;
    private String nisn;
    private String className;
    private String parentName;
}
