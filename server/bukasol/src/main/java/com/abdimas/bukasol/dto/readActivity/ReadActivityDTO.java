package com.abdimas.bukasol.dto.readActivity;

import java.time.LocalDate;
import java.util.UUID;

import com.abdimas.bukasol.dto.StudentDTO;

import lombok.AllArgsConstructor;
import lombok.Data;
import lombok.NoArgsConstructor;

@Data
@NoArgsConstructor
@AllArgsConstructor
public class ReadActivityDTO {
    private UUID id;
    private LocalDate timeStamp;
    private String bookTitle;
    private String page;
    private boolean teacherSign;
    private boolean parentSign;

    private StudentDTO student;
}
