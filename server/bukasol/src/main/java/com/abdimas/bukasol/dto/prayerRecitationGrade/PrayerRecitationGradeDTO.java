package com.abdimas.bukasol.dto.prayerRecitationGrade;

import java.time.LocalDate;
import java.util.UUID;

import com.abdimas.bukasol.dto.StudentAdminDTO;

import lombok.AllArgsConstructor;
import lombok.Data;
import lombok.NoArgsConstructor;

@Data
@NoArgsConstructor
@AllArgsConstructor
public class PrayerRecitationGradeDTO {
    private UUID id;
    private LocalDate timeStamp;
    private String readingCategory;
    private double gradeSemester1;
    private double gradeSemester2;
    private boolean teacherSign;
    private boolean parentSign;
    
    private StudentAdminDTO student;
}
