package com.abdimas.bukasol.utils;

import java.util.Random;

import org.springframework.stereotype.Component;

@Component
public class RandomCodeGenerator {

    public String generateNumericCode() {
        Random random = new Random();
        StringBuilder code = new StringBuilder();

        for(int i = 0; i < 5; i++) {
            code.append(random.nextInt(10));
        }

        return code.toString();
    }

    public String generatePassword(String name, String number) {
        String letters = name.split(" ")[0].toLowerCase();
        String numbers = number.substring(number.length() - 4);

        String combinedPass = letters + numbers;

        return combinedPass;
    }
}
