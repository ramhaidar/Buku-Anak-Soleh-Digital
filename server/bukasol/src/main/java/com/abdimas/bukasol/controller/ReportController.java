package com.abdimas.bukasol.controller;

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

import com.abdimas.bukasol.data.model.MuhasabahReport;
import com.abdimas.bukasol.dto.MessageResponseDTO;
import com.abdimas.bukasol.dto.muhasabah.MuhasabahReportDTO;
import com.abdimas.bukasol.dto.muhasabah.MuhasabahReportInfoDTO;
import com.abdimas.bukasol.dto.muhasabah.MuhasabahReportSaveDTO;
import com.abdimas.bukasol.dto.muhasabah.MuhasabahReportStudentInfoDTO;
import com.abdimas.bukasol.service.MuhasabahReportService;

import jakarta.validation.Valid;
import lombok.AllArgsConstructor;

@RestController
@RequestMapping("/api/v1/reports")
@Validated
@AllArgsConstructor
public class ReportController {

    private final MuhasabahReportService muhasabahReportService;

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
}
