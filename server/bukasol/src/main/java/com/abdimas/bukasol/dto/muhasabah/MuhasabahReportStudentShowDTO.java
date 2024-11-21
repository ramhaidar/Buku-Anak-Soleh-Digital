package com.abdimas.bukasol.dto.muhasabah;

import java.time.LocalDate;
import java.util.UUID;

import lombok.AllArgsConstructor;
import lombok.Data;
import lombok.NoArgsConstructor;

@Data
@NoArgsConstructor
@AllArgsConstructor
public class MuhasabahReportStudentShowDTO {
    private UUID muhasabahReportId;
    private LocalDate timeStamp;
    private boolean surahRead;
    private boolean sunnahPray;
    private String fardhuPray;
    private boolean teacherSign;
    private boolean parentSign;
}
