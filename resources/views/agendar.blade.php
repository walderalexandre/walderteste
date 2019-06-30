@extends('base')

@section('main')
<div class="row">
<div class="col-sm-8 offset-sm-2">

<h5>Preencha seus dados</h5>
{{$request->inputProfissionalNome}}
{{$request->inputEspecialidadeNome}}

<form enctype="multipart/form-data" method="post" action="agendar" id="formAgendar">

@csrf
  <input type="hidden" name="inputEspecialidadeId" id="inputEspecialidadeNome" value="">
  <input type="hidden" name="inputProfissionalId" id="inputProfissionalId" value="">
  <input type="hidden" name="inputProfissionalNome" id="inputProfissionalNome" value="">

  <div class="form-row">
    <div class="form-group col-md-6">
      <input type="text" class="form-control" id="inputNome" placeholder="Nome completo">
    </div>
    <div class="form-group col-md-6">
      <select id="inputState" class="form-control">
        <option selected>Como conheceu?</option>
@foreach($response as $resp)

                <option value="{{ $resp->origem_id }}">
                    {{ $resp->nome_origem }}


@endforeach
      </select>
    </div>
  </div>
    <div class="form-row">
    <div class="form-group col-md-6">

    <input class="form-control" type="date" value="" id="inputNascimento" placeholder="Nascimento">

    </div>
    <div class="form-group col-md-6">
     <input type="text" class="form-control" id="inputCPF" placeholder="CPF""> 
    </div>
  </div>
  
  <button type="submit" class="btn btn-primary">Solicitar horários</button>
</form>

</div>
</div>
@endsection


@section('scripts')
    <script type="text/javascript">

$(document).ready(function(){
        $("#inputCPF").mask('000.000.000-00', {reverse: true});

});
    </script>
@endsection
