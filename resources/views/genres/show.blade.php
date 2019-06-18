@extends('master')
@section('content')

<div class="offset-2 col-6">
<h1>Películas del Género: {{$genre->id}} </h1>
<ul>
@foreach($genre->movies as $movie)
    <li>
        <a href="/movies/ {{$movie->id}} "> {{$movie->title}} </a>
    </li>
@endforeach

</ul>
<br>
<hr>
<br>
<h1>Series del Género: {{$genre->id}} </h1>
<ul>
@foreach($genre->series as $serie)
    <li>
        <a href="/series/ {{$serie->id}} "> {{$serie->title}} </a>
    </li>
@endforeach

</ul>

<a href="/genres">Volver</a>
</div>
@endsection
