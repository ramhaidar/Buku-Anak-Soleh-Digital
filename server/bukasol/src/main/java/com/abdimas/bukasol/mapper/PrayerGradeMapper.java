package com.abdimas.bukasol.mapper;

import org.mapstruct.Mapper;
import org.mapstruct.Mapping;
import org.mapstruct.factory.Mappers;

import com.abdimas.bukasol.data.model.PrayerGrade;
import com.abdimas.bukasol.dto.prayerGrade.PrayerGradeDTO;

@Mapper(componentModel = "spring")
public interface PrayerGradeMapper {

    PrayerGradeMapper INSTANCE = Mappers.getMapper(PrayerGradeMapper.class);

    PrayerGradeDTO toPrayerGradeDTO(PrayerGrade prayerGrade);

    @Mapping(target="student", ignore=true)
    PrayerGrade toPrayerGrade(PrayerGradeDTO prayerGradeDTO);
}
