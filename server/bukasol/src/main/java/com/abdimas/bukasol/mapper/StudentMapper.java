package com.abdimas.bukasol.mapper;

import org.mapstruct.Mapper;
import org.mapstruct.factory.Mappers;

@Mapper(componentModel = "spring")
public interface StudentMapper {
    
    StudentMapper INSTANCE = Mappers.getMapper(StudentMapper.class);
}
