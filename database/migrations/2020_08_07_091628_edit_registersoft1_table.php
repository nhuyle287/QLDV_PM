<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditRegistersoft1Table extends Migration
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
                if (!Schema::hasColumn('register_soft', 'id_typesoftware')) {
                    $table->string('id_typesoftware')->nullable()->after('address_domain');
                }
                if (!Schema::hasColumn('register_soft', 'id_software')) {
                    $table->string('id_software')->nullable()->after('id_typesoftware');
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
                if (!Schema::hasColumn('register_soft', 'id_typesoftware')) {
                    $table->dropColumn('id_typesoftware');
                }
                if (!Schema::hasColumn('register_soft', 'id_software')) {
                    $table->dropColumn('id_software');
                }
            });
        }
    }
}
