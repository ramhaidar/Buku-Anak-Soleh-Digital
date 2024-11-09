package com.abdimas.bukasol.dto.muhasabah;

import java.time.LocalDate;

import jakarta.validation.constraints.NotBlank;
import jakarta.validation.constraints.NotNull;
import lombok.AllArgsConstructor;
import lombok.Data;
import lombok.NoArgsConstructor;

@Data
@NoArgsConstructor
@AllArgsConstructor
public class MuhasabahReportSaveDTO {
    
    @NotNull(message="Time Stamp is Required")
    private LocalDate timeStamp;
    
    @NotBlank(message="Surah Name is Required")
    private String surahName;

    @NotBlank(message="Surah Ayat is Required")
    private String surahAyat;

    @NotNull(message="Sunnah Pray is Required")
    private boolean sunnahPray;

    @NotNull(message="Subuh Pray is Required")
    private boolean subuhPray;

    @NotNull(message="Dzuhur Pray is Required")
    private boolean dzuhurPray;

    @NotNull(message="Ashar Pray is Required")
    private boolean asharPray;

    @NotNull(message="Maghrib Pray is Required")
    private boolean maghribPray;

    @NotNull(message="Isya Pray is Required")
    private boolean isyaPray;
}
