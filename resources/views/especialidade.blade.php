@extends('base')

@section('main')

<div class="row">
<div class="col-sm-8 offset-sm-2">
  <h1 class="display-5">Selecione a especialidade</h1>
  <form enctype="multipart/form-data" method="post" action="agendar" id="formAgendar">
  @csrf
  <input type="hidden" name="inputEspecialidadeNome" id="inputEspecialidadeNome" value="">
  <input type="hidden" name="inputProfissionalId" id="inputProfissionalId" value="">
  <input type="hidden" name="inputProfissionalNome" id="inputProfissionalNome" value="">
  <div class="form-group">
  <select name="especialidade_id" id="especialidade" class="form-control">
  	<option value="false">Selecione a especialidade
@foreach($response as $resp)
    <option value="{{ $resp->especialidade_id }}">{{ $resp->nome }}
@endforeach
  </select>
  </div>
  </form>
</div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">

$(document).ready(function(){
$("#especialidade").change(function(){
  if ($(this).val() != 'false' ) {
    $.ajax({
        url: "{{ url('/retornaProfissionalPorEspecialidade') }}" ,
        method: 'GET',
        data: {especialidade_id : $(this).val()},
        success: function(data) {
            $('#profissional').html(data);
        }
    });

  } else {
	  $('#profissional').html('');
      
  }
    });
    
});
</script>
@endsection
