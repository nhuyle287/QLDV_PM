<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');

            $table->string('code')->nullable();
            $table->float('price')->nullable();
            $table->string('VAT_price')->nullable();
            $table->double('total')->nullable();
            $table->integer('id_staff')->nullable();
            $table->integer('id_customer')->nullable();
            $table->integer('id_register_service')->nullable();
            $table->integer('id_register_soft')->nullable();
            $table->string('status')->nullable();
            $table->dateTime('date')->nullable();
            $table->string('order_type')->nullable();
            $table->string('description')->nullable();
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
        Schema::dropIfExists('invoices');
    }
}
