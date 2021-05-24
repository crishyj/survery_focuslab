<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surveys', function (Blueprint $table) {
            $table->id();
            $table->integer('client_id')->nullable();
            $table->integer('project_id')->nullable();
            $table->text('description')->nullable();
            $table->date('start')->nullable();
            $table->date('end')->nullable();
            $table->string('culturedim_check')->nullable();
            $table->string('criticalfact_check')->nullable();
            $table->string('balancecard_check')->nullable();
            $table->string('name')->nullable();
            $table->string('name_check')->nullable();
            $table->string('company')->nullable();
            $table->string('company_check')->nullable();            
            $table->string('city')->nullable();
            $table->string('city_check')->nullable();
            $table->string('companyarea')->nullable();
            $table->string('companyarea_check')->nullable();
            $table->string('companylevel')->nullable();
            $table->string('companylevel_check')->nullable();
            $table->string('companyjob')->nullable();
            $table->string('companyjob_check')->nullable();
            $table->date('surveydate')->nullable();
            $table->string('surveydate_check')->nullable(); 
            $table->string('code')->nullable();
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
        Schema::dropIfExists('surveys');
    }
}
