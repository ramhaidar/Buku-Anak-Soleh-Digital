package com.abdimas.bukasol.service.impl;

import java.util.ArrayList;
import java.util.List;
import java.util.UUID;

import org.springframework.stereotype.Service;

import com.abdimas.bukasol.data.model.Student;
import com.abdimas.bukasol.data.model.ViolationReport;
import com.abdimas.bukasol.data.repository.ViolationReportRepository;
import com.abdimas.bukasol.dto.violation.ViolationReportDTO;
import com.abdimas.bukasol.dto.violation.ViolationReportInfoDTO;
import com.abdimas.bukasol.dto.violation.ViolationReportSaveDTO;
import com.abdimas.bukasol.dto.violation.ViolationReportTeacherShowDTO;
import com.abdimas.bukasol.exception.NoContentException;
import com.abdimas.bukasol.mapper.ViolationReportMapper;
import com.abdimas.bukasol.service.UserService;
import com.abdimas.bukasol.service.ViolationReportService;

import jakarta.persistence.EntityNotFoundException;
import lombok.AllArgsConstructor;

@Service
@AllArgsConstructor
public class ViolationReportImpl implements ViolationReportService {

    private final ViolationReportRepository violationReportRepository;
    private final ViolationReportMapper violationReportMapper;

    private final UserService userService;

    @Override
    public ViolationReport findViolationReportById(UUID violationReportId) {
        return violationReportRepository.findById(violationReportId)
                .orElseThrow(() -> new EntityNotFoundException("Violation Report Not Found"));
    }

    @Override
    public List<ViolationReport> findAllViolationReportByStudentId(UUID studentId) {
        List<ViolationReport> violationReports = violationReportRepository.findAllByStudentId(studentId);

        if(violationReports.isEmpty()) {
            throw new NoContentException("There is No Violation Report for the Student");
        }
        
        return violationReports;
    }

    @Override
    public ViolationReportInfoDTO showAllViolationReportByClass(String className) {
        ViolationReportInfoDTO violationReportInfoDTO = new ViolationReportInfoDTO();
        List<ViolationReportTeacherShowDTO> violationReportTeacherShowDTOs = new ArrayList<>();

        List<Student> students = userService.findStudentByClassName(className);

        for(Student student : students) {
            ViolationReportTeacherShowDTO violationReportTeacherShowDTO = new ViolationReportTeacherShowDTO();

            boolean teacherSign = false;

            long teacherSignFalse = violationReportRepository.countTeacherSignFalseByStudentId(student.getId());
            long violationNumber = violationReportRepository.countByStudentId(student.getId());

            if(teacherSignFalse == 0) {
                teacherSign = true;
            }

            violationReportTeacherShowDTO.setStudentId(student.getId());
            violationReportTeacherShowDTO.setStudentNisn(student.getNisn());
            violationReportTeacherShowDTO.setStudentName(student.getUser().getName());
            violationReportTeacherShowDTO.setViolationNumber(violationNumber);
            violationReportTeacherShowDTO.setTeacherSign(teacherSign);

            violationReportTeacherShowDTOs.add(violationReportTeacherShowDTO);
        }

        violationReportInfoDTO.setViolationReports(violationReportTeacherShowDTOs);
        
        return violationReportInfoDTO;
    }

    @Override
    public List<ViolationReportDTO> showAllViolationReportByStudentId(UUID studentId) {
        Student student = userService.findStudentById(studentId);

        List<ViolationReport> violationReports = findAllViolationReportByStudentId(student.getId());
        
        return violationReportMapper.toViolationDTOs(violationReports);
    }

    @Override
    public ViolationReportDTO showViolationReportByViolationReportId(UUID violationReportId) {
        ViolationReport violationReport = findViolationReportById(violationReportId);

        return violationReportMapper.toViolationReportDTO(violationReport);
    }

    @Override
    public ViolationReport createViolationReportStudent(ViolationReportSaveDTO violationReportSaveDTO) {
        Student student = userService.findStudentById(violationReportSaveDTO.getStudentId());

        ViolationReport violationReport = new ViolationReport();

        violationReport.setStudent(student);
        violationReport.setTimeStamp(violationReportSaveDTO.getTimeStamp());
        violationReport.setViolationDetails(violationReportSaveDTO.getViolationDetails());
        violationReport.setConsequence(violationReportSaveDTO.getConsequence());
        violationReport.setTeacherSign(false);

        return violationReportRepository.save(violationReport);
    }

    @Override
    public String deleteViolationReportStudent(UUID violationReportId) {
        ViolationReport violationReport = findViolationReportById(violationReportId);

        violationReportRepository.delete(violationReport);

        return "Violation Report '" + violationReport.getViolationDetails() + "' of Student '" + violationReport.getStudent().getUser().getName() + "' Successfully Deleted";
    }

    @Override
    public ViolationReportDTO teacherSignViolationReport(UUID violationReportId) {
        ViolationReport violationReport = findViolationReportById(violationReportId);

        violationReport.setTeacherSign(!violationReport.isTeacherSign());

        ViolationReport updatedViolationReport = violationReportRepository.save(violationReport);
        
        return violationReportMapper.toViolationReportDTO(updatedViolationReport);
    }
}
