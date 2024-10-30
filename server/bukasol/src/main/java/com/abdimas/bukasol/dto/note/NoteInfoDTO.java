package com.abdimas.bukasol.dto.note;

import java.time.LocalDate;
import java.util.List;

import lombok.AllArgsConstructor;
import lombok.Data;
import lombok.NoArgsConstructor;

@Data
@NoArgsConstructor
@AllArgsConstructor
public class NoteInfoDTO {
    private String className;
    private String teacherName;
    private LocalDate timeStamp;

    private List<NoteTeacherShowDTO> notes;
}
