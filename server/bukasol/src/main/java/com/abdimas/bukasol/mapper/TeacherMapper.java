package com.abdimas.bukasol.mapper;

import java.util.List;

import org.mapstruct.Mapper;
import org.mapstruct.Mapping;
import org.mapstruct.factory.Mappers;

import com.abdimas.bukasol.data.model.Teacher;
import com.abdimas.bukasol.dto.TeacherDTO;

@Mapper(componentModel = "spring")
public interface TeacherMapper {

    TeacherMapper INSTANCE = Mappers.getMapper(TeacherMapper.class);

    TeacherDTO toTeacherDTO(Teacher teacher);

    @Mapping(target="student", ignore=true)
    @Mapping(target="user", ignore=true)
    Teacher toTeacher(TeacherDTO teacherDTO);

    List<TeacherDTO> toTeacherDTOList(List<Teacher> teachers);
}
