package com.abdimas.bukasol.dto;

import java.util.UUID;

import lombok.AllArgsConstructor;
import lombok.Data;
import lombok.NoArgsConstructor;

@Data
@NoArgsConstructor
@AllArgsConstructor
public class TeacherDTO {
    private UUID id;
    private String nip;
    private String className;

    private UserDTO user;
}
