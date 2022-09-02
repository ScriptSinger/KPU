<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsumersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consumers', function (Blueprint $table) {
            $table->increments('id')->nullable();
            $table->integer('area_id', false, true);
            $table->string('personal_account')->nullable();
            $table->string('full_name')->nullable();
            $table->string('district')->nullable();
            $table->string('street')->nullable();
            $table->string('house')->nullable();
            $table->string('building')->nullable();
            $table->string('apartment')->nullable();
            $table->string('model')->nullable();
            $table->string('number')->nullable();
            $table->string('verif_date')->nullable();
            $table->string('seal')->nullable();
            $table->string('year_release')->nullable();
            $table->string('day_zone')->nullable();
            $table->string('crawl_date')->nullable();
            $table->string('reading')->nullable();
            $table->string('note')->nullable();
            $table->string('photo')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consumers');
    }
}
