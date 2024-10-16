package com.abdimas.bukasol.controller;

import java.util.UUID;

import org.springframework.data.domain.Page;
import org.springframework.data.domain.PageRequest;
import org.springframework.data.domain.Pageable;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.validation.annotation.Validated;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.RestController;

import com.abdimas.bukasol.dto.PrayerGradeDTO;
import com.abdimas.bukasol.service.PrayerGradeService;

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
}
