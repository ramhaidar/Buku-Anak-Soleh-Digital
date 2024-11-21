<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up () : void
    {
        Schema::create ( 'prayer_grades', function (Blueprint $table)
        {
            $table->id ();
            $table->unsignedBigInteger ( 'student_id' );
            $table->date ( 'time_stamp' );
            $table->string ( 'motion_category' );
            $table->double ( 'grade_semester1' );
            $table->double ( 'grade_semester2' );
            $table->boolean ( 'teacher_sign' )->default ( false );
            $table->boolean ( 'parent_sign' )->default ( false );
            $table->timestamps ();

            $table->foreign ( 'student_id' )->references ( 'id' )->on ( 'students' )->onDelete ( 'cascade' );
        } );
    }

    /**
     * Reverse the migrations.
     */
    public function down () : void
    {
        Schema::dropIfExists ( 'prayer_grades' );
    }
};
