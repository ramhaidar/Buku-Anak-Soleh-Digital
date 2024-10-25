package com.abdimas.bukasol.service.impl;

import java.io.IOException;
import java.time.LocalDate;
import java.util.ArrayList;
import java.util.List;
import java.util.Optional;
import java.util.UUID;

import org.springframework.stereotype.Service;

import com.abdimas.bukasol.data.model.PrayerRecitationGrade;
import com.abdimas.bukasol.data.model.Student;
import com.abdimas.bukasol.data.repository.PrayerRecitationGradeRepository;
import com.abdimas.bukasol.dto.prayerRecitationGrade.PrayerRecitationGradeDTO;
import com.abdimas.bukasol.dto.prayerRecitationGrade.PrayerRecitationGradeInfoDTO;
import com.abdimas.bukasol.dto.prayerRecitationGrade.PrayerRecitationGradeSaveDTO;
import com.abdimas.bukasol.dto.prayerRecitationGrade.PrayerRecitationGradeTeacherShowDTO;
import com.abdimas.bukasol.dto.prayerRecitationGrade.PrayerRecitationGradeUpdateDTO;
import com.abdimas.bukasol.exception.DuplicateEntityException;
import com.abdimas.bukasol.exception.EntityNotFoundException;
import com.abdimas.bukasol.exception.MismatchException;
import com.abdimas.bukasol.exception.NoContentException;
import com.abdimas.bukasol.mapper.PrayerRecitationGradeMapper;
import com.abdimas.bukasol.service.PrayerRecitationGradeService;
import com.abdimas.bukasol.service.UserService;
import com.abdimas.bukasol.utils.PDFGenerator;

import lombok.AllArgsConstructor;

@Service
@AllArgsConstructor
public class PrayerRecitationGradeServiceImpl implements PrayerRecitationGradeService {

    private final UserService userService;
    
    private final PrayerRecitationGradeRepository prayerRecitationGradeRepository;

    private final PrayerRecitationGradeMapper prayerRecitationGradeMapper;

    private final PDFGenerator pdfGenerator;

    @Override
    public PrayerRecitationGrade findGradeById(UUID gradeId) {
        return prayerRecitationGradeRepository.findById(gradeId)
                .orElseThrow(() -> new EntityNotFoundException("Student Recitation Grade Not Found"));
    }

    @Override
    public List<PrayerRecitationGradeDTO> showAllPrayerRecitationGradeByStudentId(UUID studentId) {
        List<PrayerRecitationGrade> prayerRecitationGrades = prayerRecitationGradeRepository.findAllByStudentId(studentId);

        if(prayerRecitationGrades.isEmpty()) {
            throw new NoContentException("There is No Prayer Recitation Grade for The Student");
        }
        
        return prayerRecitationGradeMapper.toPrayerRecitationGradeDTOs(prayerRecitationGrades);
    }

    @Override
    public PrayerRecitationGradeInfoDTO showAllPrayerRecitationGradeByClass(String className) {
        PrayerRecitationGradeInfoDTO prayerRecitationGradeInfoDTO = new PrayerRecitationGradeInfoDTO();
        List<PrayerRecitationGradeTeacherShowDTO> prayerRecitationGradeTeacherShowDTOs = new ArrayList<>();

        List<Student> students = userService.findStudentByClassName(className);

        prayerRecitationGradeInfoDTO.setClassName(className);
        prayerRecitationGradeInfoDTO.setTeacherName(students.get(0).getTeacher().getUser().getName());

        for(Student student : students) {
            PrayerRecitationGradeTeacherShowDTO prayerRecitationGradeTeacherShowDTO = new PrayerRecitationGradeTeacherShowDTO();
            List<PrayerRecitationGrade> prayerRecitationGrades = prayerRecitationGradeRepository.findAllByStudentId(student.getId());

            boolean teacherSign = false;
            boolean parentSign = false;

            double avgSemester1 = prayerRecitationGrades.stream().mapToDouble(PrayerRecitationGrade::getGradeSemester1).average().orElse(0.0);
            double avgSemester2 = prayerRecitationGrades.stream().mapToDouble(PrayerRecitationGrade::getGradeSemester2).average().orElse(0.0);

            long teacherSignTrue = prayerRecitationGradeRepository.countTeacherSignTrueByStudentId(student.getId());
            long teacherSignFalse = prayerRecitationGradeRepository.countTeacherSignFalseByStudentId(student.getId());

            long parentSignTrue = prayerRecitationGradeRepository.countParentSignTrueByStudentId(student.getId());
            long parentSignFalse = prayerRecitationGradeRepository.countParentSignFalseByStudentId(student.getId());

            if(teacherSignTrue >= teacherSignFalse && teacherSignFalse == 0) {
                teacherSign = true;
            }

            if(parentSignTrue >= parentSignFalse && parentSignFalse == 0) {
                parentSign = true;
            }

            prayerRecitationGradeTeacherShowDTO.setStudentId(student.getId());
            prayerRecitationGradeTeacherShowDTO.setStudentNisn(student.getNisn());
            prayerRecitationGradeTeacherShowDTO.setStudentName(student.getUser().getName());
            prayerRecitationGradeTeacherShowDTO.setAvgSemester1(avgSemester1);
            prayerRecitationGradeTeacherShowDTO.setAvgSemester2(avgSemester2);
            prayerRecitationGradeTeacherShowDTO.setTeacherSign(teacherSign);
            prayerRecitationGradeTeacherShowDTO.setParentSign(parentSign);

            prayerRecitationGradeTeacherShowDTOs.add(prayerRecitationGradeTeacherShowDTO);
        }

        prayerRecitationGradeInfoDTO.setPrayerRecitationGrades(prayerRecitationGradeTeacherShowDTOs);
        
        return prayerRecitationGradeInfoDTO;
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
    public PrayerRecitationGradeDTO parentSignPrayerRecitationGrade(UUID gradeId, String parentCode) {
        PrayerRecitationGrade prayerRecitationGrade = findGradeById(gradeId);
        Student student = userService.findStudentById(prayerRecitationGrade.getStudent().getId());

        if(student.getParentCode().equals(parentCode)) {
            prayerRecitationGrade.setParentSign(!prayerRecitationGrade.isParentSign());
        } else {
            throw new MismatchException("Wrong Parent Code");
        }

        PrayerRecitationGrade updatedPrayerRecitationGrade = prayerRecitationGradeRepository.save(prayerRecitationGrade);
        
        return prayerRecitationGradeMapper.toPrayerRecitationGradeDTO(updatedPrayerRecitationGrade);
    }

    @Override
    public byte[] generateRecitationGradeReportPdf(UUID studentId) throws IOException {
        List<PrayerRecitationGrade> prayerGrades = prayerRecitationGradeRepository.findAllByStudentId(studentId);
        
        List<PrayerRecitationGradeDTO> prayerGradeDTOs = prayerRecitationGradeMapper.toPrayerRecitationGradeDTOs(prayerGrades);

        String teacherSign = "Belum";
        String parentSign = "Belum";

        long teacherSignFalse = prayerRecitationGradeRepository.countTeacherSignFalseByStudentId(prayerGradeDTOs.get(0).getStudent().getId());

        long parentSignFalse = prayerRecitationGradeRepository.countParentSignFalseByStudentId(prayerGradeDTOs.get(0).getStudent().getId());

        if(teacherSignFalse == 0) {
            teacherSign = "Sudah";
        }

        if(parentSignFalse == 0) {
            parentSign = "Sudah";
        }
        
        return pdfGenerator.generateRecitationGradeReport(prayerGradeDTOs, teacherSign, parentSign);
    }
}
