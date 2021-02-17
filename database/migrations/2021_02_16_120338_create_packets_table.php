<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('categories');
            $table->string('name')->nullable();
            $table->longText('description_kz')->nullable();
            $table->longText('description_ru')->nullable();
            $table->string('image')->nullable();
            $table->integer('price');
            $table->string('css_color')->nullable();
            $table->integer('available_level')->nullable();
            $table->foreignId('user_status_id')->constrained('user_status');
            $table->boolean('is_active')->default(0);
            $table->integer('sort_num')->default(0);
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
        Schema::dropIfExists('packets');
    }
}
