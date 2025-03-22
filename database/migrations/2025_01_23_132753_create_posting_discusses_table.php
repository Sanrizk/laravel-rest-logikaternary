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
        Schema::create('posting_discusses', function (Blueprint $table) {
            $table->id();
            $table->string('titleDiscuss');
            $table->string('contentDiscuss');
            $table->unsignedBigInteger('userId');
            $table->foreign('userId')->references('id')->on('users');
            // $table->integer('userId');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posting_discusses');
    }
};
