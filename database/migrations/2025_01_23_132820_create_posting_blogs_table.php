<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posting_blogs', function (Blueprint $table) {
            $table->id();
            $table->string('titleBlog');
            $table->string('contentBlog');
            $table->unsignedBigInteger('categoryId');
            $table->foreign('categoryId')->references('id')->on('category_blogs');
            $table->unsignedBigInteger('menthorId');
            $table->foreign('menthorId')->references('id')->on('admin_users');
            // $table->integer('categoryId');
            // $table->integer('menthorId');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posting_blogs');
    }
};
