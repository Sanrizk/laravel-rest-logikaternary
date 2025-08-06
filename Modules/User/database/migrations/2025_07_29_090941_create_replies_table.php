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
        Schema::create('replies', function (Blueprint $table) {
            $table->id();
            $table->string('content_reply');

            $table->unsignedBigInteger('forum_id');
            $table->foreign('forum_id')->references('id')->on('forums');

            $table->unsignedBigInteger('user_reply_id')->nullable();
            $table->foreign('user_reply_id')->references('id')->on('users');

            $table->unsignedBigInteger('admin_reply_id')->nullable();
            $table->foreign('admin_reply_id')->references('id')->on('admin_users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('replies');
    }
};
