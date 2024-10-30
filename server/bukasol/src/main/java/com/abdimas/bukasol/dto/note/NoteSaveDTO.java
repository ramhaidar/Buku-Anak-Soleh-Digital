package com.abdimas.bukasol.dto.note;

import java.time.LocalDate;
import java.util.UUID;

import jakarta.validation.constraints.NotBlank;
import jakarta.validation.constraints.NotNull;
import lombok.AllArgsConstructor;
import lombok.Data;
import lombok.NoArgsConstructor;

@Data
@NoArgsConstructor
@AllArgsConstructor
public class NoteSaveDTO {
    @NotNull(message="Student Id is Required")
    private UUID studentId;

    @NotNull(message="Time Stamp is Required")
    private LocalDate timeStamp;

    @NotBlank(message="Agenda is Required")
    private String agenda;

    @NotBlank(message="Content is Required")
    private String content;
    
    private String parentQuestion;
}
