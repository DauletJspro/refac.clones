<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserBasketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_baskets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products');
            $table->foreignId('user_id')->constrained('users');
            $table->boolean('is_active')->default(0);
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
        Schema::dropIfExists('user_baskets');
    }
}
