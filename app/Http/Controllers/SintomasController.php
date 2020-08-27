<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sintomas;
use App\Pacientes;

class SintomasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    private $objPacientes;
    private $objSintomas;
    private $sintomas="";

    public function __construct()
    {
        $this->objPacientes = new Pacientes();
        $this->objSintomas = new Sintomas();
        
    }


    public function index()
    {
        //$sint = $this->objSintomas->all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pac = $this->objPacientes->all();
        return view('create_sintomas', compact('pac'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        foreach($request->sintomas as $sintomas){
            
             $this->objSintomas->create([
                'id_paciente' => $request->id_paciente,
                'sintomas' => $sintomas

            ]);
       
        }

        //return redirect()->back();
        return redirect('inicio');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       // SUPER SIMPLES!!!!!
       $this->objSintomas->where('id_paciente', $id)->delete();
        
       // OUTRA MANEIRA DE RETORNA UMA VIEW QUE É PELO CONTROLADOR DELA.
       return redirect()->action('SintomasController@create');


    }
}
