package com.abdimas.bukasol.controller;

import java.util.List;
import java.util.UUID;

import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.validation.annotation.Validated;
import org.springframework.web.bind.annotation.DeleteMapping;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.PutMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.RestController;

import com.abdimas.bukasol.data.model.Juz;
import com.abdimas.bukasol.data.model.MuhasabahReport;
import com.abdimas.bukasol.data.model.ViolationReport;
import com.abdimas.bukasol.dto.MessageResponseDTO;
import com.abdimas.bukasol.dto.juz.JuzDTO;
import com.abdimas.bukasol.dto.juz.JuzInfoDTO;
import com.abdimas.bukasol.dto.juz.JuzSaveDTO;
import com.abdimas.bukasol.dto.muhasabah.MuhasabahReportDTO;
import com.abdimas.bukasol.dto.muhasabah.MuhasabahReportInfoDTO;
import com.abdimas.bukasol.dto.muhasabah.MuhasabahReportSaveDTO;
import com.abdimas.bukasol.dto.muhasabah.MuhasabahReportStudentInfoDTO;
import com.abdimas.bukasol.dto.violation.ViolationReportDTO;
import com.abdimas.bukasol.dto.violation.ViolationReportInfoDTO;
import com.abdimas.bukasol.dto.violation.ViolationReportSaveDTO;
import com.abdimas.bukasol.service.JuzService;
import com.abdimas.bukasol.service.MuhasabahReportService;
import com.abdimas.bukasol.service.ViolationReportService;

import jakarta.validation.Valid;
import lombok.AllArgsConstructor;

@RestController
@RequestMapping("/api/v1/reports")
@Validated
@AllArgsConstructor
public class ReportController {

    private final MuhasabahReportService muhasabahReportService;
    private final ViolationReportService violationReportService;
    private final JuzService juzService;

    @GetMapping(value = "/teacher/muhasabah-report/{className}")
    public ResponseEntity<MuhasabahReportInfoDTO> getAllMuhasabahReportByClass(@PathVariable("className") String className) {
        MuhasabahReportInfoDTO muhasabahReportInfoDTO = muhasabahReportService.showAllMuhasabahReportByClass(className);
        
        return ResponseEntity.status(HttpStatus.OK).body(muhasabahReportInfoDTO);
    }

    @GetMapping(value = "/muhasabah-report/student/{id}")
    public ResponseEntity<MuhasabahReportStudentInfoDTO> getAllMuhasabahReportByStudentId(@PathVariable("id") UUID studentId) {
        MuhasabahReportStudentInfoDTO muhasabahReportStudentInfoDTO = muhasabahReportService.showAllMuhasabahReportByStudentId(studentId);
        
        return ResponseEntity.status(HttpStatus.OK).body(muhasabahReportStudentInfoDTO);
    }

    @GetMapping(value = "/muhasabah-report/{id}")
    public ResponseEntity<MuhasabahReportDTO> getMuhasabahReportById(@PathVariable("id") UUID muhasabahReportId) {
        MuhasabahReportDTO muhasabahReportDTO = muhasabahReportService.showMuhasabahReportByMuhasabahReportId(muhasabahReportId);
        
        return ResponseEntity.status(HttpStatus.OK).body(muhasabahReportDTO);
    }

    @PostMapping(value = "/student/create-muhasabah-report")
    public ResponseEntity<MessageResponseDTO> createMuhasabahReport(@Valid @RequestBody MuhasabahReportSaveDTO muhasabahReportSaveDTO) {
        MuhasabahReport muhasabahReport = muhasabahReportService.createMuhasabahReportStudent(muhasabahReportSaveDTO);

        MessageResponseDTO muhasabahReportResponse = new MessageResponseDTO();
        muhasabahReportResponse.setMessage("Muhasabah Report '" + muhasabahReport.getTimeStamp() + "' of Student '" + muhasabahReport.getStudent().getUser().getName() + "' Successfully Created");
        
        return ResponseEntity.status(HttpStatus.CREATED).body(muhasabahReportResponse);
    }

    @DeleteMapping(value = "/student/delete-muhasabah-report/{id}")
    public ResponseEntity<MessageResponseDTO> deleteMuhasabahReport(@PathVariable("id") UUID muhasabahReportId) {
        String message = muhasabahReportService.deleteMuhasabahReportStudent(muhasabahReportId);

        MessageResponseDTO response = new MessageResponseDTO(message);
        
        return ResponseEntity.status(HttpStatus.OK).body(response);
    }

    @PutMapping(value = "/teacher/muhasabah-report-sign/{id}")
    public ResponseEntity<MuhasabahReportDTO> teacherSignMuhasabahReport(@PathVariable("id") UUID muhasabahReportId) {
        MuhasabahReportDTO muhasabahReportDTO = muhasabahReportService.teacherSignMuhasabahReport(muhasabahReportId);
        
        return ResponseEntity.status(HttpStatus.OK).body(muhasabahReportDTO);
    }

    @PutMapping(value = "/student/muhasabah-report-sign/{id}")
    public ResponseEntity<MuhasabahReportDTO> parentSignMuhasabahReport(@PathVariable("id") UUID muhasabahReportId, @RequestParam String parentCode) {
        MuhasabahReportDTO muhasabahReportDTO = muhasabahReportService.parentSignMuhasabahReport(muhasabahReportId, parentCode);
        
        return ResponseEntity.status(HttpStatus.OK).body(muhasabahReportDTO);
    }

