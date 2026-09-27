<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('assessment_questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('competency_id')->constrained()->onDelete('cascade');
            $table->text('question_text');
            $table->json('options'); // ["A. ...", "B. ...", "C. ...", "D. ..."]
            $table->string('correct_answer'); // "A", "B", "C", or "D"
            $table->tinyInteger('difficulty_level'); // 1-5
            $table->text('explanation')->nullable(); // penjelasan jawaban
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('assessment_questions');
    }
};
