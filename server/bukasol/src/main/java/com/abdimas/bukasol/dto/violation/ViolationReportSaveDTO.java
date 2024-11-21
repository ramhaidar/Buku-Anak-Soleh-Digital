package com.abdimas.bukasol.dto.violation;

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
public class ViolationReportSaveDTO {
    @NotNull(message="Student Id is Required")
    private UUID studentId;

    @NotNull(message="Time Stamp is Required")
    private LocalDate timeStamp;

    @NotBlank(message="Violation Detail is Required")
    private String violationDetails;

    @NotBlank(message="Consequence is Required")
    private String consequence;
}
