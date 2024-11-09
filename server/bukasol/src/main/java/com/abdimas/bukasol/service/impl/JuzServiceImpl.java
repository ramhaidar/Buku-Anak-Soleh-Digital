package com.abdimas.bukasol.service.impl;

import java.util.ArrayList;
import java.util.List;
import java.util.UUID;

import org.springframework.stereotype.Service;

import com.abdimas.bukasol.data.model.Juz;
import com.abdimas.bukasol.data.model.Student;
import com.abdimas.bukasol.data.repository.JuzRepository;
import com.abdimas.bukasol.dto.juz.JuzDTO;
import com.abdimas.bukasol.dto.juz.JuzInfoDTO;
import com.abdimas.bukasol.dto.juz.JuzSaveDTO;
import com.abdimas.bukasol.dto.juz.JuzTeacherShowDTO;
import com.abdimas.bukasol.exception.MismatchException;
import com.abdimas.bukasol.exception.NoContentException;
import com.abdimas.bukasol.mapper.JuzMapper;
import com.abdimas.bukasol.service.JuzService;
import com.abdimas.bukasol.service.UserService;

import jakarta.persistence.EntityNotFoundException;
import lombok.AllArgsConstructor;

@Service
@AllArgsConstructor
public class JuzServiceImpl implements JuzService {

    private final JuzRepository juzRepository;
    private final JuzMapper juzMapper;

    private final UserService userService;

    @Override
    public Juz findJuzById(UUID juzId) {
        return juzRepository.findById(juzId)
                .orElseThrow(() -> new EntityNotFoundException("Juz Report Not Found"));
    }

    @Override
    public List<Juz> findAllJuzReportByStudentIdAndJuzNumber(UUID studentId, int juzNumber) {
        List<Juz> juzReports = juzRepository.findAllByStudentIdAndJuzNumber(studentId, juzNumber);

        if(juzReports.isEmpty()) {
            throw new NoContentException("There is No Juz Report for the Student");
        }
        
        return juzReports;
    }

    @Override
    public JuzInfoDTO showAllJuzReportByClassAndJuzNumber(String className, int juzNumber) {
        JuzInfoDTO juzInfoDTO = new JuzInfoDTO();
        List<JuzTeacherShowDTO> juzTeacherShowDTOs = new ArrayList<>();

        List<Student> students = userService.findStudentByClassName(className);

        juzInfoDTO.setClassName(className);
        juzInfoDTO.setTeacherName(students.get(0).getTeacher().getUser().getName());

        for(Student student : students) {
            JuzTeacherShowDTO juzTeacherShowDTO = new JuzTeacherShowDTO();

            Juz juz = findAllJuzReportByStudentIdAndJuzNumber(student.getId(), juzNumber).get(0);

            juzTeacherShowDTO.setStudentId(student.getId());
            juzTeacherShowDTO.setStudentNisn(student.getNisn());
            juzTeacherShowDTO.setStudentName(student.getUser().getName());
            juzTeacherShowDTO.setSurahName(juz.getSurahName());
            juzTeacherShowDTO.setSurahAyat(juz.getSurahAyat());
            juzTeacherShowDTO.setParentSign(juz.isParentSign());

            juzTeacherShowDTOs.add(juzTeacherShowDTO);
        }

        juzInfoDTO.setJuzReports(juzTeacherShowDTOs);
        
        return juzInfoDTO;
    }

    @Override
    public List<JuzDTO> showAllJuzReportByStudentIdAndJuzNumber(UUID studentId, int juzNumber) {
        Student student = userService.findStudentById(studentId);

        List<Juz> juzReports = findAllJuzReportByStudentIdAndJuzNumber(student.getId(), juzNumber);
        
        return juzMapper.toJuzDTOs(juzReports);
    }

    @Override
    public Juz createJuzReportStudent(JuzSaveDTO juzSaveDTO) {
        Student student = userService.findStudentById(juzSaveDTO.getStudentId());

        Juz juz = new Juz();
        juz.setStudent(student);
        juz.setTimeStamp(juz.getTimeStamp());
        juz.setJuzNumber(juzSaveDTO.getJuzNumber());
        juz.setSurahName(juzSaveDTO.getSurahName());
        juz.setSurahAyat(juzSaveDTO.getSurahAyat());
        juz.setParentSign(false);
    
        return juzRepository.save(juz);
    }

    @Override
    public String deleteJuzReportStudent(UUID juzReportId) {
        Juz juzReport = findJuzById(juzReportId);

        juzRepository.delete(juzReport);
        
        return "Juz Report '" + juzReport.getSurahName() + "' and '" + juzReport.getSurahAyat() + "' of Student '" + juzReport.getStudent().getUser().getName() + "' Successfully Deleted";
    }

    @Override
    public JuzDTO parentSignJuzReport(UUID juzReportId, String parentCode) {
        Juz juzReport = findJuzById(juzReportId);
        Student student = userService.findStudentById(juzReport.getStudent().getId());

        if(student.getParentCode().equals(parentCode)) {
            juzReport.setParentSign(!juzReport.isParentSign());
        } else {
            throw new MismatchException("Wrong Parent Code");
        }

        Juz updatedJuzReport = juzRepository.save(juzReport);
        
        return juzMapper.toJuzDTO(updatedJuzReport);
    }
}
