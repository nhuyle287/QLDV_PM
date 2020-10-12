<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditRegistersoftware1Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('register_soft')) {
            Schema::table('register_soft', function (Blueprint $table) {
                if (Schema::hasColumn('register_soft', 'total_price')) {
                    $table->dropColumn('total_price');
                }

            });
        }
        Schema::dropIfExists('register_softitem');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasTable('register_soft')) {
            Schema::table('register_soft', function (Blueprint $table) {
                if (Schema::hasColumn('register_soft', 'total_price')) {
                    $table->string('total_price')->nullable()->after('id_staff');
                }
            });
        }
        Schema::create('register_softitem', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_order');
            $table->integer('id_product');
            $table->timestamps();
            $table->softDeletes();;
        });
    }
}
