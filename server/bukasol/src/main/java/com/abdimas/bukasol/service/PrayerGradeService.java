package com.abdimas.bukasol.service;

import java.util.UUID;

import org.springframework.data.domain.Page;
import org.springframework.data.domain.Pageable;

import com.abdimas.bukasol.data.model.PrayerGrade;
import com.abdimas.bukasol.dto.prayerGrade.PrayerGradeDTO;
import com.abdimas.bukasol.dto.prayerGrade.PrayerGradeSaveDTO;
import com.abdimas.bukasol.dto.prayerGrade.PrayerGradeUpdateDTO;

public interface PrayerGradeService {
    Page<PrayerGradeDTO> showAllPrayerGradeByStudentId(Pageable pageable, UUID studentId);

    PrayerGrade findGradeById(UUID gradeId);

    PrayerGrade createPrayerGradeStudent(PrayerGradeSaveDTO prayerGradeSaveDTO);

    PrayerGradeDTO updatePrayerGradeStudent(UUID gradeId, PrayerGradeUpdateDTO prayerGradeUpdateDTO);

    String deletePrayerGradeStudent(UUID gradeId);

    PrayerGradeDTO teacherSignPrayerGrade(UUID gradeId);
    PrayerGradeDTO parentSignPrayerGrade(UUID gradeId);
}
