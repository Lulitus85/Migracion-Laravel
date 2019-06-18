@extends('master')

@section('content')

<div class="offset-2 col-6">
    <h1>Listado de Películas</h1>
    <ul>
        @foreach($movies as $movie)
        <li><a href="/movies/{{ $movie->id }}">{{ $movie->title }}</a></li>
        @endforeach
    </ul>

<a href="{{URL('movies/create')}}" class="btn btn-info"> Agregar Película </a>

</div>
@endsection