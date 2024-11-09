package com.abdimas.bukasol.data.repository;

import java.time.LocalDate;
import java.util.List;
import java.util.Optional;
import java.util.UUID;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;
import org.springframework.data.repository.query.Param;
import org.springframework.stereotype.Repository;

import com.abdimas.bukasol.data.model.MuhasabahReport;

@Repository
public interface MuhasabahReportRepository extends JpaRepository<MuhasabahReport, UUID>{

    List<MuhasabahReport> findAllByStudentId(UUID studentId);

    Optional<MuhasabahReport> findByStudentIdAndTimeStamp(UUID studentId, LocalDate timeStamp);

    @Query("SELECT COUNT(mr) FROM MuhasabahReport mr WHERE mr.student.id = :studentId AND mr.teacherSign = false")
    long countTeacherSignFalseByStudentId(@Param("studentId") UUID studentId);

    @Query("SELECT COUNT(mr) FROM MuhasabahReport mr WHERE mr.student.id = :studentId AND mr.parentSign = false")
    long countParentSignFalseByStudentId(@Param("studentId") UUID studentId);
}
