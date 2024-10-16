package com.abdimas.bukasol.service;

import java.util.UUID;

import org.springframework.data.domain.Page;
import org.springframework.data.domain.Pageable;

import com.abdimas.bukasol.dto.PrayerGradeDTO;

public interface PrayerGradeService {
    Page<PrayerGradeDTO> showAllPrayerGradeByStudentId(Pageable pageable, UUID studentId);
}
