<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     
     * You should not specify the length of an unsignedInteger / unsignedBigInteger column in Laravel, just like you should not specify the length of an auto-incrementing primary key column and thats why I left it as default.
     * The foreign method creates a foreign key constraint on the status_id column referencing the id column on the statuses table.
     
     * Note: $table->id(); command is alias of $table->unsignedBigInteger('user_id')
     * Note: you should not specify the length of an auto-incrementing primary key column in Laravel "for example ($table->bigIncrements('id', 11);)" --and that's why I left it as default $table->id();
     * 
     
     */

    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('description', 255);
            $table->timestamp('due_date')->nullable();
            $table->unsignedBigInteger('status_id');
            $table->timestamps();
            // $table->softDeletes(); //if we ever need need to implement soft deletes
            $table->timestamp('deleted_at')->nullable();
        
            $table->foreign('status_id')->references('id')->on('statuses');   
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->dropForeign(['status_id']);
            // $table->dropSoftDeletes(); //if we ever need need to implement soft deletes
        });
        Schema::dropIfExists('tasks');
    }
};
