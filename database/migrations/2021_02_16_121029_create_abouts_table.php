<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about', function (Blueprint $table) {
            $table->id();
            $table->string('title_kz')->nullable();
            $table->string('title_ru')->nullable();
            $table->longText('body_kz')->nullable();
            $table->longText('body_ru')->nullable();
            $table->string('image')->nullable();
            $table->boolean('is_show')->default(0);
            $table->integer('sort_num')->default(0);;
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
        Schema::dropIfExists('about');
    }
}
