<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pacientes extends Model
{
    protected $table = "pacientes";
    protected $fillable = ['nome', 'idade', 'cpf', 'fone', 'foto'];

    public function relSintomas()
    {
        // ESTAVA DANDO UM PROBLEMA NA 'CONSULTA' ERA 'HASMANY' PRECISEI 'INVERTER'
        // FICOU UM SINTOMA (REGISTRO) PARA CADA PASCICENTE (REGISTRO)
        // hasMany('related', 'foreignkey de related', 'localkey' )
        return $this->hasMany(Sintomas::class, 'id_paciente', 'id');

    }


}

