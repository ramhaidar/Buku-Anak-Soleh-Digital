package com.abdimas.bukasol.dto.readActivity;

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
public class ReadActivitySaveDTO {
    @NotNull(message="Student Id is Required")
    private UUID studentId;

    @NotNull(message="Time Stamp is Required")
    private LocalDate timeStamp;

    @NotBlank(message="Book Title is Required")
    private String bookTitle;

    @NotBlank(message="Book Page is Required")
    private String page;
}
