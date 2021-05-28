<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddanswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addanswers', function (Blueprint $table) {
            $table->id();
            $table->string('survey_id')->nullable();
            $table->string('suranswer_id')->nullable();
            $table->string('addquestion_id')->nullable();
            $table->string('addanswer')->nullable();
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
        Schema::dropIfExists('addanswers');
    }
}
