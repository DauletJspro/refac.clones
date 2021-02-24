<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPacketTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_packet', function (Blueprint $table) {
            $table->id();
            $table->foreignId('packet_id')->constrained('packets');
            $table->foreignId('user_id')->constrained('users');
            $table->integer('packet_price')->nullable();
            $table->timestamp('activated_at')->nullable();
            $table->boolean('is_active')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_packet');
    }
}
