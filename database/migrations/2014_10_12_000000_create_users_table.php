<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     
     * The id method creates an auto-incrementing id column as the primary key.
     * The string method creates a varchar column with the given name and length.
     
     * Note: you should not specify the length of an auto-incrementing primary key column in Laravel "for example ($table->bigIncrements('id', 12);)" --and that's why I left it as default $table->id(); 
     
     */

    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            //$table->string('name'); //my addition
            $table->string('email_address', 100)->unique();
            $table->string('password', 100);
            // $table->timestamp('created_at')->nullable();
            // $table->timestamp('updated_at')->nullable();
            // $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
  
        });
        
        // Add the 'name' column after the 'id' column
        DB::statement('ALTER TABLE users ADD COLUMN name VARCHAR(255) AFTER id');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::dropIfExists('users');
    }
};
