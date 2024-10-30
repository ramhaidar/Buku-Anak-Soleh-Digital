package com.abdimas.bukasol.dto.note;

import java.time.LocalDate;
import java.util.UUID;

import com.abdimas.bukasol.dto.StudentDTO;

import lombok.AllArgsConstructor;
import lombok.Data;
import lombok.NoArgsConstructor;

@Data
@NoArgsConstructor
@AllArgsConstructor
public class NoteDTO {
    private UUID id;
    private LocalDate timeStamp;
    private String agenda;
    private String content;
    private String parentQuestion;
    private String teacherAnswer;
    private boolean teacherSign;

    private StudentDTO student;
}
