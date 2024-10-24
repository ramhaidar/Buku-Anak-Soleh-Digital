package com.abdimas.bukasol.service.impl;

import java.io.IOException;
import java.time.LocalDate;
import java.util.ArrayList;
import java.util.List;
import java.util.Optional;
import java.util.UUID;

import org.springframework.stereotype.Service;

import com.abdimas.bukasol.data.model.PrayerGrade;
import com.abdimas.bukasol.data.model.Student;
import com.abdimas.bukasol.data.repository.PrayerGradeRepository;
import com.abdimas.bukasol.dto.prayerGrade.PrayerGradeDTO;
import com.abdimas.bukasol.dto.prayerGrade.PrayerGradeInfoDTO;
import com.abdimas.bukasol.dto.prayerGrade.PrayerGradeSaveDTO;
import com.abdimas.bukasol.dto.prayerGrade.PrayerGradeTeacherShowDTO;
import com.abdimas.bukasol.dto.prayerGrade.PrayerGradeUpdateDTO;
import com.abdimas.bukasol.exception.DuplicateEntityException;
import com.abdimas.bukasol.exception.NoContentException;
import com.abdimas.bukasol.mapper.PrayerGradeMapper;
import com.abdimas.bukasol.service.PrayerGradeService;
import com.abdimas.bukasol.service.UserService;
import com.abdimas.bukasol.utils.PDFGenerator;

import jakarta.persistence.EntityNotFoundException;
import lombok.AllArgsConstructor;

@Service
@AllArgsConstructor
public class PrayerGradeServiceImpl implements PrayerGradeService {

    private final UserService userService;

    private final PrayerGradeRepository prayerGradeRepository;

    private final PrayerGradeMapper prayerGradeMapper;

    private final PDFGenerator pdfGenerator;

    @Override
    public PrayerGrade findGradeById(UUID gradeId) {
        return prayerGradeRepository.findById(gradeId)
                .orElseThrow(() -> new EntityNotFoundException("Student Grade Not Found"));
    }

    @Override
    public List<PrayerGradeDTO> showAllPrayerGradeByStudentId(UUID studentId) {
        List<PrayerGrade> prayerGrades = prayerGradeRepository.findAllByStudentId(studentId);
        
        if(prayerGrades.isEmpty()) {
            throw new NoContentException("There is No Prayer Grade for This Student");
        }
        
        return prayerGradeMapper.toPrayerGradeDTOs(prayerGrades);
    }

    @Override
    public PrayerGradeInfoDTO showAllPrayerGradeByClass(String className) {
        PrayerGradeInfoDTO prayerGradeinfoDTO = new PrayerGradeInfoDTO();
        List<PrayerGradeTeacherShowDTO> prayerGradeTeacherShowDTOs = new ArrayList<>();
        
        List<Student> students = userService.findStudentByClassName(className);

        prayerGradeinfoDTO.setClassName(className);
        prayerGradeinfoDTO.setTeacherName(students.get(0).getTeacher().getUser().getName());

        for(Student student : students) {
            PrayerGradeTeacherShowDTO prayerGradeTeacherShowDTO = new PrayerGradeTeacherShowDTO();

            List<PrayerGrade> prayerGrades = prayerGradeRepository.findAllByStudentId(student.getId());
            
            boolean teacherSign = false;
            boolean parentSign = false;

            double avgSemester1 = prayerGrades.stream().mapToDouble(PrayerGrade::getGradeSemester1).average().orElse(0.0);
            double avgSemester2 = prayerGrades.stream().mapToDouble(PrayerGrade::getGradeSemester2).average().orElse(0.0);

            long teacherSignTrue = prayerGradeRepository.countTeacherSignTrueByStudentId(student.getId());
            long teacherSignFalse = prayerGradeRepository.countTeacherSignFalseByStudentId(student.getId());

            long parentSignTrue = prayerGradeRepository.countParentSignTrueByStudentId(student.getId());
            long parentSignFalse = prayerGradeRepository.countParentSignFalseByStudentId(student.getId());

            if(teacherSignTrue >= teacherSignFalse && teacherSignFalse == 0) {
                teacherSign = true;
            }

            if(parentSignTrue >= parentSignFalse && parentSignFalse == 0) {
                parentSign = true;
            }

            prayerGradeTeacherShowDTO.setStudentId(student.getId());
            prayerGradeTeacherShowDTO.setStudentNisn(student.getNisn());
            prayerGradeTeacherShowDTO.setStudentName(student.getUser().getName());
            prayerGradeTeacherShowDTO.setAvgSemester1(avgSemester1);
            prayerGradeTeacherShowDTO.setAvgSemester2(avgSemester2);
            prayerGradeTeacherShowDTO.setTeacherSign(teacherSign);
            prayerGradeTeacherShowDTO.setParentSign(parentSign);

            prayerGradeTeacherShowDTOs.add(prayerGradeTeacherShowDTO);
        }

        prayerGradeinfoDTO.setPrayerGrades(prayerGradeTeacherShowDTOs);

        return prayerGradeinfoDTO;
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

        return "Prayer Grade '" + prayerGrade.getMotionCategory() + "' of Student '" + prayerGrade.getStudent().getUser().getName() + "' Successfully Deleted";
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

    @Override
    public byte[] generateGradeReportPdf(UUID studentId) throws IOException {
        List<PrayerGrade> prayerGrades = prayerGradeRepository.findAllByStudentId(studentId);
        
        List<PrayerGradeDTO> prayerGradeDTOs = prayerGradeMapper.toPrayerGradeDTOs(prayerGrades);
        
        return pdfGenerator.generateGradeReport(prayerGradeDTOs);
    }
}