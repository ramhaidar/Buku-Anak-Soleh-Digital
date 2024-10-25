package com.abdimas.bukasol.data.repository;

import java.util.List;
import java.util.Optional;
import java.util.UUID;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;
import org.springframework.data.repository.query.Param;
import org.springframework.stereotype.Repository;

import com.abdimas.bukasol.data.model.PrayerRecitationGrade;

@Repository
public interface PrayerRecitationGradeRepository extends JpaRepository<PrayerRecitationGrade, UUID>{
    
    List<PrayerRecitationGrade> findAllByStudentId(UUID studentId);

    @Query("SELECT COUNT(prg) FROM PrayerRecitationGrade prg WHERE prg.student.id = :studentId AND prg.teacherSign = true")
    long countTeacherSignTrueByStudentId(@Param("studentId") UUID studentId);

    @Query("SELECT COUNT(prg) FROM PrayerRecitationGrade prg WHERE prg.student.id = :studentId AND prg.teacherSign = false")
    long countTeacherSignFalseByStudentId(@Param("studentId") UUID studentId);

    @Query("SELECT COUNT(prg) FROM PrayerRecitationGrade prg WHERE prg.student.id = :studentId AND prg.parentSign = true")
    long countParentSignTrueByStudentId(@Param("studentId") UUID studentId);

    @Query("SELECT COUNT(prg) FROM PrayerRecitationGrade prg WHERE prg.student.id = :studentId AND prg.parentSign = false")
    long countParentSignFalseByStudentId(@Param("studentId") UUID studentId);
    
    Optional<PrayerRecitationGrade> findByStudentIdAndReadingCategory(UUID studentId, String readingCategory);
}
