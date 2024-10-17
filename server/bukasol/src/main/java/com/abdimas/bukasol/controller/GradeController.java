package com.abdimas.bukasol.controller;

import java.util.UUID;

import org.springframework.data.domain.Page;
import org.springframework.data.domain.PageRequest;
import org.springframework.data.domain.Pageable;
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

import com.abdimas.bukasol.data.model.PrayerGrade;
import com.abdimas.bukasol.dto.MessageResponseDTO;
import com.abdimas.bukasol.dto.prayerGrade.PrayerGradeDTO;
import com.abdimas.bukasol.dto.prayerGrade.PrayerGradeSaveDTO;
import com.abdimas.bukasol.dto.prayerGrade.PrayerGradeUpdateDTO;
import com.abdimas.bukasol.service.PrayerGradeService;

import jakarta.validation.Valid;
import lombok.AllArgsConstructor;

@RestController
@RequestMapping("/api/v1/grades")
@Validated
@AllArgsConstructor
public class GradeController {
    
    private final PrayerGradeService prayerGradeService;

    @GetMapping(value = "/teacher/prayer/{id}")
    public ResponseEntity<Page<PrayerGradeDTO>> getAllPrayerGradeByStudentId(@RequestParam(defaultValue = "0") int page, @RequestParam(defaultValue = "20") int size, @PathVariable("id") UUID studentId) {
        Pageable pageable = PageRequest.of(page, size);
        Page<PrayerGradeDTO> prayerGrades = prayerGradeService.showAllPrayerGradeByStudentId(pageable, studentId);

        return ResponseEntity.status(HttpStatus.OK).body(prayerGrades);
    }

    @PostMapping(value = "/teacher/create-prayer")
    public ResponseEntity<MessageResponseDTO> createPrayerGrade(@Valid @RequestBody PrayerGradeSaveDTO prayerGradeSaveDTO) {
        PrayerGrade prayerGrade = prayerGradeService.createPrayerGradeStudent(prayerGradeSaveDTO);

        MessageResponseDTO prayerGradeResponse = new MessageResponseDTO();
        prayerGradeResponse.setMessage("Prayer Grade for Student '" + prayerGrade.getStudent().getUser().getName() + "' Successfully Created");
        
        return ResponseEntity.status(HttpStatus.CREATED).body(prayerGradeResponse);
    }

    @PutMapping(value = "/teacher/update-prayer/{id}")
    public ResponseEntity<PrayerGradeDTO> updatePrayerGrade(@PathVariable("id") UUID gradeId, @Valid @RequestBody PrayerGradeUpdateDTO prayerGradeUpdateDTO) {
        PrayerGradeDTO prayerGrade = prayerGradeService.updatePrayerGradeStudent(gradeId, prayerGradeUpdateDTO);
        
        return ResponseEntity.status(HttpStatus.OK).body(prayerGrade);
    }

    @DeleteMapping(value = "/teacher/delete-prayer/{id}")
    public ResponseEntity<MessageResponseDTO> deletePrayerGrade(@PathVariable("id") UUID gradeId) {
        String message = prayerGradeService.deletePrayerGradeStudent(gradeId);

        MessageResponseDTO response = new MessageResponseDTO(message);
        
        return ResponseEntity.status(HttpStatus.OK).body(response);
    }

    @PutMapping(value = "/teacher/sign/{id}")
    public ResponseEntity<PrayerGradeDTO> teacherSignPrayerGrade(@PathVariable("id") UUID gradeId) {
        PrayerGradeDTO prayerGrade = prayerGradeService.teacherSignPrayerGrade(gradeId);
        
        return ResponseEntity.status(HttpStatus.OK).body(prayerGrade);
    }

    @PutMapping(value = "/student/sign/{id}")
    public ResponseEntity<PrayerGradeDTO> parentSignPrayerGrade(@PathVariable("id") UUID gradeId) {
        PrayerGradeDTO prayerGrade = prayerGradeService.parentSignPrayerGrade(gradeId);
        
        return ResponseEntity.status(HttpStatus.OK).body(prayerGrade);
    }
}
