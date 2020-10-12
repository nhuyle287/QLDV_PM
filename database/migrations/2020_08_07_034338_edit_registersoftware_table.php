<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditRegistersoftwareTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('register_soft')) {
            Schema::table('register_soft', function (Blueprint $table) {
                if (!Schema::hasColumn('register_soft', 'address_domain')) {
                    $table->string('address_domain')->nullable()->after('notes');
                }
                if (!Schema::hasColumn('register_soft', 'id_staff')) {
                    $table->string('id_staff')->nullable()->after('id_customer');
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
        if (Schema::hasTable('register_soft')) {
            Schema::table('register_soft', function (Blueprint $table) {
                if (!Schema::hasColumn('register_soft', 'address_domain')) {
                    $table->dropColumn('address_domain');
                }
                if (!Schema::hasColumn('register_soft', 'id_staff')) {
                    $table->dropColumn('id_staff');
                }
            });
        }
    }
}
