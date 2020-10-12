<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAcademicInternshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academic_internships', function (Blueprint $table) {
            $table->integer('internship_id')->unsigned();
          //  $table->foreign('internship_id')->references('internship_id')->on('internships');
            $table->integer('academic_id')->unsigned();
          //  $table->foreign('academic_id')->references('academic_id')->on('academic_levels');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('academic_internships');
    }
}
