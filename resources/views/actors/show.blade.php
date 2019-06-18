@extends('master') 
@section('content')
<br>
<div class="offset-1">
    <h2>{{ $actor->first_name . " " . $actor->last_name }}</h2>
    <br>
    <hr>
    <br>
    <h4>Rating: {{ $actor->rating }}</h4>
    <h4>Película Favorita: {{ $actor->favorite->title}}</h4>
    
    <br>
    <a class="btn btn-warning" href="{{ "/actors/$actor->id/update" }}">Editar Actor</a>
    <br>
    <br>
    
    <form method="POST" action="{{$actor->id}}">
        {{method_field('DELETE')}}
        @csrf
    <button class = "btn btn-danger btn-md" type="submit" value="BORRAR REGISTRO">
        Eliminar Actor
    </button>
    {{-- <a class="btn btn-danger" href="/movies">Eliminar Pelicula</a> --}}
    </form>
    <br>
    <br>
    <a href="/actors">Volver a Actores</a>
</div>


@endsection