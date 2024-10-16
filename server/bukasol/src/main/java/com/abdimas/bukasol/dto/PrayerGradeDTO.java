package com.abdimas.bukasol.dto;

import java.time.LocalDate;
import java.util.UUID;

import lombok.AllArgsConstructor;
import lombok.Data;
import lombok.NoArgsConstructor;

@Data
@NoArgsConstructor
@AllArgsConstructor
public class PrayerGradeDTO {
    private UUID id;
    private LocalDate timeStamp;
    private String motionCategory;
    private double gradeSemester1;
    private double gradeSemester2;
    private boolean teacherSign;
    private boolean parentSign;
    
    private StudentDTO student;
}
