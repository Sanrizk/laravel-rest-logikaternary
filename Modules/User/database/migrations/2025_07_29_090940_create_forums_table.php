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
        Schema::create('forums', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('content');

            $table->unsignedBigInteger('user_forum_id')->nullable();
            $table->foreign('user_forum_id')->references('id')->on('users');

            $table->unsignedBigInteger('admin_forum_id')->nullable();
            $table->foreign('admin_forum_id')->references('id')->on('admin_users');            
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('forums');
    }
};
