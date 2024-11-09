package com.abdimas.bukasol.service.impl;

import java.util.ArrayList;
import java.util.List;
import java.util.Optional;
import java.util.UUID;

import org.springframework.stereotype.Service;

import com.abdimas.bukasol.data.model.MuhasabahReport;
import com.abdimas.bukasol.data.model.Student;
import com.abdimas.bukasol.data.repository.MuhasabahReportRepository;
import com.abdimas.bukasol.dto.muhasabah.MuhasabahReportDTO;
import com.abdimas.bukasol.dto.muhasabah.MuhasabahReportInfoDTO;
import com.abdimas.bukasol.dto.muhasabah.MuhasabahReportSaveDTO;
import com.abdimas.bukasol.dto.muhasabah.MuhasabahReportStudentInfoDTO;
import com.abdimas.bukasol.dto.muhasabah.MuhasabahReportStudentShowDTO;
import com.abdimas.bukasol.dto.muhasabah.MuhasabahReportTeacherShowDTO;
import com.abdimas.bukasol.exception.DuplicateEntityException;
import com.abdimas.bukasol.exception.EntityNotFoundException;
import com.abdimas.bukasol.exception.MismatchException;
import com.abdimas.bukasol.exception.NoContentException;
import com.abdimas.bukasol.mapper.MuhasabahReportMapper;
import com.abdimas.bukasol.service.MuhasabahReportService;
import com.abdimas.bukasol.service.UserService;

import lombok.AllArgsConstructor;

@Service
@AllArgsConstructor
public class MuhasabahReportServiceImpl implements MuhasabahReportService {

    private final MuhasabahReportRepository muhasabahReportRepository;
    private final MuhasabahReportMapper muhasabahReportMapper;

    private final UserService userService;

    @Override
    public MuhasabahReport findMuhasabahReportById(UUID muhasabahReportId) {
        return muhasabahReportRepository.findById(muhasabahReportId)
                .orElseThrow(() -> new EntityNotFoundException("Muhasabah Report Not Found"));
    }

    @Override
    public List<MuhasabahReport> findAllMuhasabahReportByStudentId(UUID studentId) {
        List<MuhasabahReport> muhasabahReports = muhasabahReportRepository.findAllByStudentId(studentId);

        if(muhasabahReports.isEmpty()) {
            throw new NoContentException("There is No Muhasabah Report for the Student");
        }

        return muhasabahReports;
    }

    @Override
    public MuhasabahReportInfoDTO showAllMuhasabahReportByClass(String className) {
        MuhasabahReportInfoDTO muhasabahReportInfoDTO = new MuhasabahReportInfoDTO();
        List<MuhasabahReportTeacherShowDTO> muhasabahReportTeacherShowDTOs = new ArrayList<>();

        List<Student> students = userService.findStudentByClassName(className);

        muhasabahReportInfoDTO.setClassName(className);
        muhasabahReportInfoDTO.setTeacherName(students.get(0).getTeacher().getUser().getName());

        for(Student student : students) {
            MuhasabahReportTeacherShowDTO muhasabahReportTeacherShowDTO = new MuhasabahReportTeacherShowDTO();

            boolean teacherSign = false;
            boolean parentSign = false;

            long teacherSignFalse = muhasabahReportRepository.countTeacherSignFalseByStudentId(student.getId());
            long parentSignFalse = muhasabahReportRepository.countParentSignFalseByStudentId(student.getId());

            if(teacherSignFalse == 0) {
                teacherSign = true;
            }

            if(parentSignFalse == 0) {
                parentSign = true;
            }

            muhasabahReportTeacherShowDTO.setStudentId(student.getId());
            muhasabahReportTeacherShowDTO.setStudentNisn(student.getNisn());
            muhasabahReportTeacherShowDTO.setStudentName(student.getUser().getName());
            muhasabahReportTeacherShowDTO.setTeacherSign(teacherSign);
            muhasabahReportTeacherShowDTO.setParentSign(parentSign);

            muhasabahReportTeacherShowDTOs.add(muhasabahReportTeacherShowDTO);
        }

        muhasabahReportInfoDTO.setMuhasabahReports(muhasabahReportTeacherShowDTOs);
        
        return muhasabahReportInfoDTO;
    }

