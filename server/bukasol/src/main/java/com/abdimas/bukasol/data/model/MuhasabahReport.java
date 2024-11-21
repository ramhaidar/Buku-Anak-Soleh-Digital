package com.abdimas.bukasol.data.model;

import java.time.LocalDate;
import java.util.UUID;

import jakarta.persistence.Column;
import jakarta.persistence.Entity;
import jakarta.persistence.FetchType;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;
import jakarta.persistence.JoinColumn;
import jakarta.persistence.ManyToOne;
import jakarta.persistence.Table;
import lombok.AllArgsConstructor;
import lombok.Getter;
import lombok.NoArgsConstructor;
import lombok.Setter;

@Entity
@Setter
@Getter
@NoArgsConstructor
@AllArgsConstructor
@Table(name = "muhasabah_report")
public class MuhasabahReport {

    @Id
    @Column(name = "ID", columnDefinition = "BINARY(16)", updatable = false, nullable = false)
    @GeneratedValue(strategy = GenerationType.UUID)
    private UUID id;

    @Column(nullable = false)
    private LocalDate timeStamp;

    @Column(nullable = true)
    private String surahName;

    @Column(nullable = true)
    private String surahAyat;

    @Column(nullable = false)
    private boolean sunnahPray;

    @Column(nullable = false)
    private boolean subuhPray;

    @Column(nullable = false)
    private boolean dzuhurPray;

    @Column(nullable = false)
    private boolean asharPray;

    @Column(nullable = false)
    private boolean maghribPray;

    @Column(nullable = false)
    private boolean isyaPray;

    @Column(nullable = false)
    private boolean teacherSign;

    @Column(nullable = false)
    private boolean parentSign;

    @ManyToOne(fetch = FetchType.LAZY)
    @JoinColumn(name = "student_id", nullable = false)
    private Student student;
}
