package com.abdimas.bukasol.mapper;

import org.mapstruct.Mapper;
import org.mapstruct.Mapping;
import org.mapstruct.factory.Mappers;

import com.abdimas.bukasol.data.model.PrayerRecitationGrade;
import com.abdimas.bukasol.dto.prayerRecitationGrade.PrayerRecitationGradeDTO;

@Mapper(componentModel = "spring")
public interface PrayerRecitationGradeMapper {

    PrayerRecitationGradeMapper INSTANCE = Mappers.getMapper(PrayerRecitationGradeMapper.class);

    PrayerRecitationGradeDTO toPrayerRecitationGradeDTO(PrayerRecitationGrade prayerRecitationGrade);

    @Mapping(target="student", ignore=true)
    PrayerRecitationGrade toPrayerRecitationGrade(PrayerRecitationGradeDTO prayerRecitationGradeDTO);
}
