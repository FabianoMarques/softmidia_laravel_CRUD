@extends('template')

@section('content')

<!-- 
@php
    // GET DA BUSCA - DEU CERTO MAS NÃO ESTOU USANDO...
    if(isset($_GET['btn_buscar'])){
        $id= $_GET['id'];
        if(!empty($id)){
            echo "<meta http-equiv='refresh' content='1; url=buscar/$id'>";
        }else{ echo 'digite um cpf';}

    }

@endphp 
-->
   

<!-- <h2 class="text-center">PACIENTES</h2> -->
<div class="col-md-12 text-center" style="margin-top: 0px; margin-bottom: 20px; padding:30px; border-bottom: solid 2px #d8d8d8; border-top: solid 1px #d8d8d8;"><h3><b> <span class="glyphicon glyphicon-" aria-hidden="true"></span> PACIENTES</b></h3></div>

<div class="container">

    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>id</th>
                <th>NOME</th>
                <th>IDADE</th>
                <th>CPF</th>
                <th>FONE</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        
        </thead>
        <tbody>
            <!-- RECEBENDO O OBJETO PACIENTE DO CONTROLLER E FAZENDO UM FOREACH -->
            @foreach($paciente as $pacientes)        
                @php
                    // CRIANDO UMA VARIAVEL RETORNANDO O 'SINTOMA' DO 'PACIENTE' EM 'RELSINTOMAS' 
                    // AQUI A VARIÁVEL '$pacientes' ESTÁ VINDO DO CONTROLADOR
                    $sintoma = $pacientes->find($pacientes->id)->relSintomas;
                  
                @endphp
                <tr> 
                    <td>{{$pacientes->id}}</td>
                    <td>{{$pacientes->nome}}</td>
                    <td>{{$pacientes->idade}}</td>
                    <td>{{$pacientes->cpf}}</td>
                    <td>{{$pacientes->fone}}</td>
                    <td>

                    <!-- // SINTOMA DO PACIENTE 
                    @foreach($sintoma as $sin)
                        {{$sin->sintomas}}
                    @endforeach  -->

                    </td>
                    <td ><a href='{{url("inicio/$pacientes->id")}}' class="btn btn-default btn-sm"  id="btn-prontuario" title="Mais informações" data-toggle="tooltip" data-placement="top"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Prontuário</a></td>
                    <td><a href='{{url("editar/$pacientes->id/edit")}}' class="btn btn-primary btn-sm" id="btn-editar" title="Editar paciente" data-placement="top"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> editar</a></td>
                    <td>
                            
                        <form method="post" action='{{url("excluir/$pacientes->id")}}'>
                                {{method_field('DELETE')}}
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm" id="btn-excluir" title="Excluir paciente" data-placement="top"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Excluir</button>
                        </form>

                    </td>
                </tr>
               
            @endforeach
        </tbody>

    </table>
</div>





@endsection
