<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsSslsCodeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        if (Schema::hasTable('ssls')){
            Schema::table('ssls', function (Blueprint $table) {
                if (!Schema::hasColumn('ssls','code')){
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
        if (Schema::hasTable('ssls')){
            Schema::table('ssls', function (Blueprint $table) {
                if (Schema::hasColumn('ssls','code')){
                    $table->dropColumn('code')->nullable();
                }
            });
        }
    }
}
