package com.abdimas.bukasol.dto.muhasabah;

import java.util.List;

import lombok.AllArgsConstructor;
import lombok.Data;
import lombok.NoArgsConstructor;

@Data
@NoArgsConstructor
@AllArgsConstructor
public class MuhasabahReportStudentInfoDTO {
    private String studentName;

    private List<MuhasabahReportStudentShowDTO> muhasabahReports;
}
