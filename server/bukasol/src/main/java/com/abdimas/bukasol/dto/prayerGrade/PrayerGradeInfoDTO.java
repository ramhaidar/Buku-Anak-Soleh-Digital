package com.abdimas.bukasol.dto.prayerGrade;

import java.util.List;

import lombok.AllArgsConstructor;
import lombok.Data;
import lombok.NoArgsConstructor;

@Data
@NoArgsConstructor
@AllArgsConstructor
public class PrayerGradeInfoDTO {
    private String className;
    private String teacherName;

    private List<PrayerGradeTeacherShowDTO> prayerGrade;
}
