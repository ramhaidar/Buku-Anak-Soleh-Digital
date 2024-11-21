package com.abdimas.bukasol.mapper;

import org.mapstruct.Mapper;
import org.mapstruct.Mapping;
import org.mapstruct.factory.Mappers;

import com.abdimas.bukasol.data.model.MuhasabahReport;
import com.abdimas.bukasol.dto.muhasabah.MuhasabahReportDTO;

@Mapper(componentModel = "spring")
public interface MuhasabahReportMapper {

    MuhasabahReportMapper INSTANCE = Mappers.getMapper(MuhasabahReportMapper.class);

    MuhasabahReportDTO toMuhasabahReportDTO(MuhasabahReport muhasabahReport);

    @Mapping(target="student", ignore=true)
    MuhasabahReport toMuhasabahReport(MuhasabahReportDTO muhasabahReportDTO);
}
