package com.abdimas.bukasol.exception;

public class AuthenticationInvalidException extends RuntimeException {
    public AuthenticationInvalidException(String message) {
        super(message);
    }
}
