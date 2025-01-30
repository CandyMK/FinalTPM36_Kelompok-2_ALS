<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('registrations', function (Blueprint $table) {
        $table->id(); // Primary Key
        $table->string('group_name', 100); // Limit length for better storage
        $table->string('group_id', 50); // Assuming group_id has a reasonable length
        $table->string('password'); // Consider hashing passwords
        $table->enum('binusian_status', ['Binusian', 'Non-Binusian']);
        $table->string('full_name', 150); // Limit length for better storage
        $table->string('email', 255)->unique(); // Email length can be up to 255
        $table->string('whatsapp', 20); // Limit length for phone numbers
        $table->string('line_id', 100)->unique(); // Limit length for Line ID
        $table->string('github_id', 100)->nullable(); // Nullable if not provided
        $table->string('birthplace', 100); // Limit length for better storage
        $table->date('birthdate');
        $table->text('cv'); // Use text for CV to allow larger content
        $table->string('flazz_card', 50)->nullable(); // Nullable if not provided
        $table->string('id_card', 50)->nullable(); // Nullable if not provided
        $table->timestamps();

        // Indexes for faster querying
        $table->index(['group_id', 'email']);
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('registrations');
    }
};
