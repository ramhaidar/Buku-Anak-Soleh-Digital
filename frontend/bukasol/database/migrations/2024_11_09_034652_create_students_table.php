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
        Schema::create ( 'students', function (Blueprint $table)
        {
            $table->id ();
            $table->unsignedBigInteger ( 'user_id' )->unique ();
            $table->unsignedBigInteger ( 'teacher_id' );
            $table->string ( 'nisn' )->unique ();
            $table->string ( 'class_name' );
            $table->string ( 'parent_name' );
            $table->string ( 'parent_code' );
            $table->timestamps ();

            $table->foreign ( 'user_id' )->references ( 'id' )->on ( 'users' )->onDelete ( 'cascade' );
            $table->foreign ( 'teacher_id' )->references ( 'id' )->on ( 'teachers' )->onDelete ( 'cascade' );
        } );
    }

    /**
     * Reverse the migrations.
     */
    public function down () : void
    {
        Schema::dropIfExists ( 'students' );
    }
};
