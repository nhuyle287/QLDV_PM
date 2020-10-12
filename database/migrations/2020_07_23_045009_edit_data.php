<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        if (Schema::hasTable('domains')) {
            Schema::table('domains', function (Blueprint $table) {
                if (Schema::hasColumn('domains', 'code')) {
                    $table->dropColumn('code');
                }
                if (Schema::hasColumn('domains', 'id_customer')) {
                    $table->dropColumn('id_customer');
                }
            });
        }
        if (Schema::hasTable('emails')) {
            Schema::table('emails', function (Blueprint $table) {
                if (Schema::hasColumn('emails', 'code')) {
                    $table->dropColumn('code');
                }
                if (Schema::hasColumn('emails', 'id_customer')) {
                    $table->dropColumn('id_customer');
                }
            });
        }
        if (Schema::hasTable('hostings')) {
            Schema::table('hostings', function (Blueprint $table) {
                if (Schema::hasColumn('hostings', 'code')) {
                    $table->dropColumn('code');
                }
                if (Schema::hasColumn('hostings', 'id_customer')) {
                    $table->dropColumn('id_customer');
                }
            });
        }
        if (Schema::hasTable('softwares')) {
            Schema::table('softwares', function (Blueprint $table) {
                if (Schema::hasColumn('softwares', 'code')) {
                    $table->dropColumn('code');
                }
                if (Schema::hasColumn('softwares', 'id_customer')) {
                    $table->dropColumn('id_customer');
                }
            });
        }
        if (Schema::hasTable('ssls')) {
            Schema::table('ssls', function (Blueprint $table) {
                if (Schema::hasColumn('ssls', 'code')) {
                    $table->dropColumn('code');
                }
                if (Schema::hasColumn('ssls', 'id_customer')) {
                    $table->dropColumn('id_customer');
                }
            });
        }
        if (Schema::hasTable('vpss')) {
            Schema::table('vpss', function (Blueprint $table) {
                if (Schema::hasColumn('vpss', 'code')) {
                    $table->dropColumn('code');
                }
                if (Schema::hasColumn('vpss', 'id_customer')) {
                    $table->dropColumn('id_customer');
                }
            });
        }
        if (Schema::hasTable('websites')) {
            Schema::table('websites', function (Blueprint $table) {
                if (Schema::hasColumn('websites', 'code')) {
                    $table->dropColumn('code');
                }
                if (Schema::hasColumn('websites', 'id_customer')) {
                    $table->dropColumn('id_customer');
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
                if (Schema::hasColumn('softwares', 'code')) {
                    $table->string('code')->nullable()->after('quantity_bill');
                }
                if (Schema::hasColumn('softwares', 'id_customer')) {
                    $table->string('id_customer')->nullable()->after('code');
                }
            });
        }
        if (Schema::hasTable('websites')) {
            Schema::table('websites', function (Blueprint $table) {
                if (Schema::hasColumn('websites', 'code')) {
                    $table->string('code')->nullable()->after('id');
                }
                if (Schema::hasColumn('websites', 'id_customer')) {
                    $table->string('id_customer')->nullable()->after('code');
                }
            });
        }
        if (Schema::hasTable('vpss')) {
            Schema::table('vpss', function (Blueprint $table) {
                if (Schema::hasColumn('vpss', 'code')) {
                    $table->string('code')->nullable()->after('id');
                }
                if (Schema::hasColumn('vpss', 'id_customer')) {
                    $table->string('id_customer')->nullable()->after('name');
                }
            });
        }
        if (Schema::hasTable('ssls')) {
            Schema::table('ssls', function (Blueprint $table) {
                if (Schema::hasColumn('ssls', 'code')) {
                    $table->string('code')->nullable()->after('id');
                }
                if (Schema::hasColumn('ssls', 'id_customer')) {
                    $table->string('id_customer')->nullable()->after('code');
                }
            });
        }
        if (Schema::hasTable('hostings')) {
            Schema::table('hostings', function (Blueprint $table) {
                if (Schema::hasColumn('hostings', 'code')) {
                    $table->string('code')->nullable()->after('id');
                }
                if (Schema::hasColumn('hostings', 'id_customer')) {
                    $table->string('id_customer')->nullable()->after('code');
                }
            });
        }
        if (Schema::hasTable('emails')) {
            Schema::table('emails', function (Blueprint $table) {
                if (Schema::hasColumn('emails', 'code')) {
                    $table->string('code')->nullable()->after('id');
                }
                if (Schema::hasColumn('emails', 'id_customer')) {
                    $table->string('id_customer')->nullable()->after('code');
                }
            });
        }
        if (Schema::hasTable('domains')) {
            Schema::table('domains', function (Blueprint $table) {
                if (Schema::hasColumn('domains', 'code')) {
                    $table->string('code')->nullable()->after('id');
                }
                if (Schema::hasColumn('domains', 'id_customer')) {
                    $table->string('id_customer')->nullable()->after('name');
                }
            });
        }

    }
}
