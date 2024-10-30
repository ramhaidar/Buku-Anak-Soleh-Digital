package com.abdimas.bukasol.dto.note;

import jakarta.validation.constraints.NotBlank;
import lombok.AllArgsConstructor;
import lombok.Data;
import lombok.NoArgsConstructor;

@Data
@NoArgsConstructor
@AllArgsConstructor
public class NoteTeacherReplyDTO {
    @NotBlank(message="Reply is Required")
    private String teacherAnswer;
}
