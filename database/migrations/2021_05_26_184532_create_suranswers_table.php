<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuranswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suranswers', function (Blueprint $table) {
            $table->id();
            $table->string('survey_id')->nullable();            
            $table->string('user_name')->nullable();
            $table->string('company')->nullable();
            $table->string('city')->nullable();
            $table->string('company_area')->nullable();
            $table->string('company_level')->nullable();
            $table->string('comany_job')->nullable();
            $table->string('survey_date')->nullable();
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
        Schema::dropIfExists('suranswers');
    }
}
