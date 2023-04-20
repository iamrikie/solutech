<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     
     * you should not specify the length of an unsignedInteger column in Laravel, just like you should not specify the length of an auto-incrementing primary key column and thats why I left them as default.
     
     */
    public function up(): void
    {
        Schema::create('user_tasks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('task_id');
            $table->timestamp('due_date')->nullable();
            $table->timestamp('start_time')->nullable();
            $table->timestamp('end_time')->nullable();
            $table->string('remarks', 255)->nullable();
            $table->unsignedBigInteger('status_id')->nullable();
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
            // $table->dropSoftDeletes(); //if we ever need need to implement soft deletes
    
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('task_id')->references('id')->on('tasks')->onDelete('cascade');
            $table->foreign('status_id')->references('id')->on('statuses')->onDelete('set null');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_tasks', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['task_id']);
            $table->dropForeign(['status_id']);
            // $table->dropSoftDeletes(); if we ever need need to implement soft deletes
        });
        Schema::dropIfExists('user_tasks');
    }
};
