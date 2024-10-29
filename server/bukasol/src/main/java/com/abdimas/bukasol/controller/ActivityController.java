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

import com.abdimas.bukasol.data.model.ReadActivity;
import com.abdimas.bukasol.dto.MessageResponseDTO;
import com.abdimas.bukasol.dto.readActivity.ReadActivityDTO;
import com.abdimas.bukasol.dto.readActivity.ReadActivityInfoDTO;
import com.abdimas.bukasol.dto.readActivity.ReadActivitySaveDTO;
import com.abdimas.bukasol.service.ReadActivityService;

import jakarta.validation.Valid;
import lombok.AllArgsConstructor;

@RestController
@RequestMapping("/api/v1/activities")
@Validated
@AllArgsConstructor
public class ActivityController {

    private final ReadActivityService readActivityService;

    @GetMapping(value = "/teacher/read-activity/{className}")
    public ResponseEntity<ReadActivityInfoDTO> getAllreadActivityByClass(@PathVariable("className") String className) {
        ReadActivityInfoDTO readActivityInfoDTO = readActivityService.showAllReadActivityByClass(className);
        
        return ResponseEntity.status(HttpStatus.OK).body(readActivityInfoDTO);
    }

    @GetMapping(value = "/read-activity/student/{id}")
    public ResponseEntity<List<ReadActivityDTO>> getAllReadActivityByStudentId(@PathVariable("id") UUID studentId) {
        List<ReadActivityDTO> readActivityDTOs = readActivityService.showAllReadActivityByStudentId(studentId);
        
        return ResponseEntity.status(HttpStatus.OK).body(readActivityDTOs);
    }

    @PostMapping(value = "/student/create-read-activity")
    public ResponseEntity<MessageResponseDTO> createReadActivity(@Valid @RequestBody ReadActivitySaveDTO readActivitySaveDTO) {
        ReadActivity readActivity = readActivityService.createReadActivityStudent(readActivitySaveDTO);

        MessageResponseDTO readActivityResponse = new MessageResponseDTO();
        readActivityResponse.setMessage("Reading Activity '" + readActivity.getBookTitle() + " " + readActivity.getPage() + "' of Student '" + readActivity.getStudent().getUser().getName() + "' Successfully Created");

        return ResponseEntity.status(HttpStatus.CREATED).body(readActivityResponse);
    }

    @DeleteMapping(value = "/student/delete-read-Activity/{id}")
    public ResponseEntity<MessageResponseDTO> deleteReadActivity(@PathVariable("id") UUID readActivityId) {
        String message = readActivityService.deleteReadActivityStudent(readActivityId);

        MessageResponseDTO response = new MessageResponseDTO(message);
        
        return ResponseEntity.status(HttpStatus.OK).body(response);
    }

    @PutMapping(value = "/teacher/read-activity-sign/{id}")
    public ResponseEntity<ReadActivityDTO> teacherSignReadActivity(@PathVariable("id") UUID readActivityId) {
        ReadActivityDTO readActivityDTO = readActivityService.teacherSignReadActivity(readActivityId);

        return ResponseEntity.status(HttpStatus.OK).body(readActivityDTO);
    }

    @PutMapping(value = "/student/read-activity-sign/{id}")
    public ResponseEntity<ReadActivityDTO> parentSignReadActivity(@PathVariable("id") UUID readActivityId, @RequestParam String parentCode) {
        ReadActivityDTO readActivityDTO = readActivityService.parentSignReadActivity(readActivityId, parentCode);

        return ResponseEntity.status(HttpStatus.OK).body(readActivityDTO);
    }
}
