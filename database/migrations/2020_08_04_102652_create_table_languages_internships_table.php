<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableLanguagesInternshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('languages_internships', function (Blueprint $table) {
            $table->integer('internship_id')->unsigned();
          //  $table->foreign('internship_id')->references('internship_id')->on('internships');
            $table->integer('languages_id')->unsigned();
        //    $table->foreign('languages_id')->references('languages_id')->on('languages');
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
        Schema::dropIfExists('languages_internships');
    }
}
