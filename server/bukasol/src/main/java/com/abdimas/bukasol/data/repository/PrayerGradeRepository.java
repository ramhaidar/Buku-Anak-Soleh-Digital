package com.abdimas.bukasol.data.repository;

import java.util.List;
import java.util.Optional;
import java.util.UUID;

import org.springframework.data.domain.Page;
import org.springframework.data.domain.Pageable;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

import com.abdimas.bukasol.data.model.PrayerGrade;

@Repository
public interface PrayerGradeRepository extends JpaRepository<PrayerGrade, UUID> {
    
    List<PrayerGrade> findAllByStudentId(UUID studentId);
    Page<PrayerGrade> findAllByStudentId(Pageable pageable, UUID studentId);
    
    Optional<PrayerGrade> findByStudentIdAndMotionCategory(UUID studentId, String motionCategory);
}
