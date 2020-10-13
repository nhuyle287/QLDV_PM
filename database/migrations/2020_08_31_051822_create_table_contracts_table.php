<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->nullable();
            $table->integer('id_customer')->nullable();
            $table->integer('id_website')->nullable();
            $table->integer('id_ssl')->nullable();
            $table->integer('id_domain')->nullable();
            $table->integer('id_hosting')->nullable();
            $table->integer('id_vps')->nullable();
            $table->integer('price_1')->nullable();
            $table->integer('price2')->nullable();
            $table->integer('total_price')->nullable();
            $table->string('promotion')->nullable();
            $table->integer('discount_price')->nullable();

            $table->string('languages')->nullable();
            $table->integer('date_finish')->nullable();
            $table->string('date_infor')->nullable();
            $table->string('date_demo')->nullable();
            $table->integer('date_code')->nullable();
            $table->integer('date_test')->nullable();
            $table->integer('quantity_ssl')->nullable();
            $table->integer('quantity_domain')->nullable();
            $table->integer('quantity_hosting')->nullable();
            $table->integer('quantity_website')->nullable();
            $table->integer('quantity_vps')->nullable();
            $table->date('date_create')->nullable();
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
        Schema::dropIfExists('contracts');
    }
}
