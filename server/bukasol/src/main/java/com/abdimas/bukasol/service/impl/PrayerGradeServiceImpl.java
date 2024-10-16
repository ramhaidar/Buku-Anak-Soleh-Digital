package com.abdimas.bukasol.service.impl;

import java.util.UUID;

import org.springframework.data.domain.Page;
import org.springframework.data.domain.Pageable;
import org.springframework.stereotype.Service;

import com.abdimas.bukasol.data.repository.PrayerGradeRepository;
import com.abdimas.bukasol.dto.PrayerGradeDTO;
import com.abdimas.bukasol.exception.NoContentException;
import com.abdimas.bukasol.mapper.PrayerGradeMapper;
import com.abdimas.bukasol.service.PrayerGradeService;

import lombok.AllArgsConstructor;

@Service
@AllArgsConstructor
public class PrayerGradeServiceImpl implements PrayerGradeService {

    private final PrayerGradeRepository prayerGradeRepository;

    private final PrayerGradeMapper prayerGradeMapper;

    @Override
    public Page<PrayerGradeDTO> showAllPrayerGradeByStudentId(Pageable pageable, UUID studentId) {
        Page<PrayerGradeDTO> prayerGrades = prayerGradeRepository.findAllByStudentId(pageable, studentId).map(prayerGradeMapper::toPrayerGradeDTO);

        if(prayerGrades.isEmpty()) {
            throw new NoContentException("Student Does not Has Prayer Grade");
        }

       return prayerGrades;
    }
}