    @Override
    public MuhasabahReportStudentInfoDTO showAllMuhasabahReportByStudentId(UUID studentId) {
        Student student = userService.findStudentById(studentId);

        MuhasabahReportStudentInfoDTO muhasabahReportStudentInfoDTO = new MuhasabahReportStudentInfoDTO();
        List<MuhasabahReportStudentShowDTO> muhasabahReportStudentShowDTOs = new ArrayList<>();

        muhasabahReportStudentInfoDTO.setStudentName(student.getUser().getName());

        List<MuhasabahReport> muhasabahReports = findAllMuhasabahReportByStudentId(student.getId());

        for(MuhasabahReport muhasabahReport : muhasabahReports) {
            MuhasabahReportStudentShowDTO muhasabahReportStudentShowDTO = new MuhasabahReportStudentShowDTO();

            int countFardhuPray = 0;

            muhasabahReportStudentShowDTO.setSurahRead(false);

            if(muhasabahReport.getSurahAyat() != null) {
                muhasabahReportStudentShowDTO.setSurahRead(true);
            }

            if(muhasabahReport.isSubuhPray()) {
                countFardhuPray++;
            }

            if(muhasabahReport.isDzuhurPray()) {
                countFardhuPray++;
            }

            if(muhasabahReport.isAsharPray()) {
                countFardhuPray++;
            }

            if(muhasabahReport.isMaghribPray()) {
                countFardhuPray++;
            }

            if(muhasabahReport.isIsyaPray()) {
                countFardhuPray++;
            }

            muhasabahReportStudentShowDTO.setMuhasabahReportId(muhasabahReport.getId());
            muhasabahReportStudentShowDTO.setTimeStamp(muhasabahReport.getTimeStamp());
            muhasabahReportStudentShowDTO.setSunnahPray(muhasabahReport.isSunnahPray());
            muhasabahReportStudentShowDTO.setFardhuPray(countFardhuPray + "/5");
            muhasabahReportStudentShowDTO.setTeacherSign(muhasabahReport.isTeacherSign());
            muhasabahReportStudentShowDTO.setParentSign(muhasabahReport.isParentSign());

            muhasabahReportStudentShowDTOs.add(muhasabahReportStudentShowDTO);
        }

        muhasabahReportStudentInfoDTO.setMuhasabahReports(muhasabahReportStudentShowDTOs);
        
        return muhasabahReportStudentInfoDTO;
    }

    @Override
    public MuhasabahReportDTO showMuhasabahReportByMuhasabahReportId(UUID muhasabahReportId) {
        MuhasabahReport muhasabahReport = findMuhasabahReportById(muhasabahReportId);
        
        return muhasabahReportMapper.tomuhasabahReportDTO(muhasabahReport);
    }

    @Override
    public MuhasabahReport createMuhasabahReportStudent(MuhasabahReportSaveDTO muhasabahReportSaveDTO) {
        Student student = userService.findStudentById(muhasabahReportSaveDTO.getStudentId());

        Optional<MuhasabahReport> existingMuhasabahReport = muhasabahReportRepository.findByStudentIdAndTimeStamp(muhasabahReportSaveDTO.getStudentId(), muhasabahReportSaveDTO.getTimeStamp());

        if(existingMuhasabahReport.isPresent()) {
            throw new DuplicateEntityException("Muhasabah Report for this Time already exists");
        }

        MuhasabahReport muhasabahReport = new MuhasabahReport();
        muhasabahReport.setStudent(student);
        muhasabahReport.setTimeStamp(muhasabahReportSaveDTO.getTimeStamp());
        muhasabahReport.setSurahName(muhasabahReportSaveDTO.getSurahName());
        muhasabahReport.setSurahAyat(muhasabahReportSaveDTO.getSurahAyat());
        muhasabahReport.setSunnahPray(muhasabahReportSaveDTO.getSunnahPray());
        muhasabahReport.setSubuhPray(muhasabahReportSaveDTO.getSubuhPray());
        muhasabahReport.setDzuhurPray(muhasabahReportSaveDTO.getDzuhurPray());
        muhasabahReport.setAsharPray(muhasabahReportSaveDTO.getAsharPray());
        muhasabahReport.setMaghribPray(muhasabahReportSaveDTO.getMaghribPray());
        muhasabahReport.setIsyaPray(muhasabahReportSaveDTO.getIsyaPray());
        muhasabahReport.setTeacherSign(false);
        muhasabahReport.setParentSign(false);

        return muhasabahReportRepository.save(muhasabahReport);
    }

    @Override
    public String deleteMuhasabahReportStudent(UUID muhasabahReportId) {
        MuhasabahReport muhasabahReport = findMuhasabahReportById(muhasabahReportId);

        muhasabahReportRepository.delete(muhasabahReport);

        return "Muhasabah Report '" + muhasabahReport.getTimeStamp() + "' of Student '" + muhasabahReport.getStudent().getUser().getName() + "' Successfully Deleted";
    }

    @Override
    public MuhasabahReportDTO teacherSignMuhasabahReport(UUID muhasabahReportId) {
        MuhasabahReport muhasabahReport = findMuhasabahReportById(muhasabahReportId);

        muhasabahReport.setTeacherSign(!muhasabahReport.isTeacherSign());

        MuhasabahReport updatedMuhasabahReport = muhasabahReportRepository.save(muhasabahReport);
        
        return muhasabahReportMapper.tomuhasabahReportDTO(updatedMuhasabahReport);
    }

    @Override
    public MuhasabahReportDTO parentSignMuhasabahReport(UUID muhasabahReportId, String parentCode) {
        MuhasabahReport muhasabahReport = findMuhasabahReportById(muhasabahReportId);
        Student student = userService.findStudentById(muhasabahReport.getStudent().getId());

        if(student.getParentCode().equals(parentCode)) {
            muhasabahReport.setParentSign(!muhasabahReport.isParentSign());
        } else {
            throw new MismatchException("Wrong Parent Code");
        }

        MuhasabahReport updatedMuhasabahReport = muhasabahReportRepository.save(muhasabahReport);
        
        return muhasabahReportMapper.tomuhasabahReportDTO(updatedMuhasabahReport);
    }
}
