package com.abdimas.bukasol.service;

import java.util.List;
import java.util.UUID;

import com.abdimas.bukasol.data.model.Juz;
import com.abdimas.bukasol.dto.juz.JuzDTO;
import com.abdimas.bukasol.dto.juz.JuzInfoDTO;
import com.abdimas.bukasol.dto.juz.JuzSaveDTO;

public interface JuzService {
    Juz findJuzById(UUID juzId);

    List<Juz> findAllJuzReportByStudentIdAndJuzNumber(UUID studentId, int juzNumber);

    JuzInfoDTO showAllJuzReportByClassAndJuzNumber(String className, int juzNumber);

    List<JuzDTO> showAllJuzReportByStudentIdAndJuzNumber(UUID studentId, int juzNumber);

    Juz createJuzReportStudent(JuzSaveDTO juzSaveDTO);

    String deleteJuzReportStudent(UUID juzReportId);

    JuzDTO parentSignJuzReport(UUID juzReportId, String parentCode);
}
