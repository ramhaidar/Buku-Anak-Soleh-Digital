package com.abdimas.bukasol.dto;

import jakarta.validation.constraints.NotBlank;
import lombok.AllArgsConstructor;
import lombok.Data;
import lombok.NoArgsConstructor;

@Data
@NoArgsConstructor
@AllArgsConstructor
public class StudentSaveDTO {
    @NotBlank(message="NISN is Required")
    private String nisn;

    @NotBlank(message="Class Name is Required")
    private String className;

    @NotBlank(message="Parent Name is Required")
    private String parentName;
}
