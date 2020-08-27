@extends('template')

@section('content')

    <!-- ESTOU USANDO O MESMO FORMULÁRIO DE CADATRAR PARA EDITAR ******************************************************** -->

    <div class="text-center" style="margin-bottom: 20px; padding:30px; border-bottom: solid 2px #d8d8d8; border-top: solid 1px #d8d8d8;"><h3><b> <span class="glyphicon glyphicon-" aria-hidden="true"></span> @if(isset($paciente)) EDITAR PACIENTE @else CADASTRAR PACIENTE @endif</b></h3></div>
    
    <div class="container">

        <div class="col-md-2">
            
            <img src="{{url('storage/fotos/'.$paciente->foto)}}" title="{{$paciente->foto}}" width= "150px" style="padding:5px; border: solid 1px #d8d8d8">
        
        </div>

         
        <div class="col-md-10">

            <!-- // SE EXISTIR ESSA VARIAVEL "ERRORS" (NÃO CRIEI)
            @if(isset($errors) && count($errors)>0)

                <div class="alert alert-danger text-center" role="alert">
                
                    VARIÁVEL ERRORS É UM ARRAY 
                    @foreach($errors->all() as $erro)
                        
                        {{$erro}} 

                    @endforeach

                </div>

            @endif -->
          
            <form method="post"  action='{{url("/update/$paciente->id")}}' id="formularioEdit" name="formulario" enctype="multipart/form-data">
                @method('PUT')

                @csrf

                <div class="form-group">
                    <label for="exampleInputEmail1">Nome</label>
                    <input type="text" id="nome" name="nome" class="form-control" id="exampleInputEmail1" placeholder="Nome" value="{{$paciente->nome ?? ''}}" >
                </div>

                <div class="form-group" style="padding:15px">
                    <label for="exampleInputPassword1" class="col-sm-2 ">Idade</label>
                    <div class="col-sm-10">
                    <input type="text" name="idade" class="form-control" id="exampleInputPassword1" placeholder="idade" value="{{$paciente->idade ?? ''}}">
                    </div>
                </div>

                <div class="form-group" style="padding:15px">
                    <label for="exampleInputPassword1" class="col-sm-2 ">CPF</label>
                    <div class="col-sm-10">
                    <input type="text" id="cpf" name="cpf" class="form-control" id="exampleInputPassword1" placeholder="cpf" value="{{$paciente->cpf ?? ''}}">
                    </div>
                </div>

                <div class="form-group" style="padding:15px">
                    <label for="exampleInputPassword1" class="col-sm-2 ">Fone</label>
                    <div class="col-sm-10">
                    <input type="text" id="fone" name="fone" class="form-control" id="exampleInputPassword1" placeholder="fone" value="{{$paciente->fone ?? ''}}">
                    </div>
                </div>

                <div class="col-md-12" >
                    <div class="form-group" style="padding:15px">
                        <label>Foto</label>
                        <input name="foto" id="foto" type="file" value="{{$paciente->foto ?? ''}}">
                    </div>
                </div>  

                <div class="text-center">
                    <button type="submit" name="cad_pasciente" class="btn btn-primary">ATUALIZAR</button>
                </div>

            </form>

        </div>


    </div>




@endsection
