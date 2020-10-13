<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsCustomer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('customers')){
            Schema::table('customers', function (Blueprint $table) {

                if (!Schema::hasColumn('customers', 'tax_number')) {
                    $table->string('tax_number')->nullable()->after('fax_number');
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
        Schema::table('customers', function (Blueprint $table){
            if (Schema::hasColumn('customers','tax_number')){
                $table->dropColumn('tax_number')->nullable();
            }

        });

    }
}
