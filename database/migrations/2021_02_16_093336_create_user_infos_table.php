<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_info', function (Blueprint $table) {
            $table->id();
            $table->string('last_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->boolean('is_speaker')->nullable();
            $table->boolean('is_director_office')->default(false)->nullable();
            $table->boolean('is_document_verified')->default(false)->nullable();
            $table->string('instagram')->nullable();
            $table->string('wallet_password')->nullable();
            $table->string('card_name')->nullable();
            $table->string('card_number')->nullable();
            $table->string('document_number')->nullable();
            $table->string('address')->nullable();
            $table->string('iban')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('user_info');
    }
}
