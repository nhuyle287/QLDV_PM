<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsWebsitesCodeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        if (Schema::hasTable('websites')){
            Schema::table('websites', function (Blueprint $table) {
                if (!Schema::hasColumn('websites','code')){
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
        if (Schema::hasTable('websites')){
            Schema::table('websites', function (Blueprint $table) {
                if (Schema::hasColumn('websites','code')){
                    $table->dropColumn('code')->nullable();
                }
            });
        }
    }
}
