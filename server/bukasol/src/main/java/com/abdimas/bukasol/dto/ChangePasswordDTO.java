package com.abdimas.bukasol.dto;

import jakarta.validation.constraints.NotBlank;
import lombok.AllArgsConstructor;
import lombok.Data;
import lombok.NoArgsConstructor;

@Data
@NoArgsConstructor
@AllArgsConstructor
public class ChangePasswordDTO {
    @NotBlank(message="Current Password is Required")
    private String currentPassword;
    
    @NotBlank(message="New Password is Required")
    private String newPassword;

    @NotBlank(message="Confirm New Password is Required")
    private String confirmNewPassword;
}
