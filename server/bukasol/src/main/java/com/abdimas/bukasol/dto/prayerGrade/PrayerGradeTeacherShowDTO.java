package com.abdimas.bukasol.dto.prayerGrade;

import java.util.UUID;

import lombok.AllArgsConstructor;
import lombok.Data;
import lombok.NoArgsConstructor;

@Data
@NoArgsConstructor
@AllArgsConstructor
public class PrayerGradeTeacherShowDTO {
    private UUID studentId;
    private String studentNisn;
    private String studentName;
    private double avgSemester1;
    private double avgSemester2;
    private boolean teacherSign;
    private boolean parentSign;
}
