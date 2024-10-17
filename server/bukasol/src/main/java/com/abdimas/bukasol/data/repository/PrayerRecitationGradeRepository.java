package com.abdimas.bukasol.data.repository;

import java.util.Optional;
import java.util.UUID;

import org.springframework.data.domain.Page;
import org.springframework.data.domain.Pageable;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

import com.abdimas.bukasol.data.model.PrayerRecitationGrade;

@Repository
public interface PrayerRecitationGradeRepository extends JpaRepository<PrayerRecitationGrade, UUID>{
    
    Page<PrayerRecitationGrade> findAllByStudentId(Pageable pageable, UUID studentId);
    
    Optional<PrayerRecitationGrade> findByStudentIdAndMotionCategory(UUID studentId, String motionCategory);
}
