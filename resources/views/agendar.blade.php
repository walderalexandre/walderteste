@extends('base')

@section('main')


oieam {{ $profissional->nome }} {{ array_search($especialidade_id,$profissional-especialidades)}}


@endsection