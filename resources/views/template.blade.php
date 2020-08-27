<?php
use App\Pacientes;
$paci = new Pacientes();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Softmidia - Laravel</title>
    <link rel="stylesheet" href="front/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{url('front/bootstrap/css/bootstrap.min.css')}}">
    <link href="http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic" rel="stylesheet" type="text/css">
    


   <script>

        //DEIXAR APENAS OS NUMEROS DO CPF
        
        document.addEventListener('DOMContentLoaded', function () {
        console.log('DOM carregou');
        
        var cpfusuario = document.getElementById('cpf');
        
        if (!cpfusuario) return;
        
        var mascaraCPFTimeout;
        
        cpfusuario.addEventListener('input', function () {
            if (mascaraCPFTimeout) clearTimeout(mascaraCPFTimeout);
            
            mascaraCPFTimeout = setTimeout(mascaraCPF, 200);
        });
        
        function mascaraCPF()
        {
            var cpf = cpfusuario.value.replace(/\D+/, ''); //Remove tudo que não for numero

            //cpf = cpf.replace(/^(\d{3})(\d{3})(\d{3})(\d{1,4}).*$/, '$1.$2.$3-$4');      
            cpfusuario.value = cpf;
        }
    });


</script> 


</head>
<body>

    <div style="padding: 20px; background-color:#d6d6d6">
        <div class="container text-center">
            <a href='{{url("inicio")}}' class="btn btn-default"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> INICIO</a>
            <!-- <a href='{{url("inicio/create")}}' class="btn btn-primary">CADASTRAR</a> -->
            <!-- <a href='{{url("sintomas/create")}}' class="btn btn-success">CADASTRAR SINTOMAS</a> -->
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModalSintomas">
                CADASTRAR SINTOMAS
            </button>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                CADASTRAR PACIENTE
            </button>
            <a href="{{url('/buscarp')}}" type="button" class="btn btn-default" >
            <span class="glyphicon glyphicon-search" aria-hidden="true"></span> 
                BUSCAR            
            </a>
    
  
        </div>
    </div>

    <!-- 
        SE EXISTIR ESSA VARIAVEL "ERRORS" (NÃO CRIEI) 
        COLOQUEI AQUI PARA SEREM VISTOS EM QUALQUER PARTE DO SITE
        É USADO POR QUALQUE FORMULARIO
    -->
    @if(isset($errors) && count($errors)>0)

        <div class="alert alert-danger text-center" style="margin-bottom:-3px" role="alert">

            <!-- // VARIÁVEL ERRORS É UM ARRAY -->
            @foreach($errors->all() as $erro)
                
                <b>{{$erro}} </b>

            @endforeach

        </div>

    @endif
    

    <!-- ESSE AVISO APRECE QUANO É DIGITADO UM CPF NÃO ENCONTRADO NA BUSCA 
    ESTOU ENVIANDO DO CONTROLADOR -->
    <div class="text-center">
        @if(isset($aviso))
            <div class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-alert" aria-hidden="true"></span> <b>{{$aviso}} Espere...</b></div>
            <meta http-equiv="refresh" content="2; url={{url("/buscarp")}}">
        
        @endif
    </div>


    <!-- YIELD = PRODUÇÃO -->
    @yield('content')


    
        


    <!-- MODAL CADASTRAR PACIENTE ************************************************************ -->
    <form method="post"  action="{{url('/inicio')}}" id="formularioCad" name="formularioCad" enctype="multipart/form-data">

        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">CADASTRAR PACIENTE</h4>
            </div>
            <div class="modal-body" style="padding: 50px">

                @csrf

                <div class="form-group">
                    <label for="exampleInputEmail1">Nome</label>
                    <input type="text" id="nome" name="nome" class="form-control" id="exampleInputEmail1" placeholder="Nome"  required>
                </div>

                <div class="form-group" style="padding:15px">
                    <label for="exampleInputPassword1" class="col-sm-2 ">Idade</label>
                    <div class="col-sm-10">
                    <input type="text" name="idade" class="form-control" id="exampleInputPassword1" placeholder="idade" required>
                    </div>
                </div>

                <div class="form-group" style="padding:15px">
                    <label for="exampleInputPassword1" class="col-sm-2 ">CPF</label>
                    <div class="col-sm-10">
                    <input type="text" id="cpf" name="cpf" class="form-control" id="exampleInputPassword1" placeholder="cpf" required>
                    </div>
                </div>

                <div class="form-group" style="padding:15px">
                    <label for="exampleInputPassword1" class="col-sm-2 ">Fone</label>
                    <div class="col-sm-10">
                    <input type="text" id="fone" name="fone" class="form-control" id="exampleInputPassword1" placeholder="fone" required>
                    </div>
                </div>

                <div class="col-md-12" >
                    <div class="form-group" >
                        <label><br>Foto</label>
                        <input name="foto" id="foto" type="file" required><br>
                    </div>
                </div>  


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                <button type="submit" name="cad_pasciente" class="btn btn-primary">CADASTRAR</button>
            </div>
            </div>
        </div>
        </div>
    </form>



    <!-- MODAL CADASTRAR SINTOMAS ********************************************************************-->
    <form method="post"  action="{{url('/sintomas')}}" id="formulario" name="formulario" >

        <div class="modal fade" id="myModalSintomas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">CADASTRAR SINTOMA(S)</h4>
            </div>
            <div class="modal-body" style="padding: 50px">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Paciente:</label>
                    <select class="form-control"  name="id_paciente" id="id_paciente">
                        @foreach($paci->all() as $paci)
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

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                <button type="submit" name="cad_pasciente" class="btn btn-primary">CADASTRAR</button>
            </div>
            </div>
        </div>
        </div>

    </form>


    
    <!-- MODAL BUSCAR ********************************************************************-->
    <form method="post"  action='{{url("/buscar")}}' class="form-inline">
        {{method_field('POST')}}
        <div class="modal fade" id="myModalBuscar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">BUSCAR PACIENTE</h4>
            </div>
            <div class="modal-body text-center" style="padding: 50px; ">
                @csrf
                <div class="form-group" style="margin-bottom:50px">
                    <label for="exampleInputName2">CPF:</label>
                    <input type="text" name="cpf" class="form-control cpf-mask" placeholder="000.000.000-00" data-mask="000.000.000-00" maxlength="11" autocomplete="off" required>
                </div>
                <BR>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                <button type="submit" name="btn_buscar" class="btn btn-primary">BUSCAR</button>
                
            </div>
            </div>
        </div>
        </div>

    </form>





    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{url('front/bootstrap/js/bootstrap.min.js')}}"></script>

    <script>
        
        $(function () {
        $('#limparsintomas').popover('show')
        })

        $(function () {
        $('#btn-editar').tooltip('show')
        })

        $(function () {
        $('#btn-excluir').tooltip('show')
        })

        $(function () {
        $('#btn-prontuario').tooltip('show')
        })



    </script>
    

</body>
</html>