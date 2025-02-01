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
        Schema::create('groups', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('name', 100)->unique(); // Unique name for the group
            $table->text('description')->nullable(); // Optional description of the group
            $table->string('code', 50)->unique(); // Unique code for the group
            $table->timestamps(); // Created at and updated at timestamps                
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('group');
    }
};
