<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('assessment_sessions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('competency_id')->constrained()->onDelete('cascade');
            $table->tinyInteger('current_difficulty')->default(3); // 1-5, mulai medium
            $table->integer('score')->nullable(); // 0-100, diisi setelah selesai
            $table->integer('mastery_before')->nullable(); // snapshot mastery sebelum assessment
            $table->integer('mastery_after')->nullable();  // snapshot mastery setelah assessment
            $table->enum('status', ['in_progress', 'completed'])->default('in_progress');
            $table->timestamp('started_at')->useCurrent();
            $table->timestamp('completed_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('assessment_sessions');
    }
};
