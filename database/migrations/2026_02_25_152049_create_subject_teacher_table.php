<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('subject_teacher', function (Blueprint $table) {
            $table->id();
            $table->foreignId('subject_id')->constrained()->onDelete('cascade');
            // Assuming 'users' table holds teachers. Change 'users' to 'teachers' if you have a separate table.
            $table->foreignId('teacher_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('section_id')->constrained()->onDelete('cascade');
            
            // Metadata for the assignment
            $table->string('schedule')->nullable(); // e.g., MWF 08:00-09:00
            $table->string('room')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('subject_teacher');
    }
};