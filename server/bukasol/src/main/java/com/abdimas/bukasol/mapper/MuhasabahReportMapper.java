package com.abdimas.bukasol.mapper;

import java.util.List;

import org.mapstruct.Mapper;
import org.mapstruct.Mapping;
import org.mapstruct.factory.Mappers;

import com.abdimas.bukasol.data.model.MuhasabahReport;
import com.abdimas.bukasol.dto.muhasabah.MuhasabahReportDTO;

@Mapper(componentModel = "spring")
public interface MuhasabahReportMapper {

    MuhasabahReportMapper INSTANCE = Mappers.getMapper(MuhasabahReportMapper.class);

    MuhasabahReportDTO tomuhasabahReportDTO(MuhasabahReport muhasabahReport);

    @Mapping(target="student", ignore=true)
    MuhasabahReport toMuhasabahReport(MuhasabahReportDTO muhasabahReportDTO);

    List<MuhasabahReportDTO> toMuhasabahReportDTOs(List<MuhasabahReport> muhasabahReport);
}
