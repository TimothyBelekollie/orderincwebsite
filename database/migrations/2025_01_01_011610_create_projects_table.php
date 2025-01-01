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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Project name
            $table->text('description')->nullable(); // Project description
            $table->string("slug")->unique();
            $table->date('start_date')->nullable(); // Start date
            $table->date('end_date')->nullable(); // End date
            $table->enum('status', ['Planned', 'In Progress', 'Completed', 'On Hold'])->default('Planned'); // Project status
            $table->decimal('budget', 15, 2)->nullable(); // Budget
            $table->foreignId('client_id')->nullable()->constrained('clients')->onDelete('set null'); // Client relationship
            // $table->foreignId('created_by')->constrained('users')->onDelete('cascade'); // Created by relationship
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
