@extends('base')

@section('main')


{{$request->inputProfissionalNome}}
{{$request->inputEspecialidadeNome}}
<form>
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


@endsection


@section('scripts')
    <script type="text/javascript">

$(document).ready(function(){
        $("#inputCPF").mask('000.000.000-00', {reverse: true});

});
    </script>
@endsection
