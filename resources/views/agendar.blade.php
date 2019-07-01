@extends('base')

@section('main')
<div class="row">
<div class="col-sm-8 offset-sm-2">

<h5>Preencha seus dados</h5>
{{$request->inputProfissionalNome}} - 
{{$request->inputEspecialidadeNome}}

<form enctype="multipart/form-data" method="post" onSubmit="return false" id="formAgendar">

@csrf
<input type="hidden" name="inputEspecialidadeId" id="inputEspecialidadeId" value="{{$request->especialidade_id}}">
<input type="hidden" name="inputProfissionalId" id="inputProfissionalId" value="{{$request->inputProfissionalId}}">


<div class="form-row">
<div class="form-group col-md-6">
<input type="text" class="form-control" id="inputNome" name="inputNome" placeholder="Nome completo">
</div>
<div class="form-group col-md-6">
<select id="inputOrigem" name="inputOrigem" class="form-control">
<option value="">Como conheceu?</option>
@foreach($response as $resp)

<option value="{{ $resp->origem_id }}"> {{ $resp->nome_origem }}


@endforeach
</select>
</div>
</div>
<div class="form-row">
<div class="form-group col-md-6">
<input type="text" class="form-control" id="inputNascimento" name="inputNascimento" placeholder="Nascimento""> 
</div>
<div class="form-group col-md-6">
<input type="text" class="form-control" id="inputCPF" name="inputCPF" placeholder="CPF""> 
</div>
</div>
  
<button id="submitButton" type="submit" class="btn btn-primary" onClick="this.disabled=true;$('#formAgendar').submit()">Solicitar horários</button>
<button id="voltar" type="reset" class="btn btn-secundary" onClick="window.location='especialidade'">Voltar</button>
</form>

</div>
</div>

<div id="mensagem">

</div>
@endsection


@section('scripts')
<script type="text/javascript">

$(document).ready(function(){
	$("#inputCPF").mask("000.000.000-00");
	$("#inputNascimento").mask("00/00/0000");

	$('#formAgendar').on('submit', function (e) {

		e.preventDefault(e);
		
		$.ajax({
	        url: "confirmarAgendamento" ,
	        method: 'POST',
	        data: $('#formAgendar').serialize(),
	        success: function(data) {
	        	$('#submitButton').attr("disabled", false);
	            alert(data['mensagem']);
		            
	        },
	        error: function(request, status, error){
	        	alert('Falha ao processar a requisição');
		        $('#submitButton').attr("disabled", false);
	        }
	    });
	});

});
    </script>
@endsection
