<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurcharOrderitemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchar_orderitems', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_product')->nullable();
            $table->string('count')->nullable();
            $table->string('price')->nullable();
            $table->string('VAT_price')->nullable();
            $table->string('total')->nullable();
            $table->integer('id_purpose')->nullable();
            $table->integer('id_purchar_order')->nullable();
            $table->dateTime('time_deliver')->nullable();
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
        Schema::dropIfExists('purchar_orderitems');
    }
}
