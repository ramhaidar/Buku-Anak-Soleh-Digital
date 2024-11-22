<?php

namespace App\Http\Controllers;

use App\Models\PrayerGrade;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class GradeController extends Controller
{
    public function getAllPrayerGradeByClassName( $className = null) {
        $teacher = auth()->user()->teacher;
        $teacherClassName = $teacher->class_name;

        if( $className == null || $teacherClassName != $className ) {
            return redirect ()->route ( 'teacher.nilai-uji-gerakan-siswa-table.index', ['className' => $teacherClassName]);
        }

        $students = Student::where('class_name', $className)->with('user', 'teacher.user')->get();

        if ($students->isEmpty()) {
            return response()->json(['data' => []], 200);
        }

        $prayerGrades = $students->map(function ($student) {
            $prayerGrade = PrayerGrade::where('student_id', $student->id)->get();
    
            $avgSemester1 = $prayerGrade->avg('grade_semester1') ?? 0.0;
            $avgSemester2 = $prayerGrade->avg('grade_semester2') ?? 0.0;
    
            $teacherSignFalseCount = $prayerGrade->where('teacher_sign', false)->count();
            $parentSignFalseCount = $prayerGrade->where('parent_sign', false)->count();
    
            return [
                'studentNisn' => $student->nisn,
                'studentName' => $student->user->name,
                'avgSemester1' => $avgSemester1,
                'avgSemester2' => $avgSemester2,
                'parentSign' => $parentSignFalseCount === 0 ? 'Sudah' : 'Belum',
                'teacherSign' => $teacherSignFalseCount === 0 ? 'Sudah' : 'Belum',
                // 'action' => view('partials.action-buttons', ['studentId' => $student->id])->render(),
            ];
        });

        return response()->json([
            'draw'            => intval ( request ( 'draw' ) ), // Draw counter for DataTables
            'recordsTotal'    => 1,
            'recordsFiltered' => 1,    
            'data' => $prayerGrades
        ]);

        // $prayerGradeInfoDTO = [
        //     'className' => $className,
        //     'teacherName' => $students->first()->teacher->user->name ?? null,
        //     'prayerGrades' => [],
        // ];

        // foreach ($students as $student) {
        //     $prayerGrades = PrayerGrade::where('student_id', $student->id)->get();

        //     // Calculate averages for semesters
        //     $avgSemester1 = $prayerGrades->avg('grade_semester1') ?? 0.0;
        //     $avgSemester2 = $prayerGrades->avg('grade_semester2') ?? 0.0;

        //     // Check teacher and parent sign statuses
        //     $teacherSignFalseCount = PrayerGrade::where('student_id', $student->id)->where('teacher_sign', false)->count();
        //     $parentSignFalseCount = PrayerGrade::where('student_id', $student->id)->where('parent_sign', false)->count();

        //     $prayerGradeTeacherShowDTO = [
        //         'studentId' => $student->id,
        //         'studentNisn' => $student->nisn,
        //         'studentName' => $student->user->name,
        //         'avgSemester1' => $avgSemester1,
        //         'avgSemester2' => $avgSemester2,
        //         'teacherSign' => $teacherSignFalseCount === 0,
        //         'parentSign' => $parentSignFalseCount === 0,
        //     ];

        //     $prayerGradeInfoDTO['prayerGrades'][] = $prayerGradeTeacherShowDTO;
        // }

        // return response()->json($prayerGradeInfoDTO, 200);
    }
    
    public function getAllPrayerGradeByStudentId( $studentId ) {

        $prayerGrades = PrayerGrade::where('student_id', $studentId)->get();

        if ($prayerGrades->isEmpty()) {
            return response()->json(['message' => 'There are no prayer grades for this student'], 204);
        }

        $prayerGradeDTOs = $prayerGrades->map(function ($prayerGrade) {
            return [
                'id' => $prayerGrade->id,
                'student_id' => $prayerGrade->student_id,
                'time_stamp' => $prayerGrade->time_stamp,
                'motion_category' => $prayerGrade->motion_category,
                'grade_semester1' => $prayerGrade->grade_semester1,
                'grade_semester2' => $prayerGrade->grade_semester2,
                'teacher_sign' => $prayerGrade->teacher_sign,
                'parent_sign' => $prayerGrade->parent_sign,
            ];
        });

        return response()->json($prayerGradeDTOs, 200);
    }

    public function getPrayerGradeByGradeId( $gradeId ) {

        $prayerGrade = PrayerGrade::findOrFail($gradeId);

        $response = [
            'id' => $prayerGrade->id,
            'student_id' => $prayerGrade->student_id,
            'time_stamp' => $prayerGrade->time_stamp,
            'motion_category' => $prayerGrade->motion_category,
            'grade_semester1' => $prayerGrade->grade_semester1,
            'grade_semester2' => $prayerGrade->grade_semester2,
            'teacher_sign' => $prayerGrade->teacher_sign,
            'parent_sign' => $prayerGrade->parent_sign,
            'student_id' => $prayerGrade->student_id
        ];

        return response()->json($response, 200);
    }

    public function createPrayerGrade( Request $request ) {
        $validator = Validator::make($request->all(), [
            'student_id' => 'required|exists:students,id',
            'motion_category' => 'required|string|max:255',
            'grade_semester1' => 'required|numeric|min:0|max:100',
            'grade_semester2' => 'required|numeric|min:0|max:100',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $validatedData = $validator->validated();

        $existingGrade = PrayerGrade::where('student_id', $validatedData['student_id'])
            ->where('motion_category', $validatedData['motion_category'])
            ->first();

        if ($existingGrade) {
            return response()->json([
                'message' => 'Prayer grade for this motion category already exists for the student.'
            ], 409);
        }

        // Create a new Prayer Grade
        $prayerGrade = new PrayerGrade();
        $prayerGrade->student_id = $validatedData['student_id'];
        $prayerGrade->motion_category = $validatedData['motion_category'];
        $prayerGrade->grade_semester1 = $validatedData['grade_semester1'];
        $prayerGrade->grade_semester2 = $validatedData['grade_semester2'];
        $prayerGrade->timestamp = now();
        $prayerGrade->teacher_sign = false;
        $prayerGrade->parent_sign = false;
        $prayerGrade->save();

        // Build the response message
        $studentName = $prayerGrade->student->user->name; // Assuming relationships exist
        $responseMessage = "Prayer Grade '{$prayerGrade->motion_category}' of Student '{$studentName}' Successfully Created";

        return response()->json([
            'message' => $responseMessage
        ], 201);
    }

    public function updatePrayerGrade( Request $request, $studentId ) {
        $validator = Validator::make($request->all(), [
            'motion_category' => 'required|string|max:255',
            'grade_semester1' => 'required|numeric|min:0|max:100',
            'grade_semester2' => 'required|numeric|min:0|max:100',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $validatedData = $validator->validated();

        // Find the PrayerGrade by ID
        $prayerGrade = PrayerGrade::findOrFail($id);

        // Check for existing PrayerGrade with the same student and motion category
        $existingGrade = PrayerGrade::where('student_id', $prayerGrade->student_id)
            ->where('motion_category', $validatedData['motion_category'])
            ->where('id', '!=', $studentId)
            ->first();

        if ($existingGrade) {
            return response()->json([
                'message' => 'Prayer grade for this motion category already exists for the student.'
            ], 409); // 409 Conflict
        }

        // Update the PrayerGrade
        $prayerGrade->motion_category = $validatedData['motion_category'];
        $prayerGrade->grade_semester1 = $validatedData['grade_semester1'];
        $prayerGrade->grade_semester2 = $validatedData['grade_semester2'];
        $prayerGrade->save();

        $response = [
            'id' => $prayerGrade->id,
            'student_id' => $prayerGrade->student_id,
            'motion_category' => $prayerGrade->motion_category,
            'grade_semester1' => $prayerGrade->grade_semester1,
            'grade_semester2' => $prayerGrade->grade_semester2
        ];

        return response()->json($response, 200);
    }

    public function deletePrayerGrade( $gradeId ) {

        $prayerGrade = PrayerGrade::findOrFail($gradeId);

        $motionCategory = $prayerGrade->motion_category;
        $studentName = $prayerGrade->student->user->name;

        $prayerGrade->delete();

        // Prepare response message
        $message = "Prayer Grade '{$motionCategory}' of Student '{$studentName}' Successfully Deleted";

        return response()->json(['message' => $message], 200);
    }

    public function teacherSignPrayerGrade( $gradeId ) {

        $prayerGrade = PrayerGrade::findOrFail($gradeId);

        $prayerGrade->teacher_sign = !$prayerGrade->teacher_sign;

        $prayerGrade->save();

        $response = [
            'id' => $prayerGrade->id,
            'student_id' => $prayerGrade->student_id,
            'time_stamp' => $prayerGrade->time_stamp,
            'motion_category' => $prayerGrade->motion_category,
            'grade_semester1' => $prayerGrade->grade_semester1,
            'grade_semester2' => $prayerGrade->grade_semester2,
            'teacher_sign' => $prayerGrade->teacher_sign,
            'parent_sign' => $prayerGrade->parent_sign
        ];

        return response()->json($response, 200);
    }

    public function parentSignPrayerGrade( $gradeId , Request $request ) {
        
        $request->validate([
            'parent_code' => 'required|string',
        ]);

        $prayerGrade = PrayerGrade::findOrFail($gradeId);

        $student = $prayerGrade->student;

        if ($student->parent_code === $request->input('parent_code')) {
            // Toggle the parent_sign field
            $prayerGrade->parent_sign = !$prayerGrade->parent_sign;

            // Save the updated PrayerGrade
            $prayerGrade->save();

            $response = [
                'id' => $prayerGrade->id,
                'student_id' => $prayerGrade->student_id,
                'time_stamp' => $prayerGrade->time_stamp,
                'motion_category' => $prayerGrade->motion_category,
                'grade_semester1' => $prayerGrade->grade_semester1,
                'grade_semester2' => $prayerGrade->grade_semester2,
                'teacher_sign' => $prayerGrade->teacher_sign,
                'parent_sign' => $prayerGrade->parent_sign,
            ];

            return response()->json($response, 200);
        } else {
            return response()->json([
                'message' => 'Wrong Parent Code'
            ], 403);
        }
    }

    public function getGradeReportPdf( $gradeId ) {

    }
}
