<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lembar Pelanggaran - {{ $student->user->name }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
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
        hr {
            border: 1px solid #000;
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <h2 style="text-align: center;">LEMBAR PELANGGARAN</h2>
    
    <hr>

    <p>Nama Siswa : <span>{{ $student->user->name }}</span></p>
    <p>Nama Kelas : <span>{{ $student->class_name }}</span></p>
    <p>Nama Wali Kelas : <span>{{ $student->teacher->user->name }}</span></p>

    <hr>

    <table >
        <tr>
            <th>No</th>
            <th>Hari/Tanggal</th>
            <th>Pelanggaran</th>
            <th>Konsekuensi</th>
            <th>Paraf Guru</th>
        </tr>
        @foreach ($violationReports as $index => $report)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $report->time_stamp->toDateString() }}</td>
            <td>{{ $report->violation_details }}</td>
            <td>{{ $report->consequence }}</td>
            <td>{{ $report->teacher_sign ? 'Sudah' : 'Belum' }}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>