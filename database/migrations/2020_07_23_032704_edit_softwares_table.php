<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditSoftwaresTable extends Migration
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
                if (!Schema::hasColumn('softwares', 'quantity_branch')) {
                    $table->string('quantity_branch')->nullable()->after('name');
                }
                if (!Schema::hasColumn('softwares', 'quantity_staff')) {
                    $table->string('quantity_staff')->nullable()->after('quantity_branch');
                }
                if (!Schema::hasColumn('softwares', 'quantity_acc')) {
                    $table->string('quantity_acc')->nullable()->after('quantity_staff');
                }
                if (!Schema::hasColumn('softwares', 'quantity_product')) {
                    $table->string('quantity_product')->nullable()->after('quantity_acc');
                }
                if (!Schema::hasColumn('softwares', 'quantity_bill')) {
                    $table->string('quantity_bill')->nullable()->after('quantity_product');
                }
                if (!Schema::hasColumn('softwares', 'type_software')) {
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
                if (!Schema::hasColumn('softwares', 'quantity_branch')) {
                    $table->dropColumn('quantity_branch');
                }
                if (!Schema::hasColumn('softwares', 'quantity_staff')) {
                    $table->dropColumn('quantity_staff');
                }
                if (!Schema::hasColumn('softwares', 'quantity_acc')) {
                    $table->dropColumn('quantity_acc');
                }
                if (!Schema::hasColumn('softwares', 'quantity_product')) {
                    $table->dropColumn('quantity_product');
                }
                if (!Schema::hasColumn('softwares', 'quantity_bill')) {
                    $table->dropColumn('quantity_bill');
                }
                if (!Schema::hasColumn('softwares', 'type_software')) {
                    $table->string('type_software')->nullable()->after('price');
                }
            });
        }
    }
}
