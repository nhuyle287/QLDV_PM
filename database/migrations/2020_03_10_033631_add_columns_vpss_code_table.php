<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsVpssCodeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        if (Schema::hasTable('vpss')){
            Schema::table('vpss', function (Blueprint $table) {
                if (!Schema::hasColumn('vpss','code')){
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
        if (Schema::hasTable('vpss')){
            Schema::table('vpss', function (Blueprint $table) {
                if (Schema::hasColumn('vpss','code')){
                    $table->dropColumn('code')->nullable();
                }
            });
        }
    }
}
