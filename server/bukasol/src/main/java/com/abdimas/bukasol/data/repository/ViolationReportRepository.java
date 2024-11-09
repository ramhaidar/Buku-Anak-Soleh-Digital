package com.abdimas.bukasol.data.repository;

import java.util.UUID;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

import com.abdimas.bukasol.data.model.ViolationReport;

@Repository
public interface ViolationReportRepository extends JpaRepository<ViolationReport, UUID>{

}
