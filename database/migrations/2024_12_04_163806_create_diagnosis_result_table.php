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
        Schema::create('diagnosis_results', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->json('answers'); // Contoh: {Q1:yes, Q2:no, Q3:yes}
            $table->json('scores'); // Contoh: {PTSD: 0.8, Anxiety: 0.6}
            $table->unsignedBigInteger('final_diagnosis_id')->nullable(); // Diagnosis tertinggi
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diagnosis_result');
    }
};
