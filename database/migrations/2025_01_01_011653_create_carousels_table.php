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
        Schema::create('carousels', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable(); // Title of the slide
            $table->text('description')->nullable(); // Description or caption
            $table->string('image_path'); // Path to the image file
           // $table->string('link')->nullable(); // Optional link for the slide
            // $table->integer('order')->default(0); // Slide order in the carousel
            $table->boolean('is_active')->default(true); // Whether the slide is active
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carousels');
    }
};
