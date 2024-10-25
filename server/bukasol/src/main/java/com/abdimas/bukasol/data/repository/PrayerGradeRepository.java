package com.abdimas.bukasol.data.repository;

import java.util.List;
import java.util.Optional;
import java.util.UUID;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;
import org.springframework.data.repository.query.Param;
import org.springframework.stereotype.Repository;

import com.abdimas.bukasol.data.model.PrayerGrade;

@Repository
public interface PrayerGradeRepository extends JpaRepository<PrayerGrade, UUID> {
    
    List<PrayerGrade> findAllByStudentId(UUID studentId);

    @Query("SELECT COUNT(pg) FROM PrayerGrade pg WHERE pg.student.id = :studentId AND pg.teacherSign = true")
    long countTeacherSignTrueByStudentId(@Param("studentId") UUID studentId);

    @Query("SELECT COUNT(pg) FROM PrayerGrade pg WHERE pg.student.id = :studentId AND pg.teacherSign = false")
    long countTeacherSignFalseByStudentId(@Param("studentId") UUID studentId);

    @Query("SELECT COUNT(pg) FROM PrayerGrade pg WHERE pg.student.id = :studentId AND pg.parentSign = true")
    long countParentSignTrueByStudentId(@Param("studentId") UUID studentId);

    @Query("SELECT COUNT(pg) FROM PrayerGrade pg WHERE pg.student.id = :studentId AND pg.parentSign = false")
    long countParentSignFalseByStudentId(@Param("studentId") UUID studentId);
    
    Optional<PrayerGrade> findByStudentIdAndMotionCategory(UUID studentId, String motionCategory);
}
