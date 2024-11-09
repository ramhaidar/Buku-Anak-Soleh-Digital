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
        Schema::create ( 'juz', function (Blueprint $table)
        {
            $table->integer ( 'id' )->primary ();
            $table->uuid ( 'student_id' );
            $table->date ( 'time_stamp' );
            $table->integer ( 'juz_number' );
            $table->string ( 'surah_name' );
            $table->string ( 'surah_ayat' );
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
        Schema::dropIfExists ( 'juz' );
    }
};
