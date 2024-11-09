package com.abdimas.bukasol.mapper;

import java.util.List;

import org.mapstruct.Mapper;
import org.mapstruct.Mapping;
import org.mapstruct.factory.Mappers;

import com.abdimas.bukasol.data.model.ViolationReport;
import com.abdimas.bukasol.dto.violation.ViolationReportDTO;

@Mapper(componentModel = "spring")
public interface ViolationReportMapper {

    ViolationReportMapper INSTANCE = Mappers.getMapper(ViolationReportMapper.class);

    ViolationReportDTO toViolationReportDTO(ViolationReport violationReport);

    @Mapping(target="student", ignore=true)
    ViolationReport toViolationReport(ViolationReportDTO violationReportDTO);

    List<ViolationReportDTO> toViolationDTOs(List<ViolationReport> violationReport);
}
