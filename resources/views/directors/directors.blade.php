@extends('master')

@section('content')

<div class="offset-2 col-6">

    <h1>Directores</h1>
    <ul>
    @foreach($directors as $director)
    <li><a href="/directors/ {{$director->id}} "> {{$director->first_name . " " . $director->last_name}} </a></li>
    @endforeach
    </ul>

<a href="{{URL('directors/create')}}" class="btn btn-info"> Agregar Director </a>



</div>

@endsection