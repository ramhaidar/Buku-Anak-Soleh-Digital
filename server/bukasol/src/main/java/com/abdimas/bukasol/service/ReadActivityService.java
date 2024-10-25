package com.abdimas.bukasol.service;

import java.util.List;
import java.util.UUID;

import com.abdimas.bukasol.data.model.ReadActivity;
import com.abdimas.bukasol.dto.readActivity.ReadActivityDTO;
import com.abdimas.bukasol.dto.readActivity.ReadActivityInfoDTO;
import com.abdimas.bukasol.dto.readActivity.ReadActivitySaveDTO;

public interface ReadActivityService {
    List<ReadActivityDTO> showAllReadActivityByStudentId(UUID studentId);

    ReadActivityInfoDTO showAllReadActivityByClass(String className);

    ReadActivity findReadActivityById(UUID readActivityId);

    ReadActivityDTO showReadActivityByReadActivityId(UUID readActivityId);

    ReadActivity createReadActivityStudent(ReadActivitySaveDTO readActivitySaveDTO);

    String deleteReadActivityStudent(UUID readActivityId);

    ReadActivityDTO teacherSignReadActivity(UUID readActivityId);
    ReadActivityDTO parentSignReadActivity(UUID readActivityId, String parentCode);
}
