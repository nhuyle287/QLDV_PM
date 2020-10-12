<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsStatusToRegisterServicesTable extends Migration
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
                if (!Schema::hasColumn('register_services','status')){
                    $table->string('status')->nullable()->after('code');
                }
                if (!Schema::hasColumn('register_services','date_using')){
                    $table->integer('date_using')->nullable()->after('code');
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
        if (Schema::hasTable('register_services')){
            Schema::table('register_services', function (Blueprint $table) {
                if (Schema::hasColumn('register_services','status')){
                    $table->dropColumn('status');
                }
                if (!Schema::hasColumn('register_services','date_using')){
                    $table->dropColumn('date_using');
                }
            });
        }
    }
}
