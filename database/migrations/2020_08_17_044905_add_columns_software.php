<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsSoftware extends Migration
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

                if (!Schema::hasColumn('register_soft', 'transaction')) {
                    $table->string('transaction')->nullable()->after('status');
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
            if (Schema::hasColumn('register_soft','transaction')){
                $table->dropColumn('transaction')->nullable();
            }

        });
    }
}
