<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsCustomerServices extends Migration
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
                $table->dropColumn('birthday');
                if (!Schema::hasColumn('customers','open_at')){
                    $table->string('open_at')->nullable()->after('address');
                }
                if (!Schema::hasColumn('customers','account_number')){
                    $table->string('account_number')->nullable()->after('address');
                }
                if (!Schema::hasColumn('customers','fax_number')){
                    $table->string('fax_number')->nullable()->after('address');
                }
                if (!Schema::hasColumn('customers','position')){
                    $table->string('position')->nullable()->after('address');
                }
                if (!Schema::hasColumn('customers','nameStore')){
                    $table->string('nameStore')->nullable()->after('address');
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
            if (Schema::hasColumn('customers','nameStore')){
                $table->dropColumn('nameStore')->nullable();
            }
            if (Schema::hasColumn('customers','position')){
                $table->dropColumn('position')->nullable();
            }
            if (Schema::hasColumn('customers','fax_number')){
                $table->dropColumn('fax_number')->nullable();
            }
            if (Schema::hasColumn('customers','account_number')){
                $table->dropColumn('account_number')->nullable();
            }
            if (Schema::hasColumn('customers','open_at')){
                $table->dropColumn('open_at')->nullable();
            }
        });
    }
}
