package com.abdimas.bukasol.mapper;

import java.util.List;

import org.mapstruct.Mapper;
import org.mapstruct.Mapping;
import org.mapstruct.factory.Mappers;

import com.abdimas.bukasol.data.model.Student;
import com.abdimas.bukasol.dto.StudentDTO;

@Mapper(componentModel = "spring")
public interface StudentMapper {

    StudentMapper INSTANCE = Mappers.getMapper(StudentMapper.class);

    StudentDTO toStudentDTO(Student student);

    @Mapping(target="teacher", ignore=true)
    @Mapping(target="user", ignore=true)
    Student toStudent(StudentDTO studentDTO);

    List<StudentDTO> toStudentDTOList(List<Student> students);
}
