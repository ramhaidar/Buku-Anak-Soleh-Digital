package com.abdimas.bukasol.mapper;

import java.util.List;

import org.mapstruct.Mapper;
import org.mapstruct.Mapping;
import org.mapstruct.factory.Mappers;

import com.abdimas.bukasol.data.model.Note;
import com.abdimas.bukasol.dto.note.NoteDTO;

@Mapper(componentModel = "spring")
public interface NoteMapper {

    NoteMapper INSTANCE = Mappers.getMapper(NoteMapper.class);

    NoteDTO toNoteDTO(Note note);

    @Mapping(target="student", ignore=true)
    Note toNote(NoteDTO noteDTO);

    List<NoteDTO> toNoteDTOs(List<Note> note);
}
