<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsEmailsCodeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        if (Schema::hasTable('emails')){
            Schema::table('emails', function (Blueprint $table) {
                if (!Schema::hasColumn('emails','code')){
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
        if (Schema::hasTable('emails')){
            Schema::table('emails', function (Blueprint $table) {
                if (Schema::hasColumn('emails','code')){
                    $table->dropColumn('code')->nullable();
                }
            });
        }
    }
}
