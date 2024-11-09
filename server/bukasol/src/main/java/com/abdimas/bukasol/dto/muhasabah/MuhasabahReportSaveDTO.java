package com.abdimas.bukasol.dto.muhasabah;

import java.time.LocalDate;
import java.util.UUID;

import jakarta.validation.constraints.NotNull;
import lombok.AllArgsConstructor;
import lombok.Data;
import lombok.NoArgsConstructor;

@Data
@NoArgsConstructor
@AllArgsConstructor
public class MuhasabahReportSaveDTO {
    @NotNull(message="Student Id is Required")
    private UUID studentId;

    @NotNull(message="Time Stamp is Required")
    private LocalDate timeStamp;
    
    private String surahName;
    private String surahAyat;

    @NotNull(message="Sunnah Pray is Required")
    private Boolean sunnahPray;

    @NotNull(message="Subuh Pray is Required")
    private Boolean subuhPray;

    @NotNull(message="Dzuhur Pray is Required")
    private Boolean dzuhurPray;

    @NotNull(message="Ashar Pray is Required")
    private Boolean asharPray;

    @NotNull(message="Maghrib Pray is Required")
    private Boolean maghribPray;

    @NotNull(message="Isya Pray is Required")
    private Boolean isyaPray;
}
