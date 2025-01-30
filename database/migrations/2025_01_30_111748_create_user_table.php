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
        Schema::create('user', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('name', 100); // User's full name
            $table->string('email', 255)->unique(); // Unique email address
            $table->string('password'); // Hashed password
            $table->string('phone', 20)->nullable(); // Optional phone number
            $table->enum('role', ['admin', 'user', 'moderator'])->default('user'); // User role
            $table->string('profile_picture')->nullable(); // Optional profile picture URL
            $table->text('bio')->nullable(); // Optional biography
            $table->foreignId('group_id')->nullable()->constrained('groups')->onDelete('set null'); // Nullable foreign key to groups
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user');
    }
};
