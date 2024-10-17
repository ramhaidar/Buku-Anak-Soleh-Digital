package com.abdimas.bukasol.service.impl;

import java.util.UUID;

import org.springframework.data.domain.Page;
import org.springframework.data.domain.Pageable;
import org.springframework.stereotype.Service;

import com.abdimas.bukasol.data.model.PrayerGrade;
import com.abdimas.bukasol.data.model.PrayerRecitationGrade;
import com.abdimas.bukasol.data.repository.PrayerRecitationGradeRepository;
import com.abdimas.bukasol.dto.prayerGrade.PrayerGradeSaveDTO;
import com.abdimas.bukasol.dto.prayerRecitationGrade.PrayerRecitationGradeDTO;
import com.abdimas.bukasol.dto.prayerRecitationGrade.PrayerRecitationGradeUpdateDTO;
import com.abdimas.bukasol.mapper.PrayerRecitationGradeMapper;
import com.abdimas.bukasol.service.PrayerRecitationGradeService;
import com.abdimas.bukasol.service.UserService;

import lombok.AllArgsConstructor;

@Service
@AllArgsConstructor
public class PrayerRecitationGradeServiceImpl implements PrayerRecitationGradeService {

    private final UserService userService;
    
    private final PrayerRecitationGradeRepository prayerRecitationGradeRepository;

    private final PrayerRecitationGradeMapper prayerRecitationGradeMapper;

    @Override
    public Page<PrayerRecitationGradeDTO> showAllPrayerRecitationGradeByStudentId(Pageable pageable, UUID studentId) {
        return null;
    }

    @Override
    public PrayerRecitationGrade findGradeById(UUID gradeId) {
        return null;
    }

    @Override
    public PrayerGrade createPrayerRecitationGradeStudent(PrayerGradeSaveDTO prayerGradeSaveDTO) {
        return null;
    }

    @Override
    public PrayerRecitationGradeDTO updatePrayerRecitationGradeStudent(UUID gradeId, PrayerRecitationGradeUpdateDTO prayerRecitationGradeUpdateDTO) {
        return null;
    }

    @Override
    public String deletePrayerRecitationGradeStudent(UUID gradeId) {
        return null;
    }

    @Override
    public PrayerRecitationGradeDTO teacherSignPrayerRecitationGrade(UUID gradeId) {
        return null;
    }

    @Override
    public PrayerRecitationGradeDTO parentSignPrayerRecitationGrade(UUID gradeId) {
        return null;
    }
}
