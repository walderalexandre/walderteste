<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgendarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agendars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->integer('specialty_id');
            $table->integer('professional_id');
            $table->string('name');
            $table->string('cpf');
            $table->integer('source_id');
            $table->date('birthdate');
            $table->dateTime('date_time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agendars');
    }
}
