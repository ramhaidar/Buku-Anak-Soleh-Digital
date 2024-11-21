package com.abdimas.bukasol.dto.muhasabah;

import java.time.LocalDate;
import java.util.UUID;

import com.abdimas.bukasol.dto.StudentDTO;

import lombok.AllArgsConstructor;
import lombok.Data;
import lombok.NoArgsConstructor;

@Data
@NoArgsConstructor
@AllArgsConstructor
public class MuhasabahReportDTO {
    private UUID id;
    private LocalDate timeStamp;
    private String surahName;
    private String surahAyat;
    private boolean sunnahPray;
    private boolean subuhPray;
    private boolean dzuhurPray;
    private boolean asharPray;
    private boolean maghribPray;
    private boolean isyaPray;
    private boolean teacherSign;
    private boolean parentSign;

    private StudentDTO student;
}
