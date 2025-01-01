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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Title of the blog post
            $table->string('slug')->unique(); // Unique slug for the blog URL
            $table->text('content'); // Main content of the blog post
            $table->string('image_path')->nullable(); // Optional featured image
            $table->foreignId('author_id')->constrained('users')->onDelete('cascade'); // Reference to the author (users table)
            $table->foreignId('category_id')->constrained('blog_categories')->onDelete('cascade'); // Reference to blog_categories table
            $table->enum('status', ['Draft', 'Published', 'Archived'])->default('Draft'); // Blog status
            $table->timestamp('published_at')->nullable(); // Publish date and time
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
