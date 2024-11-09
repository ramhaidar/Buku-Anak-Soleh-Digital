package com.abdimas.bukasol.data.repository;

import java.util.List;
import java.util.UUID;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

import com.abdimas.bukasol.data.model.Student;
import com.abdimas.bukasol.data.model.Teacher;

@Repository
public interface StudentRepository extends JpaRepository<Student, UUID>{

    List<Student> findByTeacher(Teacher teacher);

    List<Student> findByClassName(String className);

    boolean existsByNisn(String nisn);
}
