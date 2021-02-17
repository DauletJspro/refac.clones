<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('video', function (Blueprint $table) {
            $table->id();
            $table->string('name_kz')->nullable();
            $table->string('name_ru')->nullable();
            $table->string('image')->nullable();
            $table->string('path')->nullable();
            $table->longText('description_kz')->nullable();
            $table->longText('description_ru')->nullable();
            $table->boolean('is_show')->default(0);
            $table->integer('sort_num')->default(0);
            $table->integer('view_count')->nullable();;
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
        Schema::dropIfExists('video');
    }
}
