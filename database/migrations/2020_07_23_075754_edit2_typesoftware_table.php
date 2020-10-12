<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Edit2TypesoftwareTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('typesoftwares')) {
            Schema::table('typesoftwares', function (Blueprint $table) {
                if (!Schema::hasColumn('typesoftwares', 'deleted_at')) {
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
        if (Schema::hasTable('typesoftwares')) {
            Schema::table('typesoftwares', function (Blueprint $table) {
                if (!Schema::hasColumn('typesoftwares', 'deleted_at')) {
                    $table->dropColumn('deleted_at');
                }

            });
        }
    }
}
