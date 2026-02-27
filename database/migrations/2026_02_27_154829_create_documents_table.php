<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            // Foreign Key link to admissions table
            $table->foreignId('admission_id')
                  ->constrained()
                  ->onDelete('cascade');
    
            // File Paths
            $table->string('birth_certificate_path')->nullable();
            $table->string('report_card_path')->nullable();
            $table->string('applicant_photo_path')->nullable();
            $table->string('father_photo_path')->nullable();
            $table->string('mother_photo_path')->nullable();
            $table->string('guardian_photo_path')->nullable();
    
            // Individual Statuses
            $table->string('birth_cert_status')->default('pending');
            $table->string('report_card_status')->default('pending');
            $table->string('app_photo_status')->default('pending');
            $table->string('father_photo_status')->default('pending');
            $table->string('mother_photo_status')->default('pending');
            $table->string('guardian_photo_status')->default('pending');
    
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
