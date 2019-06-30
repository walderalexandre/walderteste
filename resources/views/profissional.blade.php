<div class="album py-5 bg-light">
<div class="container">
<h5>Total encontrado {{$total}}</h5>
	<div class="row">

@foreach($response as $resp)

<div class="col-md-4">
<div class="card mb-4 shadow-sm">
<svg class="bd-placeholder-img card-img-top" width="100%" height="80" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">{{$resp->nome}}</text></svg>
<div class="card-body">
  <p class="card-text"> {{$resp->conselho}} - {{$resp->documento_conselho}}</p>
  <div class="d-flex justify-content-between align-items-center">
    <div class="btn-group">
      <button type="button" class="btn btn-sm btn-outline-secondary" onClick="$('#inputProfissionalNome').val('{{$resp->nome}}');$('#inputProfissionalId').val('{{$resp->profissional_id}}');$('#inputEspecialidadeNome').val(document.getElementById('especialidade').options[document.getElementById('especialidade').selectedIndex].text);$('#formAgendar').submit()">Agendar</button>
    </div>
  </div>
</div>
</div>
</div>
  
@endforeach
	</div>
</div>
</div>
