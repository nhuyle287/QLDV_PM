<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Internships extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('internships', function (Blueprint $table) {
            $table->increments('internship_id');
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->string('image')->nullable();
            $table->string('phone')->nullable();
            $table->string('gender')->nullable();
            $table->string('phone_family')->nullable();
            $table->string('name_family')->nullable();
            $table->date('birthday')->nullable();
            $table->date('start_date')->nullable();
            $table->string('cmnd')->nullable();
            $table->string('addresscurrent')->nullable();
            $table->string('issued_by')->nullable();
            $table->string('position')->nullable();
            $table->integer('status')->nullable();
            $table->date('range_date')->nullable();
            $table->date('date_create')->nullable();
            $table->date('end_date')->nullable();
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
        Schema::dropIfExists('internships');
    }
}
