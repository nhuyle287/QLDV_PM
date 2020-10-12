<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSslsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ssls', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_customer')->nullable();

            $table->string('name')->nullable();
            $table->integer('price')->nullable();
            $table->string('insurance_policy')->nullable();
            $table->integer('domain_number')->nullable();
            $table->string('reliability')->nullable();
            $table->string('green_bar')->nullable();
            $table->string('sans')->nullable();
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
        Schema::dropIfExists('ssls');
    }
}
