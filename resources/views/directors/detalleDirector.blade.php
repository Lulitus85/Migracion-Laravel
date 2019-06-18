@extends('master') 
@section('content')
<br>
<div class="offset-1">
    <h2>{{ $director->first_name . " " . $director->last_name }}</h2>
    <br>
    <hr>
    <br>
    <h4>Rating: {{ $director->rating }}</h4>
    <br>
    <a class="btn btn-warning" href="{{ "/directors/$director->id/update" }}">Editar Director</a>
    <br>
    <br>
    
    <form method="POST" action="{{$director->id}}">
        {{method_field('DELETE')}}
        @csrf
    <button class = "btn btn-danger btn-md" type="submit" value="BORRAR REGISTRO">
        Eliminar Director
    </button>
    {{-- <a class="btn btn-danger" href="/movies">Eliminar Pelicula</a> --}}
    </form>
    <br>
    <br>
    <a href="/directors">Volver a Directores</a>
</div>


@endsection