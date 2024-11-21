package com.abdimas.bukasol.data.repository;

import java.util.List;
import java.util.UUID;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;
import org.springframework.data.repository.query.Param;
import org.springframework.stereotype.Repository;

import com.abdimas.bukasol.data.model.ViolationReport;

@Repository
public interface ViolationReportRepository extends JpaRepository<ViolationReport, UUID>{

    List<ViolationReport> findAllByStudentId(UUID studentId);

    @Query("SELECT COUNT(vr) FROM ViolationReport vr WHERE vr.student.id = :studentId AND vr.teacherSign = false")
    long countTeacherSignFalseByStudentId(@Param("studentId") UUID studentId);

    long countByStudentId(UUID studentId);
}
