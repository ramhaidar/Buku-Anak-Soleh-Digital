package com.abdimas.bukasol.controller;

import java.io.IOException;
import java.util.List;
import java.util.UUID;

import org.springframework.http.ContentDisposition;
import org.springframework.http.HttpHeaders;
import org.springframework.http.HttpStatus;
import org.springframework.http.MediaType;
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

import com.abdimas.bukasol.data.model.PrayerGrade;
import com.abdimas.bukasol.data.model.PrayerRecitationGrade;
import com.abdimas.bukasol.dto.MessageResponseDTO;
import com.abdimas.bukasol.dto.prayerGrade.PrayerGradeDTO;
import com.abdimas.bukasol.dto.prayerGrade.PrayerGradeInfoDTO;
import com.abdimas.bukasol.dto.prayerGrade.PrayerGradeSaveDTO;
import com.abdimas.bukasol.dto.prayerGrade.PrayerGradeUpdateDTO;
import com.abdimas.bukasol.dto.prayerRecitationGrade.PrayerRecitationGradeDTO;
import com.abdimas.bukasol.dto.prayerRecitationGrade.PrayerRecitationGradeInfoDTO;
import com.abdimas.bukasol.dto.prayerRecitationGrade.PrayerRecitationGradeSaveDTO;
import com.abdimas.bukasol.dto.prayerRecitationGrade.PrayerRecitationGradeUpdateDTO;
import com.abdimas.bukasol.service.PrayerGradeService;
import com.abdimas.bukasol.service.PrayerRecitationGradeService;

import jakarta.validation.Valid;
import lombok.AllArgsConstructor;

@RestController
@RequestMapping("/api/v1/grades")
@Validated
@AllArgsConstructor
public class GradeController {
    
    private final PrayerGradeService prayerGradeService;
    private final PrayerRecitationGradeService prayerRecitationGradeService;

    @GetMapping(value = "/teacher/prayer/{className}")
    public ResponseEntity<PrayerGradeInfoDTO> getAllPrayerGradeByClassName(@PathVariable("className") String className) {
        PrayerGradeInfoDTO prayerGradeInfoDTO = prayerGradeService.showAllPrayerGradeByClass(className);
        
        return ResponseEntity.status(HttpStatus.OK).body(prayerGradeInfoDTO);
    }

    @GetMapping(value = "/teacher/prayer-recitation/{className}")
    public ResponseEntity<PrayerRecitationGradeInfoDTO> getAllPrayerRecitationGradeByClassName(@PathVariable("className") String className) {
        PrayerRecitationGradeInfoDTO prayerRecitationGradeInfoDTO = prayerRecitationGradeService.showAllPrayerRecitationGradeByClass(className);

        return ResponseEntity.status(HttpStatus.OK).body(prayerRecitationGradeInfoDTO);
    }

    @GetMapping(value = "/prayer/student/{id}")
    public ResponseEntity<List<PrayerGradeDTO>> getAllPrayerGradeByStudentId(@PathVariable("id") UUID studentId) {
        List<PrayerGradeDTO> prayerGradeDTOs = prayerGradeService.showAllPrayerGradeByStudentId(studentId);

        return ResponseEntity.status(HttpStatus.OK).body(prayerGradeDTOs);
    }
    
    @GetMapping(value = "/prayer-recitation/student/{id}")
    public ResponseEntity<List<PrayerRecitationGradeDTO>> getAllPrayerRecitationGradeByStudentId(@PathVariable("id") UUID studentId) {
        List<PrayerRecitationGradeDTO> prayerRecitationGradeDTOs = prayerRecitationGradeService.showAllPrayerRecitationGradeByStudentId(studentId);
        
        return ResponseEntity.status(HttpStatus.OK).body(prayerRecitationGradeDTOs);
    }

    @GetMapping(value = "/prayer/{id}")
    public ResponseEntity<PrayerGradeDTO> getPrayerGradeByGradeid(@PathVariable("id") UUID gradeId) {
        PrayerGradeDTO prayerGradeDTO = prayerGradeService.showPrayerGradeByGradeId(gradeId);
        
        return ResponseEntity.status(HttpStatus.OK).body(prayerGradeDTO);
    }

    @GetMapping(value = "/prayer-recitation/{id}")
    public ResponseEntity<PrayerRecitationGradeDTO> getPrayerRecitationGradeByGradeid(@PathVariable("id") UUID gradeId) {
        PrayerRecitationGradeDTO prayerRecitationGradeDTO = prayerRecitationGradeService.showPrayerRecitationGradeByGradeId(gradeId);
        
        return ResponseEntity.status(HttpStatus.OK).body(prayerRecitationGradeDTO);
    }

    @PostMapping(value = "/teacher/create-prayer")
    public ResponseEntity<MessageResponseDTO> createPrayerGrade(@Valid @RequestBody PrayerGradeSaveDTO prayerGradeSaveDTO) {
        PrayerGrade prayerGrade = prayerGradeService.createPrayerGradeStudent(prayerGradeSaveDTO);

        MessageResponseDTO prayerGradeResponse = new MessageResponseDTO();
        prayerGradeResponse.setMessage("Prayer Grade '" + prayerGrade.getMotionCategory() + "' of Student '" + prayerGrade.getStudent().getUser().getName() + "' Successfully Created");
        
        return ResponseEntity.status(HttpStatus.CREATED).body(prayerGradeResponse);
    }

