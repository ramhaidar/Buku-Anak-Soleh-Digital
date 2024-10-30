package com.abdimas.bukasol.mapper;

import java.util.List;

import org.mapstruct.Mapper;
import org.mapstruct.Mapping;
import org.mapstruct.factory.Mappers;

import com.abdimas.bukasol.data.model.ReadActivity;
import com.abdimas.bukasol.dto.readActivity.ReadActivityDTO;

@Mapper(componentModel = "spring")
public interface ReadActivityMapper {

    ReadActivityMapper INSTANCE = Mappers.getMapper(ReadActivityMapper.class);

    ReadActivityDTO toReadActivityDTO(ReadActivity readActivity);

    @Mapping(target="student", ignore=true)
    ReadActivity toReadActivity(ReadActivityDTO readActivityDTO);

    List<ReadActivityDTO> toReadActivityDTOs(List<ReadActivity> readActivities);
}
