package com.abdimas.bukasol.dto;

import lombok.AllArgsConstructor;
import lombok.Data;
import lombok.NoArgsConstructor;

@Data
@NoArgsConstructor
@AllArgsConstructor
public class StudentSaveDTO {
    private String nisn;
    private String className;
    private String parentName;
}
