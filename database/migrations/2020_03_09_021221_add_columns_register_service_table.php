<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsRegisterServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     *
     * @return void
     */
    public function up()
    {
        //
        if (Schema::hasTable('register_services')){
            Schema::table('register_services', function (Blueprint $table) {
                if (!Schema::hasColumn('register_services','notes')){
                    $table->string('notes')->nullable()->after('exist_date');
                }
            });
        }
        if (Schema::hasTable('register_services')){
            Schema::table('register_services', function (Blueprint $table) {
                if (!Schema::hasColumn('register_services','code')){
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
        //
        Schema::table('register_services', function (Blueprint $table){
            if (Schema::hasColumn('register_services','notes')){
                $table->dropColumn('notes')->nullable();
            }
        });
        Schema::table('register_services', function (Blueprint $table){
            if (Schema::hasColumn('register_services','code')){
                $table->dropColumn('code')->nullable();
            }
        });
    }
}
