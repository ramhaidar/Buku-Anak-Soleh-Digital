package com.abdimas.bukasol.service.impl;

import java.util.ArrayList;
import java.util.List;
import java.util.Optional;
import java.util.UUID;

import org.springframework.stereotype.Service;

import com.abdimas.bukasol.data.model.ReadActivity;
import com.abdimas.bukasol.data.model.Student;
import com.abdimas.bukasol.data.repository.ReadActivityRepository;
import com.abdimas.bukasol.dto.readActivity.ReadActivityDTO;
import com.abdimas.bukasol.dto.readActivity.ReadActivityInfoDTO;
import com.abdimas.bukasol.dto.readActivity.ReadActivitySaveDTO;
import com.abdimas.bukasol.dto.readActivity.ReadActivityTeacherShowDTO;
import com.abdimas.bukasol.exception.DuplicateEntityException;
import com.abdimas.bukasol.exception.MismatchException;
import com.abdimas.bukasol.exception.NoContentException;
import com.abdimas.bukasol.mapper.ReadActivityMapper;
import com.abdimas.bukasol.service.ReadActivityService;
import com.abdimas.bukasol.service.UserService;

import jakarta.persistence.EntityNotFoundException;
import lombok.AllArgsConstructor;

@Service
@AllArgsConstructor
public class ReadActivityServiceImpl implements ReadActivityService {

    private final ReadActivityRepository readActivityRepository;
    private final ReadActivityMapper readActivityMapper;

    private final UserService userService;

    @Override
    public ReadActivity findReadActivityById(UUID readActivityId) {
        return readActivityRepository.findById(readActivityId)
                .orElseThrow(() -> new EntityNotFoundException("Reading Activity Not Found"));
    }

    public List<ReadActivity> findAllReadActivityByStudentId(UUID studentId) {
        List<ReadActivity> readActivities = readActivityRepository.findAllByStudentId(studentId);

        if(readActivities.isEmpty()) {
            throw new NoContentException("There is No Reading Activity for The Student");
        }
        
        return readActivities;
    }

    @Override
    public ReadActivityDTO showReadActivityByReadActivityId(UUID readActivityId) {
        ReadActivity readActivity = findReadActivityById(readActivityId);
        
        return readActivityMapper.toReadActivityDTO(readActivity);
    }

    @Override
    public List<ReadActivityDTO> showAllReadActivityByStudentId(UUID studentId) {
        Student student = userService.findStudentById(studentId);

        List<ReadActivity> readActivities = findAllReadActivityByStudentId(student.getId());
        
        return readActivityMapper.toReadActivityDTOs(readActivities);
    }

    @Override
    public ReadActivityInfoDTO showAllReadActivityByClass(String className) {
        ReadActivityInfoDTO readActivityInfoDTO = new ReadActivityInfoDTO();
        List<ReadActivityTeacherShowDTO> readActivityTeacherShowDTOs = new ArrayList<>();

        List<Student> students = userService.findStudentByClassName(className);

        readActivityInfoDTO.setClassName(className);
        readActivityInfoDTO.setTeacherName(students.get(0).getTeacher().getUser().getName());
        
        for(Student student : students) {
            ReadActivityTeacherShowDTO readActivityTeacherShowDTO = new ReadActivityTeacherShowDTO();

            boolean teacherSign = false;
            boolean parentSign = false;

            long totalActivities = readActivityRepository.countByStudentId(student.getId());

            long teacherSignFalse = readActivityRepository.countTeacherSignFalseByStudentId(student.getId());

            long parentSignFalse = readActivityRepository.countParentSignFalseByStudentId(student.getId());

            if(teacherSignFalse == 0) {
                teacherSign = true;
            }

            if(parentSignFalse == 0) {
                parentSign = true;
            }

            readActivityTeacherShowDTO.setStudentId(student.getId());
            readActivityTeacherShowDTO.setStudentNisn(student.getNisn());
            readActivityTeacherShowDTO.setStudentName(student.getUser().getName());
            readActivityTeacherShowDTO.setTotalActivities(totalActivities);
            readActivityTeacherShowDTO.setTeacherSign(teacherSign);
            readActivityTeacherShowDTO.setParentSign(parentSign);

            readActivityTeacherShowDTOs.add(readActivityTeacherShowDTO);
        }

        readActivityInfoDTO.setReadActivities(readActivityTeacherShowDTOs);

        return readActivityInfoDTO;
    }

    @Override
    public ReadActivity createReadActivityStudent(ReadActivitySaveDTO readActivitySaveDTO) {
        Student student = userService.findStudentById(readActivitySaveDTO.getStudentId());

        Optional<ReadActivity> existingReadActivity = readActivityRepository.findByStudentIdAndTimeStampAndBookTitleAndPage(readActivitySaveDTO.getStudentId(), readActivitySaveDTO.getTimeStamp(), readActivitySaveDTO.getBookTitle(), readActivitySaveDTO.getPage());

        if(existingReadActivity.isPresent()) {
            throw new DuplicateEntityException("Read Activity for this Book, Page, same Date already exists");
        }

        ReadActivity readActivity = new ReadActivity();
        readActivity.setStudent(student);
        readActivity.setTimeStamp(readActivitySaveDTO.getTimeStamp());
        readActivity.setBookTitle(readActivitySaveDTO.getBookTitle());
        readActivity.setPage(readActivitySaveDTO.getPage());
        readActivity.setTeacherSign(false);
        readActivity.setParentSign(false);

        return readActivityRepository.save(readActivity);
    }

    @Override
    public String deleteReadActivityStudent(UUID readActivityId) {
        ReadActivity readActivity = findReadActivityById(readActivityId);

        readActivityRepository.delete(readActivity);

        return "Reading Activity '" + readActivity.getBookTitle() + " " + readActivity.getPage() + "' of Student '" + readActivity.getStudent().getUser().getName() + "' Successfully Deleted";
    }

    @Override
    public ReadActivityDTO teacherSignReadActivity(UUID readActivityId) {
        ReadActivity readActivity = findReadActivityById(readActivityId);

        readActivity.setTeacherSign(!readActivity.isTeacherSign());

        ReadActivity updatedReadActivity = readActivityRepository.save(readActivity);
        
        return readActivityMapper.toReadActivityDTO(updatedReadActivity);
    }

    @Override
    public ReadActivityDTO parentSignReadActivity(UUID readActivityId, String parentCode) {
        ReadActivity readActivity = findReadActivityById(readActivityId);
        Student student = userService.findStudentById(readActivity.getStudent().getId());

        if(student.getParentCode().equals(parentCode)) {
            readActivity.setParentSign(!readActivity.isParentSign());
        } else {
            throw new MismatchException("Wrong Parent Code");
        }

        ReadActivity updatedReadActivity = readActivityRepository.save(readActivity);
        
        return readActivityMapper.toReadActivityDTO(updatedReadActivity);
    }
}
