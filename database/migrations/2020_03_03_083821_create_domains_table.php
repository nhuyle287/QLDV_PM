<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDomainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('domains', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name')->nullable();
            $table->integer('id_customer')->nullable();
            $table->integer('fee_register')->nullable();
            $table->integer('fee_remain')->nullable();
            $table->integer('fee_tranformation')->nullable();
            $table->string('notes')->nullable();
            //tự tạo ra cột create_at, update_at
            $table->timestamps();
            //softDeletes như thùng rác bỏ vào nhưng không bị xóa, tạo ra delete_at
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
        Schema::dropIfExists('domains');
    }
}
