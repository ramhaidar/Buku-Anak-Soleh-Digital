package com.abdimas.bukasol.mapper;

import java.util.List;

import org.mapstruct.Mapper;
import org.mapstruct.Mapping;
import org.mapstruct.factory.Mappers;

import com.abdimas.bukasol.data.model.Student;
import com.abdimas.bukasol.dto.StudentAdminDTO;
import com.abdimas.bukasol.dto.StudentDTO;

@Mapper(componentModel = "spring")
public interface StudentMapper {

    StudentMapper INSTANCE = Mappers.getMapper(StudentMapper.class);

    @Mapping(source="user.name", target="name")
    @Mapping(source="user.username", target="username")
    @Mapping(source="user.password", target="password")
    @Mapping(source="teacher.id", target="teacherId")
    @Mapping(source="teacher.nip", target="teacherNip")
    @Mapping(source="teacher.user.name", target="teacherName")
    StudentAdminDTO toStudentAdminDTO(Student student);

    @Mapping(target="teacher", ignore=true)
    @Mapping(target="user", ignore=true)
    @Mapping(target="prayerGrade", ignore=true)
    @Mapping(target="prayerRecitationGrade", ignore=true)
    Student toStudent(StudentAdminDTO studentDTO);

    StudentDTO toStudentDTO(Student student);

    @Mapping(target="teacher", ignore=true)
    @Mapping(target="user", ignore=true)
    @Mapping(target="prayerGrade", ignore=true)
    @Mapping(target="prayerRecitationGrade", ignore=true)
    Student toStudent(StudentDTO studentDTO);

    List<StudentAdminDTO> toStudentDTOList(List<Student> students);
}
