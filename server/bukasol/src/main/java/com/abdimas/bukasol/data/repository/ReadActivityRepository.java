package com.abdimas.bukasol.data.repository;

import java.time.LocalDate;
import java.util.List;
import java.util.Optional;
import java.util.UUID;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;
import org.springframework.data.repository.query.Param;
import org.springframework.stereotype.Repository;

import com.abdimas.bukasol.data.model.ReadActivity;

@Repository
public interface ReadActivityRepository extends JpaRepository<ReadActivity, UUID>{

    List<ReadActivity> findAllByStudentId(UUID studentId);

    long countByStudentId(UUID studentId);

    @Query("SELECT COUNT(ra) FROM ReadActivity ra WHERE ra.student.id = :studentId AND ra.teacherSign = false")
    long countTeacherSignFalseByStudentId(@Param("studentId") UUID studentId);

    @Query("SELECT COUNT(ra) FROM ReadActivity ra WHERE ra.student.id = :studentId AND ra.parentSign = false")
    long countParentSignFalseByStudentId(@Param("studentId") UUID studentId);

    Optional<ReadActivity> findByStudentIdAndTimeStampAndBookTitleAndPage(UUID studentId, LocalDate timeStamp, String bookTitle, String page);
}
