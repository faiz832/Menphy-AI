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
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mental_disorder_id')->constrained()->onDelete('cascade');
            $table->text('question_text');
            $table->float('cf_never')->default(0);
            $table->float('cf_rarely')->default(0.25);
            $table->float('cf_sometimes')->default(0.5);
            $table->float('cf_often')->default(0.75);
            $table->float('cf_very_often')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
