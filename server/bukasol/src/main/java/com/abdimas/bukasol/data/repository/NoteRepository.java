package com.abdimas.bukasol.data.repository;

import java.time.LocalDate;
import java.util.List;
import java.util.Optional;
import java.util.UUID;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;
import org.springframework.data.repository.query.Param;
import org.springframework.stereotype.Repository;

import com.abdimas.bukasol.data.model.Note;

@Repository
public interface NoteRepository extends JpaRepository<Note, UUID>{

    List<Note> findAllByStudentId(UUID studentId);

    Optional<Note> findByStudentIdAndTimeStamp(UUID studentId, LocalDate timeStamp);

    @Query("SELECT COUNT(n) FROM Note n WHERE n.student.id = :studentId AND n.teacherSign = false")
    long countTeacherSignFalseByStudentId(@Param("studentId") UUID studentId);

    @Query("SELECT COUNT(n) FROM Note n WHERE n.student.id = :studentId AND n.parentQuestion IS NOT NULL AND n.teacherAnswer IS NULL")
    long countParentQuestionsAndTeacherAnswerByStudentId(@Param("studentId") UUID studentId);
}
