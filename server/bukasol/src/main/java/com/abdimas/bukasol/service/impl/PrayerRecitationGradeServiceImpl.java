package com.abdimas.bukasol.service.impl;

import java.time.LocalDate;
import java.util.Optional;
import java.util.UUID;

import org.springframework.data.domain.Page;
import org.springframework.data.domain.Pageable;
import org.springframework.stereotype.Service;

import com.abdimas.bukasol.data.model.PrayerRecitationGrade;
import com.abdimas.bukasol.data.model.Student;
import com.abdimas.bukasol.data.repository.PrayerRecitationGradeRepository;
import com.abdimas.bukasol.dto.prayerRecitationGrade.PrayerRecitationGradeDTO;
import com.abdimas.bukasol.dto.prayerRecitationGrade.PrayerRecitationGradeSaveDTO;
import com.abdimas.bukasol.dto.prayerRecitationGrade.PrayerRecitationGradeUpdateDTO;
import com.abdimas.bukasol.exception.DuplicateEntityException;
import com.abdimas.bukasol.exception.EntityNotFoundException;
import com.abdimas.bukasol.exception.NoContentException;
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
        Page<PrayerRecitationGradeDTO> prayerRecitationGrades = prayerRecitationGradeRepository.findAllByStudentId(pageable, studentId).map(prayerRecitationGradeMapper::toPrayerRecitationGradeDTO);
        
        if(prayerRecitationGrades.isEmpty()) {
            throw new NoContentException("Student Does not Has Prayer Recitation Grade");
        }

        return prayerRecitationGrades;
    }

    @Override
    public PrayerRecitationGrade findGradeById(UUID gradeId) {
        return prayerRecitationGradeRepository.findById(gradeId)
                .orElseThrow(() -> new EntityNotFoundException("Student Recitation Grade Not Found"));
    }

    @Override
    public PrayerRecitationGrade createPrayerRecitationGradeStudent(PrayerRecitationGradeSaveDTO prayerRecitationGradeSaveDTO) {
        Student student = userService.findStudentById(prayerRecitationGradeSaveDTO.getStudentId());

        Optional<PrayerRecitationGrade> existingRecitationGrade = prayerRecitationGradeRepository.findByStudentIdAndReadingCategory(prayerRecitationGradeSaveDTO.getStudentId(), prayerRecitationGradeSaveDTO.getReadingCategory());

        if(existingRecitationGrade.isPresent()) {
            throw new DuplicateEntityException("Prayer Recitation grade for this reading category already exists for the student");
        }

        PrayerRecitationGrade prayerRecitationGrade = new PrayerRecitationGrade();
        prayerRecitationGrade.setStudent(student);
        prayerRecitationGrade.setTimeStamp(LocalDate.now());
        prayerRecitationGrade.setReadingCategory(prayerRecitationGradeSaveDTO.getReadingCategory());
        prayerRecitationGrade.setGradeSemester1(prayerRecitationGradeSaveDTO.getGradeSemester1());
        prayerRecitationGrade.setGradeSemester2(prayerRecitationGradeSaveDTO.getGradeSemester2());
        prayerRecitationGrade.setTeacherSign(false);
        prayerRecitationGrade.setParentSign(false);
        
        return prayerRecitationGradeRepository.save(prayerRecitationGrade);
    }

    @Override
    public PrayerRecitationGradeDTO updatePrayerRecitationGradeStudent(UUID gradeId, PrayerRecitationGradeUpdateDTO prayerRecitationGradeUpdateDTO) {
        PrayerRecitationGrade studentPrayerRecitationGrade = findGradeById(gradeId);

        Optional<PrayerRecitationGrade> existingRecitationGrade = prayerRecitationGradeRepository.findByStudentIdAndReadingCategory(studentPrayerRecitationGrade.getStudent().getId(), prayerRecitationGradeUpdateDTO.getReadingCategory());

        if(existingRecitationGrade.isPresent() && !studentPrayerRecitationGrade.getReadingCategory().equals(prayerRecitationGradeUpdateDTO.getReadingCategory())) {
            throw new DuplicateEntityException("Prayer Recitation grade for this reading category already exists for the student");
        }

        studentPrayerRecitationGrade.setReadingCategory(prayerRecitationGradeUpdateDTO.getReadingCategory());
        studentPrayerRecitationGrade.setGradeSemester1(prayerRecitationGradeUpdateDTO.getGradeSemester1());
        studentPrayerRecitationGrade.setGradeSemester2(prayerRecitationGradeUpdateDTO.getGradeSemester2());

        PrayerRecitationGrade updatedStudentPrayerRecitationGrade = prayerRecitationGradeRepository.save(studentPrayerRecitationGrade);
        
        return prayerRecitationGradeMapper.toPrayerRecitationGradeDTO(updatedStudentPrayerRecitationGrade);
    }

    @Override
    public String deletePrayerRecitationGradeStudent(UUID gradeId) {
        PrayerRecitationGrade prayerRecitationGrade = findGradeById(gradeId);

        prayerRecitationGradeRepository.delete(prayerRecitationGrade);
        
        return "Prayer Recitation Grade '" + prayerRecitationGrade.getReadingCategory() + "' of Student '" + prayerRecitationGrade.getStudent().getUser().getName() + "' Successfully Deleted";
    }

    @Override
    public PrayerRecitationGradeDTO teacherSignPrayerRecitationGrade(UUID gradeId) {
        PrayerRecitationGrade prayerRecitationGrade = findGradeById(gradeId);

        prayerRecitationGrade.setTeacherSign(!prayerRecitationGrade.isTeacherSign());

        PrayerRecitationGrade updatedPrayerRecitationGrade = prayerRecitationGradeRepository.save(prayerRecitationGrade);
        
        return prayerRecitationGradeMapper.toPrayerRecitationGradeDTO(updatedPrayerRecitationGrade);
    }

    @Override
    public PrayerRecitationGradeDTO parentSignPrayerRecitationGrade(UUID gradeId) {
        PrayerRecitationGrade prayerRecitationGrade = findGradeById(gradeId);

        prayerRecitationGrade.setParentSign(!prayerRecitationGrade.isParentSign());

        PrayerRecitationGrade updatedPrayerRecitationGrade = prayerRecitationGradeRepository.save(prayerRecitationGrade);
        
        return prayerRecitationGradeMapper.toPrayerRecitationGradeDTO(updatedPrayerRecitationGrade);
    }
}
