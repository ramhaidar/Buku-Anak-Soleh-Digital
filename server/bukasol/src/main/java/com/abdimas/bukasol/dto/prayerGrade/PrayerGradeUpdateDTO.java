package com.abdimas.bukasol.dto.prayerGrade;

import jakarta.validation.constraints.NotBlank;
import jakarta.validation.constraints.NotNull;
import lombok.AllArgsConstructor;
import lombok.Data;
import lombok.NoArgsConstructor;

@Data
@NoArgsConstructor
@AllArgsConstructor
public class PrayerGradeUpdateDTO {
    @NotBlank(message="Motion Category is Required")
    private String motionCategory;

    @NotNull(message="Grade Semester 1 is Required")
    private double gradeSemester1;

    @NotNull(message="Grade Semester 2 is Required")
    private double gradeSemester2;
}
