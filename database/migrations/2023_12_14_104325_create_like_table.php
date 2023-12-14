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
        Schema::create('likes', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('users_id')->unsigned();
            $table->foreign('users_id')->references('id')->on('users')  //Reference to id of users that liked the post
                ->onUpdate('cascade')->onDelete('cascade');

            $table->bigInteger('posts_id')->unsigned();
            $table->foreign('posts_id')->references('id')->on('posts')  //Reference to id of uthe post that the user liked
                ->onUpdate('cascade')->onDelete('cascade');

            $table->unique(['users_id', 'posts_id']);
                
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('like');
    }
};
