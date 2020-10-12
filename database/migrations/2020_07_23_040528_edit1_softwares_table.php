<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Edit1SoftwaresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('softwares')) {
            Schema::table('softwares', function (Blueprint $table) {
                if (Schema::hasColumn('softwares', 'type_software')) {
                    $table->dropColumn('type_software');
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
        if (Schema::hasTable('softwares')) {
            Schema::table('softwares', function (Blueprint $table) {
                if (Schema::hasColumn('softwares', 'type_software')) {
                    $table->string('type_software')->nullable()->after('price');
                }
            });
        }
    }
}
