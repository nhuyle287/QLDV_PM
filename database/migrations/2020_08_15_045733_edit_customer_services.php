<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditCustomerServices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('register_services')){
            Schema::table('register_services', function (Blueprint $table) {

                if (!Schema::hasColumn('register_services', 'transaction')) {
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
        Schema::table('register_services', function (Blueprint $table){
            if (Schema::hasColumn('register_services','transaction')){
                $table->dropColumn('transaction')->nullable();
            }

        });
    }
}
