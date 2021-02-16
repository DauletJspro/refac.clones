<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeignsToUserInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_info', function (Blueprint $table) {
            $table->foreignId('city_id')->after('middle_name')->constrained('cities');
            $table->foreignId('speaker_id')->after('city_id')->constrained('users');
            $table->foreignId('office_director_id')->after('speaker_id')->constrained('users');
            $table->foreignId('office_id')->after('is_director_office')->constrained('offices');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_info', function (Blueprint $table) {

            $table->dropForeign('user_info_city_id_foreign');
            $table->dropForeign('user_info_speaker_id_foreign');
            $table->dropForeign('user_info_office_director_id_foreign');
            $table->dropForeign('user_info_office_id_foreign');
            $table->dropColumn('city_id');
            $table->dropColumn('speaker_id');
            $table->dropColumn('office_director_id');
            $table->dropColumn('office_id');
        });
    }
}
