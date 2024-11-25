<?php

namespace App\Http\Controllers;

use App\Models\Juz;
use App\Models\Student;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class StudentJuzReportController extends Controller
{
    public function index_table( $juzNumber )
    {
        $student = auth ()->user ()->student;
        $studentId = $student->id;

        return view ( 'student.laporan-bacaan-juz', [ 
            'role' => auth ()->user ()->role,
            'name' => auth ()->user ()->name,
            'studentId' => $studentId,
            'juzNumber' => $juzNumber,

            'page' => 'Laporan Juz Siswa Table'
        ] );
    }

    public function index_add_report( $juzNumber )
    {
        $student = auth ()->user ()->student;
        $studentId = $student->id;

        $studentFind = Student::find($studentId);
        $studentName = $studentFind->user->name;

        $today = now()->toDateString();

        return view ( 'student.add-laporan-bacaan-juz', [ 
            'role' => auth ()->user ()->role,
            'name' => auth ()->user ()->name,
            'studentId' => $studentId,
            'studentName' => $studentName,
            'juzNumber' => $juzNumber,
            'today' => $today,

            'page' => 'Tambah Laporan Bacaan Juz Siswa'
        ] );
    }

    public function fetchData_laporan_juz_by_id_siswa( Request $request )
    {
        // Safely get the length and start for pagination
        $length = $request->input('length', 10); // Number of records per page
        $start = $request->input('start', 0); // Offset for pagination
        $search = $request->input('search.value', ''); // Search term, if provided
        
        $student = auth ()->user ()->student;
        $studentId = $student->id;

        $juzNumber = $request->route('juzNumber');

        // Base query to fetch prayer grades for the given student
        $query = Juz::where('student_id', $studentId)
                    ->where('juz_number', $juzNumber);

         // Apply search filter if available
        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('surah_name', 'like', "%{$search}%")
                ->where('surah_ayat', 'like', "%{$search}%");
            });
        }

        // Total records without filtering
        $totalData = Juz::where('student_id', $studentId)
                        ->where('juz_number', $juzNumber)
                        ->count();

        // Total records after filtering
        $totalFiltered = $query->count();

        // Get paginated results
        $juzReports = $query->offset($start)->limit($length)->get();

        $data = $juzReports->map(function ($juzReport) {
            return [
                'id' => $juzReport->id,
                'timeStamp' => $juzReport->time_stamp,
                'surahName' => $juzReport->surah_name,
                'surahAyat' => $juzReport->surah_ayat,
                'parentSign' => $juzReport->teacher_sign,
            ];
        });

        // Return JSON response for DataTables
        return response()->json([
            'draw' => intval($request->input('draw')),
            'recordsTotal' => $totalData,
            'recordsFiltered' => $totalFiltered,
            'data' => $data
        ]);
    }

    public function store_juz_report( Request $request )
    {
        $validatedData = $request->validate([
            'studentId' => 'required|exists:students,id',
            'juz' => 'required|integer',
            'tanggal' => 'required|date',
            'surah' => 'required|string|max:255',
            'ayat' => 'required|string|max:255',
        ]);

        $existingReport = Juz::where('student_id', $validatedData['studentId'])
            ->whereDate('time_stamp', $validatedData['tanggal'])
            ->where('juz_number', $validatedData['juz'])
            ->where('surah_name', $validatedData['tanggal'])
            ->where('surah_ayat', $validatedData['tanggal'])
            ->first();

        if ($existingReport) {
            return redirect ()->back ()->with ( 'error', 'Data Tersebut sudah Dibuat.' );
        }

        Juz::create ( [
            'student_id' => $validatedData[ 'studentId' ],
            'time_stamp' => $validatedData[ 'tanggal' ],
            'juz_number' => $validatedData[ 'juz' ],
            'surah_name' => $validatedData[ 'surah' ],
            'surah_ayat' => $validatedData[ 'ayat' ],
            'teacher_sign' => false,
        ] );

        return redirect()->route('student.laporan-juz-siswa-table.index' ,[ 'juzNumber' => $validatedData[ 'juz' ] ])
            ->with('success', 'Sukses Menambahkan Data Laporan Baru.');
    }
    
    public function delete_juz_report( Request $request, $reportId )
    {
        $juzReport = Juz::findOrFail ( $reportId );

        $juzReport->delete ();

        return response ()->json ( [ 'success' => 'Data Siswa Berhasil Dihapus.' ] );
    }

    public function parent_sign_juz_report( Request $request, $reportId )
    {
        $validated = $request->validate([
            'parentCode' => 'required|string'
        ]);

        $student = auth ()->user ()->student;
        $parentCode = $student->parent_code;

        if ($validated['parentCode'] !== $parentCode) {
            return response()->json([ 'error' => 'Kode Unik Salah.']);
        }

        $juzReport = Juz::findOrFail ( $reportId );
        $juzReport->teacher_sign = ! $juzReport->teacher_sign;
        $juzReport->save ();

        if ( $juzReport->teacher_sign ) {
            return response ()->json ( [ 'success' => 'Data Sudah Ditandatangani.' ] );
        }

        return response ()->json ( [ 'success' => 'Data Tidak Jadi Ditandatangani.' ] );
    }
}
