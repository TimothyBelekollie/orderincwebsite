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
        Schema::create('aboutuses', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Section title
            $table->text('description'); // Detailed description
            $table->string('image_path')->nullable(); // Path for an optional image
            $table->text('vision')->nullable(); // Vision statement
            $table->text('mission')->nullable(); // Mission statement
            $table->text('values')->nullable(); // Core values
            $table->boolean('is_active')->default(true); // Status to enable/disable the section
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aboutuses');
    }
};
