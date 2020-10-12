<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditTypesoftwaresTable extends Migration
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
                if (!Schema::hasColumn('typesoftwares', 'description')) {
                    $table->text('description')->nullable()->after('name');
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
                if (Schema::hasColumn('typesoftwares', 'description')) {
                    $table->dropColumn('description');
                }

            });
        }
    }
}
