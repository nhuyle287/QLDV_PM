<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditRegistersoftTable extends Migration
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
                if (!Schema::hasColumn('register_soft', 'deleted_at')) {
                    $table->softDeletes()->nullable()->after('updated_at');
                }
                if (!Schema::hasColumn('register_soft', 'notes')) {
                    $table->string('notes')->nullable()->after('total_price');
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
                if (!Schema::hasColumn('register_soft', 'deleted_at')) {
                    $table->dropColumn('deleted_at');
                }
                if (!Schema::hasColumn('register_soft', 'notes')) {
                    $table->dropColumn('notes');
                }

            });
        }
    }
}
