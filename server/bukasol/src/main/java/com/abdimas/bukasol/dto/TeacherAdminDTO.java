package com.abdimas.bukasol.dto;

import java.util.UUID;

import lombok.AllArgsConstructor;
import lombok.Data;
import lombok.NoArgsConstructor;

@Data
@NoArgsConstructor
@AllArgsConstructor
public class TeacherAdminDTO {
    private UUID id;
    private String name;
    private String nip;
    private String className;
    private String username;
    private String password;
}
