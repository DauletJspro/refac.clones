<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatusAndGapStatusToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('status_id')->after('image')->nullable()->constrained('user_status');
            $table->foreignId('gap_status_id')->after('status_id')->nullable()->constrained('user_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('users_gap_status_id_foreign');
            $table->dropForeign('users_status_id_foreign');
            $table->dropColumn('status_id');
            $table->dropColumn('gap_status_id');
        });
    }
}
