<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVpssTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vpss', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->integer('id_customer')->nullable();
            $table->integer('price')->nullable();
            $table->string('cpu')->nullable();
            $table->string('capacity')->nullable();
            $table->string('ram')->nullable();
            $table->string('bandwith')->nullable();
            $table->string('technical')->nullable();
            $table->string('operating_system')->nullable();
            $table->string('backup')->nullable();
            $table->string('panel')->nullable();
            $table->string('notes')->nullable();
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
        Schema::dropIfExists('vpss');
    }
}
