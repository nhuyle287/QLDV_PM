<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditStaff1Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('staffs')) {
            Schema::table('staffs', function (Blueprint $table) {
                if (!Schema::hasColumn('staffs', 'type_staff')) {
                    $table->text('type_staff')->nullable()->after('role');
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
        if (Schema::hasTable('staffs')) {
            Schema::table('staffs', function (Blueprint $table) {
                if (Schema::hasColumn('staffs', 'type_staff')) {
                    $table->dropColumn('type_staff');
                }

            });
        }
    }
}
