package com.abdimas.bukasol.dto;

import jakarta.validation.constraints.NotBlank;
import lombok.AllArgsConstructor;
import lombok.Data;
import lombok.NoArgsConstructor;

@Data
@NoArgsConstructor
@AllArgsConstructor
public class TeacherSaveDTO {
    @NotBlank(message="NIP is Required")
    private String nip;

    @NotBlank(message="Class Name is Required")
    private String className;
}
