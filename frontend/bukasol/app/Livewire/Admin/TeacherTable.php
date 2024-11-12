<?php
namespace App\Livewire\Admin;

use App\Models\Teacher;
use Livewire\Component;

class TeacherTable extends Component
{
    public function render ()
    {
        return view ( 'livewire.admin.teacher-table' );
    }

    public function fetchData ()
    {
        // Safely get the length and start, with default values if they're not set
        $length = request ( 'length' ) ?? 10; // Number of records per page
        $start  = request ( 'start' ) ?? 0; // Offset for pagination
        $search = request ( 'search' )[ 'value' ] ?? ''; // Search term, if provided

        $query = Teacher::query ();

        // Apply search filter if available
        if ( ! empty ( $search ) )
        {
            $query->where ( 'nip', 'like', "%{$search}%" )
                ->orWhere ( 'class_name', 'like', "%{$search}%" )
                ->orWhereHas ( 'user', function ($q) use ($search)
                {
                    $q->where ( 'name', 'like', "%{$search}%" );
                } );
        }

        // Total records without filtering
        $totalData = Teacher::count ();
        // Total records after filtering
        $totalFiltered = $query->count ();

        // Get paginated results
        $teachers = $query->offset ( $start )->limit ( $length )->get ();

        // Map data for DataTables response
        $data = $teachers->map ( function ($teacher)
        {
            return [ 
                'nip'        => $teacher->nip,
                'name'       => $teacher->user->name ?? 'N/A',
                'class_name' => $teacher->class_name,
                'action'     => view ( 'livewire.admin.partials.teacher-table-actions', [ 'teacher' => $teacher ] )->render (),
                // 'action'     => "<div class='row'><div class='col-sm col-auto'><a class='btn btn-link' href='#'>Detail</a></div><div class='col-sm col-auto'><a class='btn btn-link' href='#'>Delete</a></div></div>",
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
