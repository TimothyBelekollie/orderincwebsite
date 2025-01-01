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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Service name
            $table->string('slug')->unique(); // Unique slug for the service URL
            $table->text('description')->nullable(); // Detailed description of the service
            $table->string('icon')->nullable(); // Path or class name for an icon
            // $table->decimal('price', 10, 2)->nullable(); // Price of the service (optional)
            $table->boolean('is_active')->default(true); // Whether the service is active
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
