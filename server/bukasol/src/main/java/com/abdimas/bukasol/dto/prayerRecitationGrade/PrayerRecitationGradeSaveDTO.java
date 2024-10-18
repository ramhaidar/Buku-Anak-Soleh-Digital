package com.abdimas.bukasol.dto.prayerRecitationGrade;

import java.util.UUID;

import jakarta.validation.constraints.NotBlank;
import jakarta.validation.constraints.NotNull;
import lombok.AllArgsConstructor;
import lombok.Data;
import lombok.NoArgsConstructor;

@Data
@NoArgsConstructor
@AllArgsConstructor
public class PrayerRecitationGradeSaveDTO {
    @NotNull(message="Student Id is Required")
    private UUID studentId;
    
    @NotBlank(message="Reading Category is Required")
    private String readingCategory;

    @NotNull(message="Grade Semester 1 is Required")
    private double gradeSemester1;

    @NotNull(message="Grade Semester 2 is Required")
    private double gradeSemester2;
}
