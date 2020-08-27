<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSintomasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sintomas', function (Blueprint $table) {
            $table->increments("id");
            $table->integer("id_paciente")->unsigned(); //NÃO ASSINADO PARA A CHAVE STRANGEIRA
            //$table->integer("id_paciente")->unsigned(); //NÃO ASSINADO
            //$table->foreign("id_paciente")->references("id")->on("pacientes")->onDelete("cascade")->onUpdate("cascade");
            $table->string('sintomas');
            
            //$table->id();
            //$table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sintomas');
    }
}
