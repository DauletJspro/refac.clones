<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project', function (Blueprint $table) {
            $table->id();
            $table->string('name_kz')->nullable();
            $table->string('name_ru')->nullable();
            $table->longText('body_kz')->nullable();
            $table->longText('body_ru')->nullable();
            $table->string('image')->nullable();
            $table->boolean('is_show')->default(0);
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
        Schema::dropIfExists('project');
    }
}
