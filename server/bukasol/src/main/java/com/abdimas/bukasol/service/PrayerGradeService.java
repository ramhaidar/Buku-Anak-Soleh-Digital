package com.abdimas.bukasol.service;

import java.io.IOException;
import java.util.List;
import java.util.UUID;

import com.abdimas.bukasol.data.model.PrayerGrade;
import com.abdimas.bukasol.dto.prayerGrade.PrayerGradeDTO;
import com.abdimas.bukasol.dto.prayerGrade.PrayerGradeInfoDTO;
import com.abdimas.bukasol.dto.prayerGrade.PrayerGradeSaveDTO;
import com.abdimas.bukasol.dto.prayerGrade.PrayerGradeUpdateDTO;

public interface PrayerGradeService {
    List<PrayerGradeDTO> showAllPrayerGradeByStudentId(UUID studentId);

    PrayerGradeInfoDTO showAllPrayerGradeByClass(String className);

    PrayerGrade findGradeById(UUID gradeId);

    PrayerGrade createPrayerGradeStudent(PrayerGradeSaveDTO prayerGradeSaveDTO);

    PrayerGradeDTO updatePrayerGradeStudent(UUID gradeId, PrayerGradeUpdateDTO prayerGradeUpdateDTO);

    String deletePrayerGradeStudent(UUID gradeId);

    PrayerGradeDTO teacherSignPrayerGrade(UUID gradeId);
    PrayerGradeDTO parentSignPrayerGrade(UUID gradeId);

    byte[] generateGradeReportPdf(UUID studentId) throws IOException;
}
