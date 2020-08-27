@extends('template')

@section('content')
    <div class="text-center" style="margin-bottom: 20px; padding:30px; border-bottom: solid 2px #d8d8d8; border-top: solid 1px #d8d8d8;"><h3><b> <span class="glyphicon glyphicon-" aria-hidden="true"></span> ATUALIZAR SINTOMAS</b></h3></div>

    <div class="container">

    <form method="post"  action="{{url('/sintomas')}}" id="formulario" name="formulario" >
        @csrf

        <div class="form-group">
            <label for="exampleInputEmail1">Paciente:</label>
            <select class="form-control"  name="id_paciente" id="id_paciente">
                @foreach($pac as $paci)
                    <option value="{{$paci->id}} ">{{$paci->nome}} </option>
                @endforeach
            </select>
        </div>

        <div class="row" style="margin:30px">

            <label class="checkbox-inline">
            <input type="checkbox" name="sintomas[]"  value="Febre"> Febre
            </label>
            <label  class="checkbox-inline">
            <input type="checkbox" name="sintomas[]"  value="Coriza"> Coriza
            </label>
            <label  class="checkbox-inline">
            <input type="checkbox" name="sintomas[]"  value="Nariz Entupido"> Nariz Entupido
            </label>
            <label  class="checkbox-inline">
            <input type="checkbox" name="sintomas[]"  value="Cansaco"> Cansaco
            </label>
            <label  class="checkbox-inline">
            <input type="checkbox" name="sintomas[]"  value="tosse"> Tosse
            </label>
            <label  class="checkbox-inline">
            <input type="checkbox" name="sintomas[]"  value="Dor de cabeca"> Dor de cabeça
            </label>
            <label  class="checkbox-inline">
            <input type="checkbox" name="sintomas[]"  value="Dore no corpo"> Dore no corpo
            </label>
            <label  class="checkbox-inline">
            <input type="checkbox" name="sintomas[]"  value="Mal estar"> Mal estar
            </label>
            <label  class="checkbox-inline">
            <input type="checkbox" name="sintomas[]"  value="Dor de garganta"> Dor de garganta 
            </label>
            <label  class="checkbox-inline">
            <input type="checkbox" name="sintomas[]"  value="Dificuldade para respirar"> Dificuldade para respirar
            </label>
            <label  class="checkbox-inline">
            <input type="checkbox" name="sintomas[]"  value="Falta de paladar"> Falta de paladar
            </label>
            <label  class="checkbox-inline">
            <input type="checkbox" name="sintomas[]"  value="Falta de olfato"> Falta de olfato
            </label>
            <label  class="checkbox-inline">
            <input type="checkbox" name="sintomas[]"  value="Dificuldade de locomoção"> Dificuldade de locomoção
            </label>
            <label  class="checkbox-inline">
            <input type="checkbox" name="sintomas[]"  value="Diarréia"> Diarréia
            </label>

        </div>

        <div class="text-center">
            <button type="submit" name="cad_pasciente" class="btn btn-primary">CADASTRAR</button>
        </div>

    </form>
    </div>




@endsection
