package com.abdimas.bukasol.dto.muhasabah;

import java.util.UUID;

import lombok.AllArgsConstructor;
import lombok.Data;
import lombok.NoArgsConstructor;

@Data
@NoArgsConstructor
@AllArgsConstructor
public class MuhasabahReportTeacherShowDTO {
    private UUID studentId;
    private String studentNisn;
    private String studentName;
    private boolean teacherSign;
    private boolean parentSign;
}
