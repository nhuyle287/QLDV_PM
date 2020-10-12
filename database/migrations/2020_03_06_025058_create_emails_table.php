<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emails', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('id_customer')->nullable();
            $table->string('name')->nullable();
            $table->integer('price')->nullable();
            $table->string('capacity')->nullable();
            $table->integer('email_number')->nullable();
            $table->integer('email_forwarder')->nullable();
            $table->integer('email_list')->nullable();
            $table->integer('parked_domains')->nullable();
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
        Schema::dropIfExists('emails');
    }
}
