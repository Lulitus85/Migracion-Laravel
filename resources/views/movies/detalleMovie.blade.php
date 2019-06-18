@extends('master') 
@section('content')
<br>
<div class="offset-1">
    <h2>{{ $movie->title }}</h2>
    <h4>Director: {{ $movie->director->first_name . " " . $movie->director->last_name}} </h4>
    <hr>
    <h4>Duración: {{ $movie->length }}</h4>
    <h4>Fecha de estreno: {{ $movie->release_date }}</h4>
    <h4>Rating: {{ $movie->rating }}</h4>
    <h4>Premios: {{ $movie->awards }}</h4>
    <h4>Genero: {{ $movie->genre->name }}</h4>
    
    <br>
    <a class="btn btn-warning" href="{{ "/movies/$movie->id/update" }}">Editar Pelicula</a>
    <br>
    <br>
    <form method="POST" action="{{$movie->id}}">
        {{method_field('DELETE')}}
        @csrf
    <button class = "btn btn-danger btn-md" type="submit" value="BORRAR REGISTRO">
        Eliminar Película
    </button>
    {{-- <a class="btn btn-danger" href="/movies">Eliminar Pelicula</a> --}}
    </form>
    <br>
    <br>
    <a href="/movies">Volver a Peliculas</a>
</div>


@endsection