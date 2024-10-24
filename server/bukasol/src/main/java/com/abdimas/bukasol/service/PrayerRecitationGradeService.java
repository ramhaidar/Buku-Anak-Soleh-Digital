package com.abdimas.bukasol.service;

import java.io.IOException;
import java.util.List;
import java.util.UUID;

import com.abdimas.bukasol.data.model.PrayerRecitationGrade;
import com.abdimas.bukasol.dto.prayerRecitationGrade.PrayerRecitationGradeDTO;
import com.abdimas.bukasol.dto.prayerRecitationGrade.PrayerRecitationGradeInfoDTO;
import com.abdimas.bukasol.dto.prayerRecitationGrade.PrayerRecitationGradeSaveDTO;
import com.abdimas.bukasol.dto.prayerRecitationGrade.PrayerRecitationGradeUpdateDTO;

public interface PrayerRecitationGradeService {
    List<PrayerRecitationGradeDTO> showAllPrayerRecitationGradeByStudentId(UUID studentId);

    PrayerRecitationGradeInfoDTO showAllPrayerRecitationGradeByClass(String className);

    PrayerRecitationGrade findGradeById(UUID gradeId);

    PrayerRecitationGrade createPrayerRecitationGradeStudent(PrayerRecitationGradeSaveDTO prayerGradeSaveDTO);

    PrayerRecitationGradeDTO updatePrayerRecitationGradeStudent(UUID gradeId, PrayerRecitationGradeUpdateDTO prayerRecitationGradeUpdateDTO);

    String deletePrayerRecitationGradeStudent(UUID gradeId);

    PrayerRecitationGradeDTO teacherSignPrayerRecitationGrade(UUID gradeId);
    PrayerRecitationGradeDTO parentSignPrayerRecitationGrade(UUID gradeId);

    byte[] generateRecitationGradeReportPdf(UUID studentId) throws IOException;
}
