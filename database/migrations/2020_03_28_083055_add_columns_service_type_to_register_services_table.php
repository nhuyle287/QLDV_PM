<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsServiceTypeToRegisterServicesTable extends Migration
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
                if (!Schema::hasColumn('register_services','service_type')){
                    $table->string('service_type')->nullable()->after('code');
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
                if (Schema::hasColumn('register_services','service_type')){
                    $table->dropColumn('service_type');
                }
            });
        }
    }
}
