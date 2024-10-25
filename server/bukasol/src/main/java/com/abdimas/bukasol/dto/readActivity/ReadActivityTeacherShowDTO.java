package com.abdimas.bukasol.dto.readActivity;

import java.util.UUID;

import lombok.AllArgsConstructor;
import lombok.Data;
import lombok.NoArgsConstructor;

@Data
@NoArgsConstructor
@AllArgsConstructor
public class ReadActivityTeacherShowDTO {
    private UUID studentId;
    private String studentNisn;
    private String studentName;
    private long totalActivities;
    private boolean teacherSign;
    private boolean parentSign;
}
