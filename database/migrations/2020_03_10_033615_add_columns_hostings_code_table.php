<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsHostingsCodeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        if (Schema::hasTable('hostings')){
            Schema::table('hostings', function (Blueprint $table) {
                if (!Schema::hasColumn('hostings','code')){
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
        if (Schema::hasTable('hostings')){
            Schema::table('hostings', function (Blueprint $table) {
                if (Schema::hasColumn('hostings','code')){
                    $table->dropColumn('code')->nullable();
                }
            });
        }
    }
}
