package com.abdimas.bukasol.service;

import java.util.List;
import java.util.UUID;

import com.abdimas.bukasol.data.model.Note;
import com.abdimas.bukasol.dto.note.NoteDTO;
import com.abdimas.bukasol.dto.note.NoteInfoDTO;
import com.abdimas.bukasol.dto.note.NoteSaveDTO;
import com.abdimas.bukasol.dto.note.NoteTeacherReplyDTO;

public interface NoteService {
    List<Note> findAllNoteActivityByStudentId(UUID studentId);
    
    List<NoteDTO> showAllNoteActivityByStudentId(UUID studentId);

    NoteInfoDTO showAllNoteActivityByClass(String className);

    Note findNoteActivityById(UUID noteActivityId);
    
    NoteDTO showNoteActivityByNoteActivityId(UUID noteActivityId);

    Note createNoteActivityStudent(NoteSaveDTO noteSaveDTO);

    NoteDTO teacherReplyParentQuestion(UUID noteActivityId, NoteTeacherReplyDTO noteTeacherReplyDTO);

    String deleteNoteActivityStudent(UUID noteActivityId);

    NoteDTO teacherSignNoteActivity(UUID noteActivityId);
}
