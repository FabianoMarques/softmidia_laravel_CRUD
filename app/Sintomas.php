<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sintomas extends Model
{
    protected $table = "sintomas";
    protected $fillable = ['id_paciente', 'sintomas'];

    public function relPacientes()
    {
        // ESTAVA DANDO UM PROBLEMA NA 'CONSULTA' ERA HASONE, PRECISEI INVERTER
        // FICOU UM SINTOMA (REGISTRO) PARA CADA PASCICENTE (REGISTRO)
        // hasMany('related', 'foreignkey de related', 'localkey' )
        return $this->hasOne(Pacientes::class, 'id', 'id_paciente');
    }

    
}
