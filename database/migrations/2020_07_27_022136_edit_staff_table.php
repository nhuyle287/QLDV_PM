<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditStaffTable extends Migration
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
                if (!Schema::hasColumn('staffs', 'role')) {
                    $table->string('role')->nullable()->after('birthday');
                }
                if (!Schema::hasColumn('staffs', 'id_user')) {
                    $table->string('id_user')->nullable()->after('birthday');
                }

                if (Schema::hasColumn('staffs', 'code')) {
                    $table->dropColumn('code');
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
                if (!Schema::hasColumn('staffs', 'role')) {
                    $table->dropColumn('role');
                }
                if (!Schema::hasColumn('staffs', 'id_user')) {
                    $table->dropColumn('id_user');
                }
                if (!Schema::hasColumn('staffs', 'code')) {
                    $table->string('code')->nullable()->after('name');
                }
            });
        }
    }
}
