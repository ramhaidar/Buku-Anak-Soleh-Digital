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
import com.abdimas.bukasol.dto.prayerGrade.PrayerGradeDTO;
import com.abdimas.bukasol.dto.prayerGrade.PrayerGradeSaveDTO;
import com.abdimas.bukasol.dto.prayerGrade.PrayerGradeUpdateDTO;
import com.abdimas.bukasol.exception.DuplicateEntityException;
import com.abdimas.bukasol.exception.NoContentException;
import com.abdimas.bukasol.mapper.PrayerGradeMapper;
import com.abdimas.bukasol.service.PrayerGradeService;
import com.abdimas.bukasol.service.UserService;

import jakarta.persistence.EntityNotFoundException;
import lombok.AllArgsConstructor;

@Service
@AllArgsConstructor
public class PrayerGradeServiceImpl implements PrayerGradeService {

    private final UserService userService;

    private final PrayerGradeRepository prayerGradeRepository;

    private final PrayerGradeMapper prayerGradeMapper;

    @Override
    public PrayerGrade findGradeById(UUID gradeId) {
        return prayerGradeRepository.findById(gradeId)
                .orElseThrow(() -> new EntityNotFoundException("Student Grade Not Found"));
    }

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
        Student student = userService.findStudentById(prayerGradeSaveDTO.getStudentId());

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

    @Override
    public PrayerGradeDTO updatePrayerGradeStudent(UUID gradeId, PrayerGradeUpdateDTO prayerGradeUpdateDTO) {
        PrayerGrade studentPrayerGrade = findGradeById(gradeId);

        Optional<PrayerGrade> existingGrade = prayerGradeRepository.findByStudentIdAndMotionCategory(studentPrayerGrade.getStudent().getId(), prayerGradeUpdateDTO.getMotionCategory());

        if(existingGrade.isPresent() && !studentPrayerGrade.getMotionCategory().equals(prayerGradeUpdateDTO.getMotionCategory())) {
            throw new DuplicateEntityException("Prayer grade for this motion category already exists for the student");
        }

        studentPrayerGrade.setMotionCategory(prayerGradeUpdateDTO.getMotionCategory());
        studentPrayerGrade.setGradeSemester1(prayerGradeUpdateDTO.getGradeSemester1());
        studentPrayerGrade.setGradeSemester2(prayerGradeUpdateDTO.getGradeSemester2());

        PrayerGrade updatedStudentPrayerGrade = prayerGradeRepository.save(studentPrayerGrade);
        
        return prayerGradeMapper.toPrayerGradeDTO(updatedStudentPrayerGrade);
    }

    @Override
    public String deletePrayerGradeStudent(UUID gradeId) {
        PrayerGrade prayerGrade = findGradeById(gradeId);

        prayerGradeRepository.delete(prayerGrade);

        return "Prayer Grade of Student '" + prayerGrade.getStudent().getUser().getName() + "' Successfully Deleted";
    }

    @Override
    public PrayerGradeDTO teacherSignPrayerGrade(UUID gradeId) {
        PrayerGrade prayerGrade = findGradeById(gradeId);

        prayerGrade.setTeacherSign(!prayerGrade.isTeacherSign());

        PrayerGrade updatedPrayerGrade = prayerGradeRepository.save(prayerGrade);
        
        return prayerGradeMapper.toPrayerGradeDTO(updatedPrayerGrade);
    }


    @Override
    public PrayerGradeDTO parentSignPrayerGrade(UUID gradeId) {
        PrayerGrade prayerGrade = findGradeById(gradeId);

        prayerGrade.setParentSign(!prayerGrade.isParentSign());

        PrayerGrade updatedPrayerGrade = prayerGradeRepository.save(prayerGrade);
        
        return prayerGradeMapper.toPrayerGradeDTO(updatedPrayerGrade);
    }
}