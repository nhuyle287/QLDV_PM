<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditTypestaff1Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('typestaffs')) {
            Schema::table('typestaffs', function (Blueprint $table) {
                if (!Schema::hasColumn('typestaffs', 'deleted_at')) {
                    $table->softDeletes()->nullable()->after('updated_at');
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
        if (Schema::hasTable('typestaffs')) {
            Schema::table('typestaffs', function (Blueprint $table) {
                if (!Schema::hasColumn('typestaffs', 'deleted_at')) {
                    $table->dropColumn('deleted_at');
                }

            });
        }
    }
}
