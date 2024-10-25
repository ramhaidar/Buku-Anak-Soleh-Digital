package com.abdimas.bukasol.dto;

import jakarta.validation.constraints.NotBlank;
import lombok.AllArgsConstructor;
import lombok.Data;
import lombok.NoArgsConstructor;

@Data
@NoArgsConstructor
@AllArgsConstructor
public class ParentCodeDTO {
    @NotBlank(message="Parent Code is Required")
    private String parentCode;
}
