package com.abdimas.bukasol.service;

import java.util.UUID;

import org.springframework.data.domain.Page;
import org.springframework.data.domain.Pageable;

import com.abdimas.bukasol.data.model.PrayerGrade;
import com.abdimas.bukasol.dto.PrayerGradeDTO;
import com.abdimas.bukasol.dto.PrayerGradeSaveDTO;

public interface PrayerGradeService {
    Page<PrayerGradeDTO> showAllPrayerGradeByStudentId(Pageable pageable, UUID studentId);

    PrayerGrade createPrayerGradeStudent(PrayerGradeSaveDTO prayerGradeSaveDTO);
}
