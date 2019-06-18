@extends('master')
@section('content')

<div class="offset-2 col-6">
    <h1>Listado de Actores</h1>
    <ul>
        @foreach($actors as $actor)
        <li><a href="/actors/ {{$actor->id}} "> {{$actor->first_name . " " . $actor->last_name}} </a></li>
        @endforeach
    </ul>

    <a href=" {{URL('actors/add')}} " class="btn btn-info"> Agregar actor </a>

</div>

@endsection