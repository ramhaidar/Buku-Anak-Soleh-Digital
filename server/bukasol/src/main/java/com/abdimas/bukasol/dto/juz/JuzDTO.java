package com.abdimas.bukasol.dto.juz;

import java.time.LocalDate;
import java.util.UUID;

import com.abdimas.bukasol.dto.StudentDTO;

import lombok.AllArgsConstructor;
import lombok.Data;
import lombok.NoArgsConstructor;

@Data
@NoArgsConstructor
@AllArgsConstructor
public class JuzDTO {
    private UUID id;
    private LocalDate timeStamp;
    private int juzNumber;
    private String surahName;
    private String surahAyat;
    private boolean parentSign;

    private StudentDTO student;
}