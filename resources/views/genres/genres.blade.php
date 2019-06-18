@extends('master')

@section('content')

<div class="offset-2 col-6">
    <h1>Listado de Generos</h1>
    <ul>
        @foreach($genres as $genre)
        <li><a href="/genres/{{ $genre->id }}">{{ $genre->name }}</a></li>
        @endforeach
    </ul>

<a href="{{URL('genres/add')}}" class="btn btn-info"> Crear Género </a>

</div>
@endsection