package com.abdimas.bukasol.mapper;

import java.util.List;

import org.mapstruct.Mapper;
import org.mapstruct.Mapping;
import org.mapstruct.factory.Mappers;

import com.abdimas.bukasol.data.model.User;
import com.abdimas.bukasol.dto.UserDTO;

@Mapper(componentModel = "spring")
public interface UserMapper {

    UserMapper INSTANCE = Mappers.getMapper(UserMapper.class);

    @Mapping(target="student", ignore=true)
    @Mapping(target="teacher", ignore=true)
    User toUser(UserDTO userDTO);

    UserDTO toUserDTO(User user);

    List<UserDTO> toUserDTOList(List<User> users);
}
