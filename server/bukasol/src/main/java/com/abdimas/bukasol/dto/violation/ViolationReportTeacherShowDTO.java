package com.abdimas.bukasol.dto.violation;

import java.util.UUID;

import lombok.AllArgsConstructor;
import lombok.Data;
import lombok.NoArgsConstructor;

@Data
@NoArgsConstructor
@AllArgsConstructor
public class ViolationReportTeacherShowDTO {
    private UUID studentId;
    private String studentNisn;
    private String studentName;
    private long violationNumber;
    private boolean teacherSign;
}
