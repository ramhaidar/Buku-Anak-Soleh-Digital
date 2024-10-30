package com.abdimas.bukasol.service.impl;

import java.time.LocalDate;
import java.util.ArrayList;
import java.util.List;
import java.util.Optional;
import java.util.UUID;

import org.springframework.stereotype.Service;

import com.abdimas.bukasol.data.model.Note;
import com.abdimas.bukasol.data.model.Student;
import com.abdimas.bukasol.data.repository.NoteRepository;
import com.abdimas.bukasol.dto.note.NoteDTO;
import com.abdimas.bukasol.dto.note.NoteInfoDTO;
import com.abdimas.bukasol.dto.note.NoteSaveDTO;
import com.abdimas.bukasol.dto.note.NoteTeacherReplyDTO;
import com.abdimas.bukasol.dto.note.NoteTeacherShowDTO;
import com.abdimas.bukasol.exception.DuplicateEntityException;
import com.abdimas.bukasol.exception.MismatchException;
import com.abdimas.bukasol.exception.NoContentException;
import com.abdimas.bukasol.mapper.NoteMapper;
import com.abdimas.bukasol.service.NoteService;
import com.abdimas.bukasol.service.UserService;

import jakarta.persistence.EntityNotFoundException;
import lombok.AllArgsConstructor;

@Service
@AllArgsConstructor
public class NoteServiceImpl implements NoteService {

    private final NoteRepository noteRepository;
    private final NoteMapper noteMapper;

    private final UserService userService;

    @Override
    public Note findNoteActivityById(UUID noteActivityId) {
        return noteRepository.findById(noteActivityId)
                .orElseThrow(() -> new EntityNotFoundException("Note Activity Not Found"));
    }
    
    @Override
    public List<Note> findAllNoteActivityByStudentId(UUID studentId) {
        List<Note> noteActivities = noteRepository.findAllByStudentId(studentId);

        if(noteActivities.isEmpty()) {
            throw new NoContentException("There is No Note Activity for The Student");
        }
        
        return noteActivities;
    }

    @Override
    public List<NoteDTO> showAllNoteActivityByStudentId(UUID studentId) {
        Student student = userService.findStudentById(studentId);

        List<Note> noteActivities = findAllNoteActivityByStudentId(student.getId());
        
        return noteMapper.toNoteDTOs(noteActivities);
    }

    @Override
    public NoteInfoDTO showAllNoteActivityByClassAndTimeStamp(String className, LocalDate timeStamp) {
        NoteInfoDTO noteInfoDTO = new NoteInfoDTO();
        List<NoteTeacherShowDTO> noteTeacherShowDTOs = new ArrayList<>();

        List<Student> students = userService.findStudentByClassName(className);

        noteInfoDTO.setClassName(className);
        noteInfoDTO.setTeacherName(students.get(0).getTeacher().getUser().getName());
        noteInfoDTO.setTimeStamp(timeStamp);

        for(Student student : students) {
            NoteTeacherShowDTO noteTeacherShowDTO = new NoteTeacherShowDTO();

            Optional<Note> note = noteRepository.findByStudentIdAndTimeStamp(student.getId(), timeStamp);

            if(note.isPresent()) {
                noteTeacherShowDTO.setStudentId(student.getId());
                noteTeacherShowDTO.setStudentNisn(student.getNisn());
                noteTeacherShowDTO.setStudentName(student.getUser().getName());

                if(note.isPresent()) {
                    if(note.get().getParentQuestion() != null) {
                        noteTeacherShowDTO.setParentQuestion(true);
                    }
    
                    noteTeacherShowDTO.setTeacherSign(note.get().isTeacherSign());
                }

                noteTeacherShowDTOs.add(noteTeacherShowDTO);
            }
        }

        noteInfoDTO.setNotes(noteTeacherShowDTOs);
        
        return noteInfoDTO;
    }
    
    @Override
    public NoteDTO showNoteActivityByNoteActivityId(UUID noteActivityId) {
        Note note = findNoteActivityById(noteActivityId);
        
        return noteMapper.toNoteDTO(note);
    }

    @Override
    public Note createNoteActivityStudent(NoteSaveDTO noteSaveDTO) {
        Student student = userService.findStudentById(noteSaveDTO.getStudentId());

        Optional<Note> existingNote = noteRepository.findByStudentIdAndTimeStamp(noteSaveDTO.getStudentId(), noteSaveDTO.getTimeStamp());

        if(existingNote.isPresent()) {
            throw new DuplicateEntityException("Note Activity for this Time already exists");
        }

        Note note = new Note();
        note.setStudent(student);
        note.setTimeStamp(noteSaveDTO.getTimeStamp());
        note.setAgenda(noteSaveDTO.getAgenda());
        note.setContent(noteSaveDTO.getContent());
        note.setParentQuestion(noteSaveDTO.getParentQuestion());
        note.setTeacherAnswer(null);
        note.setTeacherSign(false);
        
        return noteRepository.save(note);
    }

    @Override
    public NoteDTO teacherReplyParentQuestion(UUID noteActivityId, NoteTeacherReplyDTO noteTeacherReplyDTO) {
        Note note = findNoteActivityById(noteActivityId);

        if(note.getParentQuestion() == null) {
            throw new MismatchException("There is no Question From Parent");
        }

        note.setTeacherAnswer(noteTeacherReplyDTO.getTeacherAnswer());

        Note updatedNote = noteRepository.save(note);
        
        return noteMapper.toNoteDTO(updatedNote);
    }

    @Override
    public String deleteNoteActivityStudent(UUID noteActivityId) {
        Note note = findNoteActivityById(noteActivityId);

        noteRepository.delete(note);
        
        return "Note Activity '" + note.getAgenda() + "' of Student '" + note.getStudent().getUser().getName() + "' Successfully Deleted";
    }

    @Override
    public NoteDTO teacherSignNoteActivity(UUID noteActivityId) {
        Note note = findNoteActivityById(noteActivityId);

        note.setTeacherSign(!note.isTeacherSign());

        Note updatedNote = noteRepository.save(note);

        return noteMapper.toNoteDTO(updatedNote);
    }
}
