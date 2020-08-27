<?php

namespace App\Http\Controllers;

use App\Http\Requests\PacienteRequest;
use App\Pacientes;
use App\Sintomas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PacientesController extends Controller
{
   
    private $objPacientes;
    private $objSintomas;

    public function __construct()
    {
        $this->objPacientes = new Pacientes();
        $this->objSintomas = new Sintomas();
        
    }

    public function index()
    {

        // ENVIANDO PARA A VIEW (INDEX) TODOS OS PACIENTES
        $paciente = $this->objPacientes->all()->sortBy('nome');

        //$sintomas = $this->objSintomas->all();
        return view('index', compact('paciente'));
        
        // TESTANDO A CLAUSULA WHERE
        // $pac = Pacientes::where('id', '=','1')->first();
        // TESTANDO O RELACIONAMENTO
        //dd($this->objPacientes->find(1)->relSintomas);

        // TESTANDO OUTRAS RELAÇÕES
        // $id_paciente ='2';
        // $sintomas = $this->objPacientes->find($id_paciente)->relSintomas;
        // dd($sintomas);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function create()
    {
        // PASSEI TODOS OS PACIENTE PARA CADASTRAR COM OS SINTOMAS
       /*  $paci = $this->objPacientes->all();
        return view('create', compact('paci'));  */

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
    */

    public function store(PacienteRequest $request)
    {
        // NÃO ESTOU USANDO ESSA VALIDAÇÃO DE CPF (FUNCIONA BEM)
        // ESTOU USANDO UMA CLASSE PARA VALIDAR "\App\Utils\CpfValidation.php"
        // E REGISTRANDO EM "AppServiceProvider.php"
        // $cpf = $this->validaCPF($request->cpf);
        
        // if($cpf){

            if($request->hasFile('foto')&& $request->file('foto')->isValid()){

                // ANTES DE VIR AQUI PRECISEI
                // 1. ALTERAR O ARQUIVO "FILESYSTEMS.PHP" EM "CONFIG";
                // 2. CRIAR UM LINK SIMBOLICO PARA "STOREGE/APP/PUBLIC" COM "PHP ARTISAN STOREGE:LINK"

                // CRIANDO UM NOME PARA O ARQUIVO DA IMAGEM
                $nome_foto = "foto_".$request->cpf.".";
                $extensao = $request->foto->extension();
                $nome_final = $nome_foto.$extensao;

                // ENVIANDO O ARQUIVO
                $upload = $request->foto->storeAS('fotos', $nome_final);

            }

            $this->objPacientes->create([
                'nome' => $request->nome,
                'idade' => $request->idade,
                'cpf' => $request->cpf,
                'fone' => $request->fone,
                'foto' => $nome_final

            ]);

            return Redirect('inicio');


        // }else{

        //     //echo "CPF inválido";
        //     return redirect()->back();

        // }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
    */

    public function show($id)
    {
        $paciente = Pacientes::where('id', $id)->first();

        //ENVIANDO DADOS SEM O 'COMPACT' APENAS POR UM ARRAY
        return view('prontuario', [
            'paciente' => $paciente
         ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
    */

    public function edit($id)
    {

        $paciente = $this->objPacientes->find($id);

        // VOU RETORNAR PAR A VIEW "CADASTRAR PACIENTE" E APROVEITAR A ESTRUTURA
        return view('create', compact('paciente'));



    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
    */

    public function update(PacienteRequest $request, $id)
    {

        if(empty($request->foto)){ 
            
            $p = Pacientes::where('id', $id)->first();
            $nome_final = $p->foto;
        
        }else{ 

            if($request->hasFile('foto') && $request->file('foto')->isValid()){

                // ANTES DE VIR AQUI PRECISEI
                // 1. ALTERAR O ARQUIVO "FILESYSTEMS.PHP" EM "CONFIG";
                // 2. CRIAR UM LINK SIMBOLICO PARA "STOREGE/APP/PUBLIC" COM "PHP ARTISAN STOREGE:LINK"
    
                // CRIANDO UM NOME PARA O ARQUIVO DA IMAGEM
                $nome_foto = "foto_".$request->cpf.".";
                $extensao = $request->foto->extension();
                $nome_final = $nome_foto.$extensao;
    
                // ENVIANDO O ARQUIVO
                $upload = $request->foto->storeAS('fotos', $nome_final);
    
            } 
           
        
        }


        // BUSCAR EM PACIENTES POR ID (WHERE) PARA ATUALIZAR
        $this->objPacientes->where(['id'=>$id])->update([
            'nome' => $request->nome,
            'idade' => $request->idade,
            'cpf' => $request->cpf,
            'fone' => $request->fone,
            'foto' => $nome_final

        ]); 

       
        return Redirect('inicio');


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
        $this->objPacientes->where('id', $id)->delete();
        
        // OUTRA MANEIRA DE RETORNA UMA VIEW QUE É PELO CONTROLADOR DELA.
        return redirect()->action('PacientesController@index');


    }



    function validaCPF($cpf) {
    
        // Extrai somente os números
        $cpf = preg_replace( '/[^0-9]/is', '', $cpf );
        
        // Verifica se foi informado todos os digitos corretamente
        if (strlen($cpf) != 11) {
            return false;
        }

        // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }

        // Faz o calculo para validar o CPF
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) {
                return false;
            }
        }
        
        return true;
    }



}

