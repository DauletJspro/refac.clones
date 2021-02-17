<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserOperationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_operation', function (Blueprint $table) {
            $table->id();
            $table->foreignId('operation_id')->constrained('operation');
            $table->foreignId('author_id')->constrained('users');
            $table->foreignId('recipient_id')->constrained('users');
            $table->foreignId('operation_type_id')->constrained('operation_type');
            $table->integer('balance')->nullable();
            $table->integer('personal_value')->nullable();
            $table->integer('group_value')->nullable();
            $table->integer('personal_sv')->nullable();
            $table->integer('group_sv')->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_operation');
    }
}
