package com.abdimas.bukasol.dto;

import java.util.UUID;

import lombok.AllArgsConstructor;
import lombok.Data;
import lombok.NoArgsConstructor;

@Data
@NoArgsConstructor
@AllArgsConstructor
public class StudentDTO {
    private UUID id;
    private String nisn;
    private String className;
    private String parentName;
    private TeacherDTO teacher;
}
