package com.abdimas.bukasol.service;

import java.util.List;
import java.util.UUID;

import com.abdimas.bukasol.data.model.ViolationReport;
import com.abdimas.bukasol.dto.violation.ViolationReportDTO;
import com.abdimas.bukasol.dto.violation.ViolationReportInfoDTO;
import com.abdimas.bukasol.dto.violation.ViolationReportSaveDTO;

public interface ViolationReportService {

    ViolationReport findViolationReportById(UUID violationReportId);

    List<ViolationReport> findAllViolationReportByStudentId(UUID studentId);

    ViolationReportInfoDTO showAllViolationReportByClass(String className);

    List<ViolationReportDTO> showAllViolationReportByStudentId(UUID studentId);

    ViolationReportDTO showViolationReportByViolationReportId(UUID violationReportId);

    ViolationReport createViolationReportStudent(ViolationReportSaveDTO violationReportSaveDTO);

    String deleteViolationReportStudent(UUID violationReportId);

    ViolationReportDTO teacherSignViolationReport(UUID violationReportId);
}
