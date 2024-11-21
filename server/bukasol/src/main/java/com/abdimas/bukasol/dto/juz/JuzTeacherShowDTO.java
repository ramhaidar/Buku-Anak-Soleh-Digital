package com.abdimas.bukasol.dto.juz;

import java.util.UUID;

import lombok.AllArgsConstructor;
import lombok.Data;
import lombok.NoArgsConstructor;

@Data
@NoArgsConstructor
@AllArgsConstructor
public class JuzTeacherShowDTO {
    private UUID studentId;
    private String studentNisn;
    private String studentName;
    private String surahName;
    private String surahAyat;
    private boolean parentSign;
}
