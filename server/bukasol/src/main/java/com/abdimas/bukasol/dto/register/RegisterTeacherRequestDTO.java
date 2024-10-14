package com.abdimas.bukasol.dto.register;

import lombok.AllArgsConstructor;
import lombok.Data;
import lombok.NoArgsConstructor;

@Data
@NoArgsConstructor
@AllArgsConstructor
public class RegisterTeacherRequestDTO {
    private String name;
    private String username;
    private String password;
    private String nip;
    private String className;
}
