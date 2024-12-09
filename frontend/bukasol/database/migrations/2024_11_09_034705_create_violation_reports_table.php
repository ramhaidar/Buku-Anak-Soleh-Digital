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
        Schema::create ( 'violation_reports', function (Blueprint $table)
        {
            $table->id ();
            $table->unsignedBigInteger ( 'student_id' );
            $table->date ( 'time_stamp' );
            $table->text ( 'violation_details' );
            $table->text ( 'consequence' );
            $table->boolean ( 'teacher_sign' )->default ( false );
            $table->timestamps ();

            $table->foreign ( 'student_id' )->references ( 'id' )->on ( 'students' )->onDelete ( 'cascade' );
        } );
    }

    /**
     * Reverse the migrations.
     */
    public function down () : void
    {
        Schema::dropIfExists ( 'violation_reports' );
    }
};
