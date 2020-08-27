@extends('template')

@section('content')
<style>
    .sombra{
            background-color: #F23005;
            -webkit-box-shadow: 5px 7px 12px rgba(50, 50, 50, 0.3);
            -moz-box-shadow:    5px 7px 12px rgba(50, 50, 50, 0.3);
            box-shadow:         5px 7px 12px rgba(50, 50, 50, 0.3);
    }
</style>
<body style="background-color:#F5F5F5">
    
<div class="col-md-12">
    <div class="col-md-4"></div>
    <div class="col-md-4 img-rounded sombra" style="border: solid 1 #d8d8d8; background-color:white; margin-top:100px; padding:40px">
        <div class="text-center">

            <div class="text-center" style="margin-bottom:30px; color: #778899"><h2><b>Busca por CPF</b></h2></div>

            <form method="post"  action='{{url("/buscar")}}' class="form-inline">
                        
                @csrf
                <div class="input-group">
                    <input type="text" name="cpf" id="cpf" class="form-control " placeholder="000.000.000-00"  required>
                    <span class="input-group-btn ">
                        <button type="submit" name="btn_buscar" class="btn btn-primary " type="button">BUSCAR</button>
                    </span>
                </div><!-- /input-group -->
                <p style="margin:15px; color:#778899"><small><span class="glyphicon glyphicon-alert" aria-hidden="true"></span> DIGITE APENAS OS NÚMEROS</small></p>
                        
            </form>

        </div>
        
    </div>
    <div class="col-md-4"></div>
</div>




</body>

@endsection