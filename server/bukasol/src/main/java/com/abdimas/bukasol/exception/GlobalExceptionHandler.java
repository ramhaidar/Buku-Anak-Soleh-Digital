package com.abdimas.bukasol.exception;

import java.util.HashMap;
import java.util.Map;

import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.validation.FieldError;
import org.springframework.web.bind.MethodArgumentNotValidException;
import org.springframework.web.bind.annotation.ControllerAdvice;
import org.springframework.web.bind.annotation.ExceptionHandler;

@ControllerAdvice
public class GlobalExceptionHandler {

    private static final String MESSAGE_KEY = "message";


    // Handle validation errors (e.g., @NotBlank, @NotNull)
    @ExceptionHandler(MethodArgumentNotValidException.class)
    public ResponseEntity<Map<String, String>> handleValidationExceptions(MethodArgumentNotValidException ex) {
        Map<String, String> errors = new HashMap<>();
        ex.getBindingResult().getAllErrors().forEach((error) -> {
            String fieldName = ((FieldError) error).getField();
            String errorMessage = error.getDefaultMessage();
            errors.put(fieldName, errorMessage);
        });

        return new ResponseEntity<>(errors, HttpStatus.BAD_REQUEST);
    }

    // Handle Authentication Invalid
    @ExceptionHandler(AuthenticationInvalidException.class)
    public ResponseEntity<Map<String, String>> handleAuthenticationInvalidException(AuthenticationInvalidException ex) {
        Map<String, String> errorResponse = new HashMap<>();
        errorResponse.put(MESSAGE_KEY, ex.getMessage());

        return new ResponseEntity<>(errorResponse, HttpStatus.UNAUTHORIZED);
    }

    // Handle Duplicate Entity Data
    @ExceptionHandler(DuplicateEntityException.class)
    public ResponseEntity<Map<String, String>> handleDuplicateException(DuplicateEntityException ex) {
        Map<String, String> errorResponse = new HashMap<>();
        errorResponse.put(MESSAGE_KEY, ex.getMessage());

        return new ResponseEntity<>(errorResponse, HttpStatus.CONFLICT);
    }

    // Handle Duplicate Entity Data
    @ExceptionHandler(EntityNotFoundException.class)
    public ResponseEntity<Map<String, String>> handleEntityNotFoundException(EntityNotFoundException ex) {
        Map<String, String> errorResponse = new HashMap<>();
        errorResponse.put(MESSAGE_KEY, ex.getMessage());

        return new ResponseEntity<>(errorResponse, HttpStatus.NOT_FOUND);
    }

    // Handle Mismatch
    @ExceptionHandler(MismatchException.class)
    public ResponseEntity<Map<String, String>> handleMismatchException(MismatchException ex) {
        Map<String, String> errorResponse = new HashMap<>();
        errorResponse.put(MESSAGE_KEY, ex.getMessage());

        return new ResponseEntity<>(errorResponse, HttpStatus.BAD_REQUEST);
    }

    // Handle No Content
    @ExceptionHandler(NoContentException.class)
    public ResponseEntity<Map<String, String>> handleNoContentException(NoContentException ex) {
        Map<String, String> errorResponse = new HashMap<>();
        errorResponse.put(MESSAGE_KEY, ex.getMessage());

        return new ResponseEntity<>(errorResponse, HttpStatus.NO_CONTENT);
    }

    // Handle any other exceptions
    @ExceptionHandler(Exception.class)
    public ResponseEntity<Map<String, String>> handleGlobalException(Exception ex) {
        Map<String, String> errorResponse = new HashMap<>();
        errorResponse.put(MESSAGE_KEY, ex.getMessage());

        return new ResponseEntity<>(errorResponse, HttpStatus.INTERNAL_SERVER_ERROR);
    }
}
