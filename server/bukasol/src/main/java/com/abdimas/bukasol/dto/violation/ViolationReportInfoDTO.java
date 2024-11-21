package com.abdimas.bukasol.dto.violation;

import java.util.List;

import lombok.AllArgsConstructor;
import lombok.Data;
import lombok.NoArgsConstructor;

@Data
@NoArgsConstructor
@AllArgsConstructor
public class ViolationReportInfoDTO {
    private String className;
    private String teacherName;

    private List<ViolationReportTeacherShowDTO> violationReports;
}
