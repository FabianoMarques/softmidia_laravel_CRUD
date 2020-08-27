@extends('template')

@section('content')

    <div class="col-md-12 text-center" style="margin-bottom: 20px; padding:30px; border-bottom: solid 2px #d8d8d8; border-top: solid 1px #d8d8d8;"><h3><b><span class="glyphicon glyphicon-book" aria-hidden="true"></span> PRONTUÁRIO</b></h3></div>
    
    <div class="container" style="margin-bottom:100px">
        <div class="row">
            <div class="col-md-4 text-center"> 
               
                <img src="{{url('storage/fotos/'.$paciente->foto)}}" title="{{$paciente->foto}}" width= "150px" style="padding:5px; border: solid 1px #d8d8d8">

            </div>
            <div class="col-md-4">

                @php
                    
                    use App\Pacientes;
                    $objPacientes = new Pacientes();

                    $sintomas = $objPacientes->find($paciente->id)->relSintomas;
                    
                    $num_sintomas = count($sintomas);

                    $perc = ($num_sintomas * 100) / 14;

                    if($perc <= 10){ $status = "<mark style='background-color:green; color:white'>SINTOMAS INSUFICIENTES</mark>"; }
                    if($perc > 11 and $perc <= 30){ $status = "<mark style='background-color:orange; color:white'>POTENCIAL INFECTADO</mark>"; }
                    if($perc > 31 and $perc <= 59){ $status = "<mark style='background-color:orange; color:white'>POTENCIAL INFECTADO</mark>"; }
                    if($perc > 60){ $status = "<mark style='background-color:red; color:white'>POSSIVEL INFECTADO</mark>"; }

                    
                @endphp


                <h4><b>Dados do paciente:</b></h4>
                <hr style="margin-bottom:5px; margin-top: 15px">
                
                <a href='{{url("editar/$paciente->id/edit")}}' type="submit" class="btn btn-link btn-sm" style="margin-left:-10px" id="" data-container="body" data-toggle="popover" data-placement="right" data-content="Isso excluirá os sintomas atuais."><span class='glyphicon glyphicon-refresh' aria-hidden='true'></span> Atualizar dados</a>

                <h5 style="margin-left:30px;">
                    #: <b>{{$paciente->id}}</b><br><br>
                    Nome: <b>{{$paciente->nome}}</b><br><br>
                    Idade: <b>{{$paciente->idade}}</b><br><br>
                    CPF: <b>{{$paciente->cpf}}</b><br><br>
                    Fone: <b>{{$paciente->fone}}</b><br><br>
                </h5>
                <h4 style="margin-bottom:30px; margin-top:30px">
                    <b>Sintomas:</b>
                    <hr style="margin-bottom:5px; margin-top: 15px">
                    <form method="post" action='{{url("excluir_sintomas/$paciente->id")}}'>
                        {{method_field('DELETE')}}
                        @csrf
                        <button type="submit" class="btn btn-link btn-sm" style="margin-left:-10px" id="limparsintomas" data-container="body" data-toggle="popover" data-placement="right" data-content="Isso excluirá os sintomas atuais."><span class='glyphicon glyphicon-refresh' aria-hidden='true'></span> Atualizar sintomas</button>
                    </form>
                    

                </h4>
                <h5 style="margin-left:30px;">
                  
                    @foreach($sintomas as $sint)
                        <span class='glyphicon glyphicon-ok' aria-hidden='true'></span> {{$sint->sintomas}}.<br><br>
                    @endforeach

                </h5>
            </div>
            <div class="col-md-4">

                @php
                    echo "<h5><span class='glyphicon glyphicon-play-circle' aria-hidden='true'></span> Quadro geral:  <b>".number_format($perc, 2, ',', ' ')."%</b> </h5> ";
                    echo "<hr>";
                    echo "<h5><span class='glyphicon glyphicon-play-circle' aria-hidden='true'></span> Qtdo. Sintomas: <b>".$num_sintomas."</b></h5>";
                    echo "<hr>";
                    echo "<h5><span class='glyphicon glyphicon-play-circle' aria-hidden='true'></span> Status: <b>".$status."</b></h5>";
                    echo "<hr>";
                    if(isset($sint->updated_at)){ echo $data = "<h5><span class='glyphicon glyphicon-play-circle' aria-hidden='true'></span> Atualizado em: <b>$sint->updated_at</b></h5>"; }
                   
                    
                    
                  
                    
                  


                @endphp
            
            </div>
        </div>
        
    </div>

    

@endsection