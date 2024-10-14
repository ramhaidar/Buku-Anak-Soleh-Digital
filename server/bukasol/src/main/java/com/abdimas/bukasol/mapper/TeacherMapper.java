package com.abdimas.bukasol.mapper;

import org.mapstruct.Mapper;
import org.mapstruct.Mapping;
import org.mapstruct.factory.Mappers;

import com.abdimas.bukasol.data.model.Teacher;
import com.abdimas.bukasol.dto.TeacherDTO;

@Mapper(componentModel = "spring")
public interface TeacherMapper {

    TeacherMapper INSTANCE = Mappers.getMapper(TeacherMapper.class);

    @Mapping(source="user.id", target="userId")
    @Mapping(source="user.name", target="userName")
    TeacherDTO toTeacherDTO(Teacher teacher);

    @Mapping(target = "user", ignore = true)
    @Mapping(target = "student", ignore = true)
    Teacher toTeacher(TeacherDTO teacherDTO);
}
