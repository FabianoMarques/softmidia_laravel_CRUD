<?php

namespace App\Http\Controllers;

use App\Http\Requests\BuscarRequest;
use App\Pacientes;
use Illuminate\Http\Request;


class BuscarController extends Controller
{

    public function buscarpagina()
    {
        
        return view('buscarp');

    }



    public function buscar(BuscarRequest $request)
    {
        
        $buscar = Pacientes::where('cpf', $request->cpf)->first();

        if( $buscar){

            return view('buscar', [
                        'buscar' => $buscar
                    ]);

        }else{

            return view('buscarp', [

                'aviso' => 'CPF não encontrado!'
            ]);
        }
       

    }



}