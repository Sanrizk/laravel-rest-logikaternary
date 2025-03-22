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
        Schema::create('reply_discusses', function (Blueprint $table) {
            $table->id();
            $table->string('contentReply');
            $table->unsignedBigInteger('postingDiscussId');
            $table->foreign('postingDiscussId')->references('id')->on('posting_discusses');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reply_discusses');
    }
};
