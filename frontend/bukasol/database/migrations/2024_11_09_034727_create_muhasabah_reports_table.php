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
        Schema::create ( 'muhasabah_reports', function (Blueprint $table)
        {
            $table->id ();
            $table->unsignedBigInteger ( 'student_id' );
            $table->date ( 'time_stamp' );
            $table->string ( 'surah_name' );
            $table->string ( 'surah_ayat' );
            $table->boolean ( 'sunnah_pray' )->default ( false );
            $table->boolean ( 'subuh_pray' )->default ( false );
            $table->boolean ( 'dzuhur_pray' )->default ( false );
            $table->boolean ( 'ashar_pray' )->default ( false );
            $table->boolean ( 'maghrib_pray' )->default ( false );
            $table->boolean ( 'isya_pray' )->default ( false );
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
        Schema::dropIfExists ( 'muhasabah_reports' );
    }
};
