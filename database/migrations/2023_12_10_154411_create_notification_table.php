<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            
            $table->bigInteger('to_id')->unsigned();
            $table->foreign('to_id')->references('id')->on('users')  //Reference to id of users receiving the notification
                ->onUpdate('cascade')->onDelete('cascade');

            $table->bigInteger('from_id')->unsigned();
            $table->foreign('from_id')->references('id')->on('users')  //Reference to id of users sending the notification
                ->onUpdate('cascade')->onDelete('cascade');

            $table->bigInteger('comments_id')->unsigned();

            $table->foreign('comments_id')->references('id')->on('comments')  //Reference to id of comment
                ->onUpdate('cascade')->onDelete('cascade');
                
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notification');
    }
};
