<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('student_name',40);
            $table->string('guardians_name',40);
            $table->string('email',100);
            $table->string('address');
            $table->enum('gender',["male", "female", "others"])->nullable();
            $table->enum('grade',["aa", "a+", "a", "b+", "b", "c", "failed"])->nullable();
            $table->integer('marks') ;
            $table->date('dob')->nullable();
            $table->string('phone_number');
            $table->string('token', 10)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');

    }
};
