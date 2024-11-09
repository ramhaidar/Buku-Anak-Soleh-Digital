package com.abdimas.bukasol.dto.juz;

import java.time.LocalDate;
import java.util.UUID;

import jakarta.validation.constraints.NotBlank;
import jakarta.validation.constraints.NotNull;
import lombok.AllArgsConstructor;
import lombok.Data;
import lombok.NoArgsConstructor;

@Data
@NoArgsConstructor
@AllArgsConstructor
public class JuzSaveDTO {
    @NotNull(message="Student Id is Required")
    private UUID studentId;

    @NotNull(message="Time Stamp is Required")
    private LocalDate timeStamp;

    @NotBlank(message="Juz Number is Required")
    private int juzNumber;

    @NotBlank(message="Surah Name is Required")
    private String surahName;
    
    @NotBlank(message="Surah Ayat is Required")
    private String surahAyat;
}