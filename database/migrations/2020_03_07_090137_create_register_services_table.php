<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegisterServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('register_services', function (Blueprint $table) {
            $table->increments('id');


            $table->string('service_name')->nullable();
            $table->dateTime('start_date')->nullable();
            $table->dateTime('end_date')->nullable();
            $table->dateTime('exist_date')->nullable();
            $table->integer('id_staff')->nullable();
            $table->integer('id_customer')->nullable();
            $table->integer('id_domain')->nullable();
            $table->integer('id_hosting')->nullable();
            $table->integer('id_vps')->nullable();
            $table->integer('id_email')->nullable();
            $table->integer('id_ssl')->nullable();
            $table->integer('id_website')->nullable();

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
        Schema::dropIfExists('register_services');
    }
}
