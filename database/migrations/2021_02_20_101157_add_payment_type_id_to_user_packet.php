<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPaymentTypeIdToUserPacket extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_packet', function (Blueprint $table) {
            $table->foreignId('payment_type_id')->constrained('payment_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_packet', function (Blueprint $table) {
            $table->dropForeign('user_packet_payment_type_id_foreign');
            $table->dropColumn('payment_type_id');
        });
    }
}
