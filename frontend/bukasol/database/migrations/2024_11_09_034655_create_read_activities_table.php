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
        Schema::create ( 'read_activities', function (Blueprint $table)
        {
            $table->integer ( 'id' )->primary ();
            $table->integer ( 'student_id' );
            $table->date ( 'time_stamp' );
            $table->string ( 'book_title' );
            $table->string ( 'page' );
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
        Schema::dropIfExists ( 'read_activities' );
    }
};
