<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurcharOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchar_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_customer')->nullable();
            $table->integer('id_user')->nullable();
            $table->string('price')->nullable();
            $table->string('VAT_price')->nullable();
            $table->string('total')->nullable();
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
        Schema::dropIfExists('purchar_orders');
    }
}
