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
        Schema::create('votes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('feedback_id');
            $table->unsignedBigInteger('product_id');
            $table->integer('is_upvote')->default(0); // 0 for no vote, 1 for upvote, -1 for downvote
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('feedback_id')->references('id')->on('feed_backs');
            $table->foreign('product_id')->references('id')->on('add_products');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('votes');
    }
};
