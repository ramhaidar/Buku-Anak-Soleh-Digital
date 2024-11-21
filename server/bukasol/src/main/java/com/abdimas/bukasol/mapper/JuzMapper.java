package com.abdimas.bukasol.mapper;

import java.util.List;

import org.mapstruct.Mapper;
import org.mapstruct.Mapping;
import org.mapstruct.factory.Mappers;

import com.abdimas.bukasol.data.model.Juz;
import com.abdimas.bukasol.dto.juz.JuzDTO;

@Mapper(componentModel = "spring")
public interface JuzMapper {

    JuzMapper INSTANCE = Mappers.getMapper(JuzMapper.class);

    JuzDTO toJuzDTO(Juz juz);

    @Mapping(target="student", ignore=true)
    Juz toJuz(JuzDTO juzDTO);

    List<JuzDTO> toJuzDTOs(List<Juz> violationReport);
}
