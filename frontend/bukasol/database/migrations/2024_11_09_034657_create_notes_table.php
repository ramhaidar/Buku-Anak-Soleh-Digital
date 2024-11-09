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
        Schema::create ( 'notes', function (Blueprint $table)
        {
            $table->uuid ( 'id' )->primary ();
            $table->uuid ( 'student_id' );
            $table->date ( 'time_stamp' );
            $table->string ( 'agenda' );
            $table->string ( 'content' );
            $table->string ( 'parent_question' )->nullable ();
            $table->string ( 'teacher_answer' )->nullable ();
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
        Schema::dropIfExists ( 'notes' );
    }
};
