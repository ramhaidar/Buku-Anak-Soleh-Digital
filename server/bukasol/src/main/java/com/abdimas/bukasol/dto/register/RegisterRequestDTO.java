package com.abdimas.bukasol.dto.register;

import jakarta.validation.constraints.NotBlank;
import lombok.AllArgsConstructor;
import lombok.Data;
import lombok.NoArgsConstructor;

@Data
@NoArgsConstructor
@AllArgsConstructor
public class RegisterRequestDTO {
    @NotBlank(message="Name is Required")
    private String name;
    
    @NotBlank(message="Username is Required")
    private String username;

    @NotBlank(message="Password is Required")
    private String password;
}
