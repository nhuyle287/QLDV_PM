<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsRegisterSoft extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('register_soft')){
            Schema::table('register_soft', function (Blueprint $table) {
                if (!Schema::hasColumn('register_soft','code')){
                    $table->string('code')->nullable()->after('id');
                }
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
        Schema::table('register_soft', function (Blueprint $table){
            if (Schema::hasColumn('register_soft','code')){
                $table->dropColumn('code')->nullable();
            }
        });
    }
}
