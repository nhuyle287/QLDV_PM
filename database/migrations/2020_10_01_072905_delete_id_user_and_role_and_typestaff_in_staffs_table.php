<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeleteIdUserAndRoleAndTypestaffInStaffsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('staffs', function (Blueprint $table) {
            if (Schema::hasColumn('staffs', 'id_user')) {
                $table->dropColumn('id_user');
            }
            if (Schema::hasColumn('staffs', 'role')) {
                $table->dropColumn('role');
            }
            if (Schema::hasColumn('staffs', 'type_staff')) {
                $table->dropColumn('type_staff');
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
        Schema::table('staffs', function (Blueprint $table) {
            if (!Schema::hasColumn('staffs', 'id_user')) {
                $table->string('id_user');
            }
            if (!Schema::hasColumn('staffs', 'role')) {
                $table->string('role');
            }
            if (!Schema::hasColumn('staffs', 'type_staff')) {
                $table->string('type_staff');
            }
        });
    }
}
