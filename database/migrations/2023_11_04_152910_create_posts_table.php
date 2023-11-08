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
        Schema::create('posts', function (Blueprint $table) {
            $user = Auth::user();
            $user_id = $user->id;

            $table->id();
            $table->string('post_title');
            $table->string('caption');
            $table->string('img_path');
            

            $table->bigInteger('users_id') -> $user_id;

            $table->foreign('users_id')->references('id')->on('users')  //Reference to id of users
            ->onUpdate('cascade')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
