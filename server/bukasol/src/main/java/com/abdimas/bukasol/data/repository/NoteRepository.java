package com.abdimas.bukasol.data.repository;

import java.time.LocalDate;
import java.util.List;
import java.util.Optional;
import java.util.UUID;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

import com.abdimas.bukasol.data.model.Note;

@Repository
public interface NoteRepository extends JpaRepository<Note, UUID>{

    List<Note> findAllByStudentId(UUID studentId);

    Optional<Note> findByStudentIdAndTimeStamp(UUID studentId, LocalDate timeStamp);
}
