<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditRegisterserviceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('register_services')) {

            Schema::table('register_services', function (Blueprint $table) {
                $table->string('exist_date')->change();
            });

        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        if (Schema::hasTable('register_services')){
//            Schema::table('register_services', function (Blueprint $table) {
//                Schema::table('register_services', function (Blueprint $table) {
//                    $table->dropColumn('exist_date');
//                });
//            });
//        }
    }
}
