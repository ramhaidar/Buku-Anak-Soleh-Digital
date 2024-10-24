package com.abdimas.bukasol.dto;

import java.util.UUID;

import lombok.AllArgsConstructor;
import lombok.Data;
import lombok.NoArgsConstructor;

@Data
@NoArgsConstructor
@AllArgsConstructor
public class StudentAdminDTO {
    private UUID id;
    private String nisn;
    private String name;
    private String className;
    private String parentName;
    private String parentCode;

    private UUID teacherId;
    private String teacherNip;
    private String teacherName;

    private String username;
    private String password;
}
