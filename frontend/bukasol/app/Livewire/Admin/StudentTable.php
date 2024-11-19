<?php

namespace App\Livewire\Admin;

use App\Models\Student;
use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cookie;

class StudentTable extends Component
{
    public function render ()
    {
        return view ( 'livewire.admin.student-table' );
    }

    public function fetchData ()
    {
        // Safely get the length and start, with default values if they're not set
        $length = request ( 'length' ) ?? 10; // Number of records per page
        $start  = request ( 'start' ) ?? 0; // Offset for pagination
        $search = request ( 'search' )[ 'value' ] ?? ''; // Search term, if provided

        $query = Student::query ();

        // Apply search filter if available
        if ( ! empty ( $search ) )
        {
            $query->where ( 'nisn', 'like', "%{$search}%" )
                ->orWhere ( 'class_name', 'like', "%{$search}%" )
                ->orWhereHas ( 'user', function ($q) use ($search)
                {
                    $q->where ( 'name', 'like', "%{$search}%" );
                } );
        }

        // Total records without filtering
        $totalData = Student::count ();
        // Total records after filtering
        $totalFiltered = $query->count ();

        // Get paginated results
        $students = $query->offset ( $start )->limit ( $length )->get ();

        // Map data for DataTables response
        $data = $students->map ( function ($student)
        {
            return [ 
                'nisn'       => $student->nisn,
                'name'       => $student->user->name ?? 'N/A',
                'class_name' => $student->class_name,
                'action'     => view ( 'livewire.admin.partials.student-table-actions', [ 'student' => $student ] )->render (),
            ];
        } );

        // Return JSON response
        return response ()->json ( [ 
            'draw'            => intval ( request ( 'draw' ) ), // Draw counter for DataTables
            'recordsTotal'    => $totalData,
            'recordsFiltered' => $totalFiltered,
            'data'            => $data,
        ] );
    }
}
