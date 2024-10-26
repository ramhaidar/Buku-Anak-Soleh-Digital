package com.abdimas.bukasol.dto.prayerRecitationGrade;

import java.util.List;

import lombok.AllArgsConstructor;
import lombok.Data;
import lombok.NoArgsConstructor;

@Data
@NoArgsConstructor
@AllArgsConstructor
public class PrayerRecitationGradeInfoDTO {
    private String className;
    private String teacherName;

    private List<PrayerRecitationGradeTeacherShowDTO> prayerRecitationGrades;
}
