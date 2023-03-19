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
        Schema::table('admins', function (Blueprint $table) {
            $table->string('address');
            $table->enum('gender',["male", "female", "others"])->nullable();
            $table->date('dob')->nullable();
            $table->string('image')->nullable();
            $table->string('token', 10)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('admins', function (Blueprint $table) {
            $table->dropColumn('token');
            $table->dropColumn('image');
            $table->dropColumn('dob');
            $table->dropColumn('gender');
            $table->dropColumn('address');
        });
    }
};
