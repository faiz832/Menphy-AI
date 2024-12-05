<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateDiagnosisSystemTables extends Migration
{
    public function up()
    {
        // Create symptoms table
        Schema::create('symptoms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->timestamps();
        });

        // Modify questions table
        Schema::table('questions', function (Blueprint $table) {
            $table->dropForeign(['mental_disorder_id']);
            $table->dropColumn('mental_disorder_id');
            $table->foreignId('symptom_id')->constrained();
            $table->float('cf_expert', 3, 2); // CF pakar
        });

        // Modify rules table
        Schema::table('rules', function (Blueprint $table) {
            $table->dropColumn('condition');
            $table->json('symptoms'); // Store symptom IDs
        });
    }

    public function down()
    {
        Schema::dropIfExists('symptoms');

        Schema::table('questions', function (Blueprint $table) {
            $table->foreignId('mental_disorder_id')->constrained();
            $table->dropForeign(['symptom_id']);
            $table->dropColumn('symptom_id');
            $table->dropColumn('cf_expert');
        });

        Schema::table('rules', function (Blueprint $table) {
            $table->text('condition');
            $table->dropColumn('symptoms');
        });
    }
}
