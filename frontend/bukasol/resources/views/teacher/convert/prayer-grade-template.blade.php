<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grade Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        .tanggal {
            text-align: right;
        }
    </style>
</head>
<body>
    <h2>LEMBAR UJI GERAKAN WUDHU, TAYAMUM, DAN SHALAT</h2>
    <p>Nama Siswa: <span>{{ $student['user']['name'] }}</span></p>
    <p>Nama Kelas: <span>{{ $student['class_name'] }}</span></p>

    <table>
        <tr>
            <th>No</th>
            <th>Jenis Bacaan</th>
            <th>Nilai Semester 1</th>
            <th>Nilai Semester 2</th>
            <th>Paraf Guru</th>
            <th>Paraf Orang Tua</th>
        </tr>
        @foreach ($prayerGrades as $index => $grade)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $grade['motion_category'] }}</td>
            <td>{{ $grade['grade_semester1'] }}</td>
            <td>{{ $grade['grade_semester2'] }}</td>
            <td>{{ $grade['teacher_sign'] ? 'Sudah' : 'Belum' }}</td>
            <td>{{ $grade['parent_sign'] ? 'Sudah' : 'Belum' }}</td>
        </tr>
        @endforeach
    </table>

    <p>Nilai Rata-Rata Semester 1 : 
        <span>
            {{ count($prayerGrades) > 0 ? number_format(collect($prayerGrades)->avg('grade_semester1'), 2) : '0.00' }}
        </span>
    </p>
    <p>Nilai Rata-Rata Semester 2 : 
        <span>
            {{ count($prayerGrades) > 0 ? number_format(collect($prayerGrades)->avg('grade_semester2'), 2) : '0.00' }}
        </span>
    </p>

    <p class="tanggal">Bandung, <span>{{ $dateToday }}</span></p>

    <table style="width: 100%; border: none;">
        <tr>
            <td style="width: 50%; border: none;">
                <p style="text-align: center;">Nama Orang tua : <span>{{ $student['parent_name'] }}</span></p>
            </td>
            <td style="width: 50%; border: none;">
                <p style="text-align: center;">Nama Guru : <span>{{ $student['teacher']['user']['name'] }}</span></p>
            </td>
        </tr>
        <tr>
            <td style="width: 50%; border: none;">
                <p style="text-align: center;">Paraf : <span>{{ $parentSign }}</span></p>
            </td>
            <td style="width: 50%; border: none;">
                <p style="text-align: center;">Paraf : <span>{{ $teacherSign }}</span></p>
            </td>
        </tr>
    </table>
</body>
</html>
