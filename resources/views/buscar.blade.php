@extends('template')

@section('content')


<div class="col-md-12 text-center" style="margin-top: 0px; margin-bottom: 20px; padding:30px; border-bottom: solid 2px #d8d8d8; border-top: solid 1px #d8d8d8;"><h3><b> <span class="glyphicon glyphicon-" aria-hidden="true"></span> RESULTADO</b></h3></div>



<div class="container">

    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>id</th>
                <th>NOME</th>
                <th>IDADE</th>
                <th><b>CPF</b></th>
                <th>FONE</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        
        </thead>
        <tbody>
            <!-- RECEBENDO O OBJETO PACIENTE DO CONTROLLER E FAZENDO UM FOREACH -->
                
                @php
                    // CRIANDO UMA VARIAVEL RETORNANDO O 'SINTOMA' DO 'PACIENTE' EM 'RELSINTOMAS' 
                    // AQUI A VARIÁVEL '$pacientes' ESTÁ VINDO DO CONTROLADOR
                    // $sintoma = $buscar->find($buscar->id)->relSintomas;
                  
                @endphp
                <tr> 
                    <td>{{$buscar->id}}</td>
                    <td>{{$buscar->nome}}</td>
                    <td>{{$buscar->idade}}</td>
                    <td><b>{{$buscar->cpf}}</b></td>
                    <td>{{$buscar->fone}}</td>
                    <td>

                    </td>
                    <td><a href='{{url("inicio/$buscar->id")}}' class="btn btn-default btn-sm " ><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Prontuário</a></td>
                    <td><a href='{{url("editar/$buscar->id/edit")}}' class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> editar</a></td>
                    <td>
                            
                        <form method="post" action='{{url("excluir/$buscar->id")}}'>
                                {{method_field('DELETE')}}
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Excluir</button>
                        </form>

                    </td>
                </tr>
               
       
        </tbody>

    </table>

    
</div>




@endsection