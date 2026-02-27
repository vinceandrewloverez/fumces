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
        Schema::create('admissions', function (Blueprint $table) {
            $table->id();

            // Step 1: Student Personal Information
            $table->string('studentFirstName');
            $table->string('studentMiddleName')->nullable();
            $table->string('studentLastName');
            $table->string('studentSuffix')->nullable();
            $table->date('dateOfBirth');
            $table->string('gender');
            $table->text('address');

            // Step 2: Family & Guardian Details
            $table->string('fatherName')->nullable();
            $table->string('fatherOccupation')->nullable();
            $table->string('motherName')->nullable();
            $table->string('motherOccupation')->nullable();
            $table->string('emergencyName');
            $table->string('phone');

            // Step 3: Economic Status
            $table->string('socioeconomic_status');
            $table->string('housing_type');
            $table->integer('siblings_count')->nullable();
            $table->boolean('discount_intent')->default(false);
            $table->string('discount_category')->nullable();

            // Step 4: Academic History
            $table->string('previousSchool')->nullable();
            $table->string('year_level');
            $table->string('academic_year');
            $table->text('special_needs')->nullable();

            // Step 5: Enrollment Documents (Storing file paths)
            $table->string('birth_certificate_path');
            $table->string('report_card_path');
            $table->string('applicant_photo_path');
            $table->string('father_photo_path');
            $table->string('mother_photo_path');
            $table->string('guardian_photo_path');

            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admissions');
    }
};
