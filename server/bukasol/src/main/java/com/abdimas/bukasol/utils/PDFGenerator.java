package com.abdimas.bukasol.utils;

import java.io.ByteArrayOutputStream;
import java.io.IOException;
import java.time.LocalDate;
import java.util.List;

import org.springframework.stereotype.Component;
import org.thymeleaf.context.Context;
import org.thymeleaf.spring6.SpringTemplateEngine;

import com.abdimas.bukasol.dto.prayerGrade.PrayerGradeDTO;
import com.itextpdf.html2pdf.HtmlConverter;

import lombok.AllArgsConstructor;

@Component
@AllArgsConstructor
public class PDFGenerator {

    private final SpringTemplateEngine templateEngine;

    public byte[] generateGradeReport(List<PrayerGradeDTO> prayerGradeStudent) throws IOException {
        ByteArrayOutputStream stream = new ByteArrayOutputStream();

        Context context = new Context();
        context.setVariable("prayerGrade", prayerGradeStudent);
        context.setVariable("prayerGradeInfo", prayerGradeStudent.get(0));
        context.setVariable("dateToday", LocalDate.now());

        String htmlPage = templateEngine.process("grade-template", context);

        HtmlConverter.convertToPdf(htmlPage, stream);
            
        return stream.toByteArray();
    }
}
