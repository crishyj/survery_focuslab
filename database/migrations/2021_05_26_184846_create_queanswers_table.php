<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQueanswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('queanswers', function (Blueprint $table) {
            $table->id();
            $table->string('survey_id')->nullable();
            $table->string('suranswer_id')->nullable();
            $table->string('question_id')->nullable();
            $table->string('que_answer')->nullable();
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
        Schema::dropIfExists('queanswers');
    }
}
