package com.abdimas.bukasol.service.impl;

import java.time.LocalDate;
import java.util.Optional;
import java.util.UUID;

import org.springframework.data.domain.Page;
import org.springframework.data.domain.Pageable;
import org.springframework.stereotype.Service;

import com.abdimas.bukasol.data.model.PrayerGrade;
import com.abdimas.bukasol.data.model.Student;
import com.abdimas.bukasol.data.repository.PrayerGradeRepository;
import com.abdimas.bukasol.data.repository.StudentRepository;
import com.abdimas.bukasol.dto.PrayerGradeDTO;
import com.abdimas.bukasol.dto.PrayerGradeSaveDTO;
import com.abdimas.bukasol.exception.DuplicateEntityException;
import com.abdimas.bukasol.exception.EntityNotFoundException;
import com.abdimas.bukasol.exception.NoContentException;
import com.abdimas.bukasol.mapper.PrayerGradeMapper;
import com.abdimas.bukasol.service.PrayerGradeService;

import lombok.AllArgsConstructor;

@Service
@AllArgsConstructor
public class PrayerGradeServiceImpl implements PrayerGradeService {

    private final PrayerGradeRepository prayerGradeRepository;
    private final StudentRepository studentRepository;

    private final PrayerGradeMapper prayerGradeMapper;

    @Override
    public Page<PrayerGradeDTO> showAllPrayerGradeByStudentId(Pageable pageable, UUID studentId) {
        Page<PrayerGradeDTO> prayerGrades = prayerGradeRepository.findAllByStudentId(pageable, studentId).map(prayerGradeMapper::toPrayerGradeDTO);

        if(prayerGrades.isEmpty()) {
            throw new NoContentException("Student Does not Has Prayer Grade");
        }

       return prayerGrades;
    }

    @Override
    public PrayerGrade createPrayerGradeStudent(PrayerGradeSaveDTO prayerGradeSaveDTO) {
        Student student = studentRepository.findById(prayerGradeSaveDTO.getStudentId())
                .orElseThrow(() -> new EntityNotFoundException("Student Not Found"));

        Optional<PrayerGrade> existingGrade = prayerGradeRepository.findByStudentIdAndMotionCategory(prayerGradeSaveDTO.getStudentId(), prayerGradeSaveDTO.getMotionCategory());

        if(existingGrade.isPresent()) {
            throw new DuplicateEntityException("Prayer grade for this motion category already exists for the student");
        }

        PrayerGrade prayerGrade = new PrayerGrade();
        prayerGrade.setStudent(student);
        prayerGrade.setTimeStamp(LocalDate.now());
        prayerGrade.setMotionCategory(prayerGradeSaveDTO.getMotionCategory());
        prayerGrade.setGradeSemester1(prayerGradeSaveDTO.getGradeSemester1());
        prayerGrade.setGradeSemester2(prayerGradeSaveDTO.getGradeSemester2());
        prayerGrade.setTeacherSign(false);
        prayerGrade.setParentSign(false);

        return prayerGradeRepository.save(prayerGrade);
    }
}