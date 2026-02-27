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
        Schema::table('documents', function (Blueprint $table) {
            if (!Schema::hasColumn('documents', 'user_id')) {
                $table->unsignedBigInteger('user_id')->after('id');
            }
            if (!Schema::hasColumn('documents', 'file_name')) {
                $table->string('file_name')->after('user_id');
            }
            if (!Schema::hasColumn('documents', 'file_path')) {
                $table->string('file_path')->after('file_name');
            }
            if (!Schema::hasColumn('documents', 'type')) {
                $table->string('type')->after('file_path');
            }
            if (!Schema::hasColumn('documents', 'status')) {
                $table->string('status')->default('Pending')->after('type');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('documents', function (Blueprint $table) {
            //
        });
    }
};
