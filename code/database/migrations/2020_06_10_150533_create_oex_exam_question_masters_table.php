<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOexExamQuestionMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oex_exam_question_masters', function (Blueprint $table) {
            $table->increments('id');
            $table->string('exam_id')->nullable();
            $table->string('question')->nullable();
            $table->string('ans')->nullable();
            $table->string('options')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('oex_exam_question_masters');
    }
}
