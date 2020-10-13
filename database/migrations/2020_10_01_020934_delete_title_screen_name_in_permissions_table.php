<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeleteTitleScreenNameInPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('permissions', function (Blueprint $table) {
            if (Schema::hasColumn('permissions', 'title')) {
                $table->dropColumn('title');
            }
            if (Schema::hasColumn('permissions', 'screen_name')) {
                $table->dropColumn('screen_name');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('permissions', function (Blueprint $table) {
            if (!Schema::hasColumn('permissions', 'title')) {
                $table->string('title');
            }
            if (!Schema::hasColumn('permissions', 'screen_name')) {
                $table->string('screen_name');
            }
        });
    }
}
