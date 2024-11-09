package com.abdimas.bukasol.service;

import java.util.List;
import java.util.UUID;

import com.abdimas.bukasol.data.model.MuhasabahReport;
import com.abdimas.bukasol.dto.muhasabah.MuhasabahReportDTO;
import com.abdimas.bukasol.dto.muhasabah.MuhasabahReportInfoDTO;
import com.abdimas.bukasol.dto.muhasabah.MuhasabahReportSaveDTO;
import com.abdimas.bukasol.dto.muhasabah.MuhasabahReportStudentInfoDTO;

public interface MuhasabahReportService {

    MuhasabahReport findMuhasabahReportById(UUID muhasabahReportId);
    List<MuhasabahReport> findAllMuhasabahReportByStudentId(UUID studentId);

    MuhasabahReportInfoDTO showAllMuhasabahReportByClass(String className);
    MuhasabahReportStudentInfoDTO showAllMuhasabahReportByStudentId(UUID studentId);
    MuhasabahReportDTO showMuhasabahReportByMuhasabahReportId(UUID muhasabahReportId);

    MuhasabahReport createMuhasabahReportStudent(MuhasabahReportSaveDTO muhasabahReportSaveDTO);

    String deleteMuhasabahReportStudent(UUID muhasabahReportId);

    MuhasabahReportDTO teacherSignMuhasabahReport(UUID muhasabahReportId);
    MuhasabahReportDTO parentSignMuhasabahReport(UUID muhasabahReportId, String parentCode);
}
