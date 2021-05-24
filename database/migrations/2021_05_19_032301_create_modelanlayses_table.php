<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelanlaysesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modelanlayses', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->integer('evaluation_id')->nullable();
            $table->integer('model_id')->nullable();
            $table->integer('attribute_id')->nullable();
            $table->integer('culture_id')->nullable();
            $table->string('answer')->nullable();
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
        Schema::dropIfExists('modelanlayses');
    }
}
