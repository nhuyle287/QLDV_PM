<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHostingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hostings', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name')->nullable();
            $table->integer('id_customer')->nullable();
            $table->integer('price')->nullable();
            $table->string('capacity')->nullable();
            $table->string('bandwith')->nullable();
            $table->string('sub_domain')->nullable();
            $table->string('email')->nullable();
            $table->string('ftp')->nullable();
            $table->integer('database')->nullable();
            $table->integer('adddon_domain')->nullable();
            $table->string('park_domain')->nullable();
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
        Schema::dropIfExists('hostings');
    }
}
