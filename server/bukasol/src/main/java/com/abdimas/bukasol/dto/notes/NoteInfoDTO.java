package com.abdimas.bukasol.dto.notes;

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

    private List<NoteTeacherShowDTO> notes;
}
