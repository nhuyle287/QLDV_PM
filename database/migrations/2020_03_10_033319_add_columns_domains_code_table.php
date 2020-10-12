<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsDomainsCodeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        if (Schema::hasTable('domains')){
            Schema::table('domains', function (Blueprint $table) {
                if (!Schema::hasColumn('domains','code')){
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
        if (Schema::hasTable('domains')){
            Schema::table('domains', function (Blueprint $table) {
                if (Schema::hasColumn('domains','code')){
                    $table->dropColumn('code')->nullable();
                }
            });
        }
    }
}
