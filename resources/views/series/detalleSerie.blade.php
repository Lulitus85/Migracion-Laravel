@extends('master')
@section('content')

<div class="offset-2 col-6">
<h1>Serie: {{$serie->title}} </h1>

<hr>

<ul>
    <li>
      <h4><b> Género:</b> <a href="/genres/ {{$serie->genre->id}} ">{{$serie->genre->name}} </a> </h4> 
    </li>
</ul>
<h4> <b>Comienzo:</b> {{$serie->release_date}} </h4>
<h4> <b>Comienzo:</b> @if($serie->end_date !=null) 
                {{$serie->release_date}} 
                @else {{'en curso'}}
                @endif
            </h4>
<br>
<hr>
<h4><b>Temporadas</b></h4>
<ul> {{-- por qué no puedo acceder directamente a la variable $seasons si el SeasonController esta llamando a esta vista desde el index() --}}
    @foreach($serie->seasons as $season)
    <li><a href="/seasons/ {{$season->id}} "> <b>Temporada:</b> {{$season->number}} </a></li>
    <form method="POST" action="{{$season->id}}">
            {{method_field('DELETE')}}
            @csrf
        <button class = "btn btn-danger btn-sm" type="submit" value="BORRAR REGISTRO">
            Eliminar Temporada
        </button>
        {{-- <a class="btn btn-danger" href="/movies">Eliminar Pelicula</a> --}}
        </form>
    @endforeach

</ul>

<a href="/seasons/add/ {{$serie->id }}" class="btn btn-info"> Agregar Temporada </a>  

<br>
<br>
<a href="/series">Volver</a>
</div>
@endsection