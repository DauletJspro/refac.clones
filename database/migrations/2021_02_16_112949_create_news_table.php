<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->foreignId('author_id')->constrained('users');
            $table->foreignId('category_id')->constrained('news_categories');
            $table->string('title_kz')->nullable();
            $table->string('title_ru')->nullable();
            $table->longText('description_kz')->nullable();
            $table->longText('description_ru')->nullable();
            $table->longText('body_kz')->nullable();
            $table->longText('body_ru')->nullable();
            $table->string('image')->nullable();
            $table->boolean('is_show')->default(0);
            $table->integer('sort_num')->default(0);
            $table->integer('view_count')->nullable();
            $table->timestamp('news_date')->nullable();
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
        Schema::dropIfExists('news');
    }
}
