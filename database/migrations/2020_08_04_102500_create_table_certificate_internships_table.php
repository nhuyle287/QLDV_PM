<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCertificateInternshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certificate_internships', function (Blueprint $table) {
            $table->integer('internship_id')->unsigned();
           // $table->foreign('internship_id')->references('internship_id')->on('internships');
            $table->integer('certificate_id')->unsigned();
          //  $table->foreign('certificate_id')->references('certificate_id')->on('certificates');
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
        Schema::dropIfExists('certificate_internships');
    }
}
