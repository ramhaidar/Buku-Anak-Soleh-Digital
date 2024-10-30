package com.abdimas.bukasol.dto.readActivity;

import java.util.List;

import lombok.AllArgsConstructor;
import lombok.Data;
import lombok.NoArgsConstructor;

@Data
@NoArgsConstructor
@AllArgsConstructor
public class ReadActivityInfoDTO {
    private String className;
    private String teacherName;

    private List<ReadActivityTeacherShowDTO> readActivities;
}