    @GetMapping(value = "/teacher/violation-report/{className}")
    public ResponseEntity<ViolationReportInfoDTO> getAllViolationReportByClass(@PathVariable("className") String className) {
        ViolationReportInfoDTO violationReportInfoDTO = violationReportService.showAllViolationReportByClass(className);
        
        return ResponseEntity.status(HttpStatus.OK).body(violationReportInfoDTO);
    }

    @GetMapping(value = "/violation-report/student/{id}")
    public ResponseEntity<List<ViolationReportDTO>> getAllViolationReportByStudentId(@PathVariable("id") UUID studentId) {
        List<ViolationReportDTO> violationReportDTOs = violationReportService.showAllViolationReportByStudentId(studentId);
        
        return ResponseEntity.status(HttpStatus.OK).body(violationReportDTOs);
    }

    @GetMapping(value = "/violation-report/{id}")
    public ResponseEntity<ViolationReportDTO> getViolationReportById(@PathVariable("id") UUID violationReportId) {
        ViolationReportDTO violationReportDTO = violationReportService.showViolationReportByViolationReportId(violationReportId);
        
        return ResponseEntity.status(HttpStatus.OK).body(violationReportDTO);
    }

    @PostMapping(value = "/teacher/create-violation-report")
    public ResponseEntity<MessageResponseDTO> createViolationReport(@Valid @RequestBody ViolationReportSaveDTO violationReportSaveDTO) {
        ViolationReport violationReport = violationReportService.createViolationReportStudent(violationReportSaveDTO);

        MessageResponseDTO violationReportResponse = new MessageResponseDTO();
        violationReportResponse.setMessage("Violation Report '" + violationReport.getViolationDetails()+ "' of Student '" + violationReport.getStudent().getUser().getName() + "' Successfully Created");
        
        return ResponseEntity.status(HttpStatus.CREATED).body(violationReportResponse);
    }

    @DeleteMapping(value = "/teacher/delete-violation-report/{id}")
    public ResponseEntity<MessageResponseDTO> deleteViolationReport(@PathVariable("id") UUID violationReportId) {
        String message = violationReportService.deleteViolationReportStudent(violationReportId);

        MessageResponseDTO response = new MessageResponseDTO(message);
        
        return ResponseEntity.status(HttpStatus.OK).body(response);
    }

    @PutMapping(value = "/teacher/violation-report-sign/{id}")
    public ResponseEntity<ViolationReportDTO> teacherSignViolatioReport(@PathVariable("id") UUID violationReportId) {
        ViolationReportDTO violationReportDTO = violationReportService.teacherSignViolationReport(violationReportId);
        
        return ResponseEntity.status(HttpStatus.OK).body(violationReportDTO);
    }

    @GetMapping(value = "/teacher/juz-report/{className}")
    public ResponseEntity<JuzInfoDTO> getAllJuzReportByClassAndJuzNumber(@PathVariable("className") String className, @RequestParam int juzNumber) {
        JuzInfoDTO juzInfoDTO = juzService.showAllJuzReportByClassAndJuzNumber(className, juzNumber);
        
        return ResponseEntity.status(HttpStatus.OK).body(juzInfoDTO);
    }

    @GetMapping(value = "/juz-report/student/{id}")
    public ResponseEntity<List<JuzDTO>> getAllJuzReportByStudentIdAndJuzNumber(@PathVariable("id") UUID studentId, @RequestParam int juzNumber) {
        List<JuzDTO> juzDTOs = juzService.showAllJuzReportByStudentIdAndJuzNumber(studentId, juzNumber);
        
        return ResponseEntity.status(HttpStatus.OK).body(juzDTOs);
    }

    @PostMapping(value = "/student/create-juz-report")
    public ResponseEntity<MessageResponseDTO> createJuzReport(@Valid @RequestBody JuzSaveDTO juzSaveDTO) {
        Juz juz = juzService.createJuzReportStudent(juzSaveDTO);

        MessageResponseDTO juzReportResponse = new MessageResponseDTO();
        juzReportResponse.setMessage("Juz Report '" + juz.getSurahName() + "' and '" + juz.getSurahAyat() + "' of Student '" + juz.getStudent().getUser().getName() + "' Successfully Created");
        
        return ResponseEntity.status(HttpStatus.CREATED).body(juzReportResponse);
    }

    @DeleteMapping(value = "/student/delete-juz-report/{id}")
    public ResponseEntity<MessageResponseDTO> deleteJuzReport(@PathVariable("id") UUID juzReportId) {
        String message = juzService.deleteJuzReportStudent(juzReportId);

        MessageResponseDTO response = new MessageResponseDTO(message);
        
        return ResponseEntity.status(HttpStatus.OK).body(response);
    }

    @PutMapping(value = "/student/juz-report-sign/{id}")
    public ResponseEntity<JuzDTO> parentSignJuzReport(@PathVariable("id") UUID juzReportId, @RequestParam String parentCode) {
        JuzDTO juzReportDTO = juzService.parentSignJuzReport(juzReportId, parentCode);
        
        return ResponseEntity.status(HttpStatus.OK).body(juzReportDTO);
    }
}
