package com.abdimas.bukasol.dto.juz;

import java.util.List;

import lombok.AllArgsConstructor;
import lombok.Data;
import lombok.NoArgsConstructor;

@Data
@NoArgsConstructor
@AllArgsConstructor
public class JuzInfoDTO {
    private String className;
    private String teacherName;

    private List<JuzTeacherShowDTO> juzReports;
}
