package com.abdimas.bukasol.dto.violation;

import java.time.LocalDate;
import java.util.UUID;

import com.abdimas.bukasol.dto.StudentDTO;

import lombok.AllArgsConstructor;
import lombok.Data;
import lombok.NoArgsConstructor;

@Data
@NoArgsConstructor
@AllArgsConstructor
public class ViolationReportDTO {
    private UUID id;
    private LocalDate timeStamp;
    private String violationDetails;
    private String consequence;
    private boolean teacherSign;

    private StudentDTO student;
}
