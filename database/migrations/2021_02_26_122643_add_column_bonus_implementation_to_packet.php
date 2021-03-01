<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnBonusImplementationToPacket extends Migration
{
    public function up()
    {
        Schema::table('packets', function (Blueprint $table) {
            $table->json('bonus_implementation')->after('sort_num')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('packets', function (Blueprint $table) {
            $table->dropColumn('bonus_implementation');
        });
    }
}
