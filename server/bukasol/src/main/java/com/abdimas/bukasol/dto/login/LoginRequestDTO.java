package com.abdimas.bukasol.dto.login;

import jakarta.validation.constraints.NotBlank;
import lombok.AllArgsConstructor;
import lombok.Data;
import lombok.NoArgsConstructor;

@Data
@NoArgsConstructor
@AllArgsConstructor
public class LoginRequestDTO {
    @NotBlank(message="Username is Required")
    private String username;

    @NotBlank(message="Password is Required")
    private String password;
}
