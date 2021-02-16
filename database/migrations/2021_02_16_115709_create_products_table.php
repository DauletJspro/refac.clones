<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('categories');
            $table->string('name_kz')->nullable();
            $table->string('name_ru')->nullable();
            $table->longText('description_kz')->nullable();
            $table->longText('description_ru')->nullable();
            $table->string('image')->nullable();
            $table->integer('price');
            $table->longText('information')->nullable();
            $table->boolean('is_show')->default(0);
            $table->integer('sort_num')->default(0);
            $table->integer('cash_ball')->nullable();
            $table->boolean('is_new')->default(0);
            $table->boolean('is_famous')->default(0);
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
        Schema::dropIfExists('products');
    }
}
