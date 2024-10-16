package com.abdimas.bukasol.data.repository;

import java.util.UUID;

import org.springframework.data.domain.Page;
import org.springframework.data.domain.Pageable;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

import com.abdimas.bukasol.data.model.PrayerGrade;

@Repository
public interface PrayerGradeRepository extends JpaRepository<PrayerGrade, UUID> {
    
    Page<PrayerGrade> findAllByStudentId(Pageable pageable, UUID studentId);
}
