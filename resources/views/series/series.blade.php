@extends('master')
@section('content')

<div class="offset-2 col-6">
    <h1>Series!</h1>
    <ul>
        @foreach($series as $serie)
        <li><a href="/series/ {{$serie->id}} "> {{$serie->title}} </a></li>
        @endforeach
    </ul>
    
    <a href=" {{URL('series/add')}} " class="btn btn-info"> Agregar Serie </a>
</div>



@endsection