    @PostMapping(value = "/teacher/create-prayer-recitation")
    public ResponseEntity<MessageResponseDTO> createPrayerRecitationGrade(@Valid @RequestBody PrayerRecitationGradeSaveDTO prayerRecitationGradeSaveDTO) {
        PrayerRecitationGrade prayerRecitationGrade = prayerRecitationGradeService.createPrayerRecitationGradeStudent(prayerRecitationGradeSaveDTO);

        MessageResponseDTO prayerGradeResponse = new MessageResponseDTO();
        prayerGradeResponse.setMessage("Prayer Recitation Grade '" + prayerRecitationGrade.getReadingCategory() + "' of Student '" + prayerRecitationGrade.getStudent().getUser().getName() + "' Successfully Created");
        
        return ResponseEntity.status(HttpStatus.CREATED).body(prayerGradeResponse);
    }

    @PutMapping(value = "/teacher/update-prayer/{id}")
    public ResponseEntity<PrayerGradeDTO> updatePrayerGrade(@PathVariable("id") UUID gradeId, @Valid @RequestBody PrayerGradeUpdateDTO prayerGradeUpdateDTO) {
        PrayerGradeDTO prayerGrade = prayerGradeService.updatePrayerGradeStudent(gradeId, prayerGradeUpdateDTO);
        
        return ResponseEntity.status(HttpStatus.OK).body(prayerGrade);
    }

    @PutMapping(value = "/teacher/update-prayer-recitation/{id}")
    public ResponseEntity<PrayerRecitationGradeDTO> updatePrayerRecitationGrade(@PathVariable("id") UUID gradeId, @Valid @RequestBody PrayerRecitationGradeUpdateDTO prayerRecitationGradeUpdateDTO) {
        PrayerRecitationGradeDTO prayerRecitationGrade = prayerRecitationGradeService.updatePrayerRecitationGradeStudent(gradeId, prayerRecitationGradeUpdateDTO);
        
        return ResponseEntity.status(HttpStatus.OK).body(prayerRecitationGrade);
    }

    @DeleteMapping(value = "/teacher/delete-prayer/{id}")
    public ResponseEntity<MessageResponseDTO> deletePrayerGrade(@PathVariable("id") UUID gradeId) {
        String message = prayerGradeService.deletePrayerGradeStudent(gradeId);

        MessageResponseDTO response = new MessageResponseDTO(message);
        
        return ResponseEntity.status(HttpStatus.OK).body(response);
    }

    @DeleteMapping(value = "/teacher/delete-prayer-recitation/{id}")
    public ResponseEntity<MessageResponseDTO> deletePrayerRecitationGrade(@PathVariable("id") UUID gradeId) {
        String message = prayerRecitationGradeService.deletePrayerRecitationGradeStudent(gradeId);

        MessageResponseDTO response = new MessageResponseDTO(message);
        
        return ResponseEntity.status(HttpStatus.OK).body(response);
    }

    @PutMapping(value = "/teacher/prayer-sign/{id}")
    public ResponseEntity<PrayerGradeDTO> teacherSignPrayerGrade(@PathVariable("id") UUID gradeId) {
        PrayerGradeDTO prayerGrade = prayerGradeService.teacherSignPrayerGrade(gradeId);
        
        return ResponseEntity.status(HttpStatus.OK).body(prayerGrade);
    }

    @PutMapping(value = "/teacher/prayer-recitation-sign/{id}")
    public ResponseEntity<PrayerRecitationGradeDTO> teacherSignPrayerRecitationGrade(@PathVariable("id") UUID gradeId) {
        PrayerRecitationGradeDTO prayerRecitationGrade = prayerRecitationGradeService.teacherSignPrayerRecitationGrade(gradeId);
        
        return ResponseEntity.status(HttpStatus.OK).body(prayerRecitationGrade);
    }

    @PutMapping(value = "/student/prayer-sign/{id}")
    public ResponseEntity<PrayerGradeDTO> parentSignPrayerGrade(@PathVariable("id") UUID gradeId, @RequestParam String parentCode) {
        PrayerGradeDTO prayerGrade = prayerGradeService.parentSignPrayerGrade(gradeId, parentCode);
        
        return ResponseEntity.status(HttpStatus.OK).body(prayerGrade);
    }

    @PutMapping(value = "/student/prayer-recitation-sign/{id}")
    public ResponseEntity<PrayerRecitationGradeDTO> parentSignPrayerRecitationGrade(@PathVariable("id") UUID gradeId, @RequestParam String parentCode) {
        PrayerRecitationGradeDTO prayerRecitationGrade = prayerRecitationGradeService.parentSignPrayerRecitationGrade(gradeId, parentCode);
        
        return ResponseEntity.status(HttpStatus.OK).body(prayerRecitationGrade);
    }

    @GetMapping(value = "/grade-report/{id}")
    public ResponseEntity<byte[]> getGradeReportPdf(@PathVariable("id") UUID studentId) throws IOException {
        byte[] pdfBytes = prayerGradeService.generateGradeReportPdf(studentId);

        HttpHeaders headers = new HttpHeaders();
        headers.setContentType(MediaType.APPLICATION_PDF);
        headers.setContentDisposition(ContentDisposition.builder("attachment").filename("grade-report.pdf").build());

        return ResponseEntity.status(HttpStatus.OK).headers(headers).body(pdfBytes);
    }

    @GetMapping(value = "/recitation-grade-report/{id}")
    public ResponseEntity<byte[]> getRecitationGradeReportPdf(@PathVariable("id") UUID studentId) throws IOException {
        byte[] pdfBytes = prayerRecitationGradeService.generateRecitationGradeReportPdf(studentId);

        HttpHeaders headers = new HttpHeaders();
        headers.setContentType(MediaType.APPLICATION_PDF);
        headers.setContentDisposition(ContentDisposition.builder("attachment").filename("grade-report.pdf").build());

        return ResponseEntity.status(HttpStatus.OK).headers(headers).body(pdfBytes);
    }
}
