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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Name of the visitor
            $table->string('email'); // Email of the visitor
            $table->string('subject')->nullable(); // Optional subject of the message
            $table->text('message'); // The main message content
            $table->string('phone')->nullable(); // Optional phone number
            $table->enum('status', ['New', 'Read', 'Replied'])->default('New'); // Status of the message
            $table->ipAddress('ip_address')->nullable(); // IP address of the visitor
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
