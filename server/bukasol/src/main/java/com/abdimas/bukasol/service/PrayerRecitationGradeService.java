package com.abdimas.bukasol.service;

import java.util.UUID;

import org.springframework.data.domain.Page;
import org.springframework.data.domain.Pageable;

import com.abdimas.bukasol.data.model.PrayerRecitationGrade;
import com.abdimas.bukasol.dto.prayerRecitationGrade.PrayerRecitationGradeDTO;
import com.abdimas.bukasol.dto.prayerRecitationGrade.PrayerRecitationGradeSaveDTO;
import com.abdimas.bukasol.dto.prayerRecitationGrade.PrayerRecitationGradeUpdateDTO;

public interface PrayerRecitationGradeService {
    Page<PrayerRecitationGradeDTO> showAllPrayerRecitationGradeByStudentId(Pageable pageable, UUID studentId);

    PrayerRecitationGrade findGradeById(UUID gradeId);

    PrayerRecitationGrade createPrayerRecitationGradeStudent(PrayerRecitationGradeSaveDTO prayerGradeSaveDTO);

    PrayerRecitationGradeDTO updatePrayerRecitationGradeStudent(UUID gradeId, PrayerRecitationGradeUpdateDTO prayerRecitationGradeUpdateDTO);

    String deletePrayerRecitationGradeStudent(UUID gradeId);

    PrayerRecitationGradeDTO teacherSignPrayerRecitationGrade(UUID gradeId);
    PrayerRecitationGradeDTO parentSignPrayerRecitationGrade(UUID gradeId);
}
