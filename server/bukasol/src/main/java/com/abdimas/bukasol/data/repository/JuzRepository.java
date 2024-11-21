package com.abdimas.bukasol.data.repository;

import java.util.List;
import java.util.UUID;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

import com.abdimas.bukasol.data.model.Juz;

@Repository
public interface JuzRepository extends JpaRepository<Juz, UUID>{

    List<Juz> findAllByStudentIdAndJuzNumber(UUID studentId, int juzNumber);
}
