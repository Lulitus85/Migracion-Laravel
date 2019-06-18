@extends('master') 
@section('content')

@if(count($errors) > 0)
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<br>
<div class="offset-3 col-6">
    <h1 class="text-center">Agregar nuevo Actor</h1>
    <form class="form-group" action="" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="first_name" value="{{ old("first_name") }}" class="form-control">
        </div>
        <div class="form-group">
            <label for="apellido">Apellido</label>
            <input type="text" name="last_name" value="{{ old("last_name") }}" class="form-control">
        </div>
        <div class="form-group">
            <label for="puntaje">Puntaje</label>
            <input type="text" name="rating" value="{{ old("rating") }}" class="form-control">
        </div>
        
        <div class="form-group">
            <label for="genero">Película Favorita</label>
            <select class="form-control" name="favorite_movie_id">
                <option value="" disabled selected>Seleccione película</option>
                @foreach($movies as $movie)
                    @if ($movie->id == old("movie_id"))
                        <option value="{{ $movie->id }}" selected>
                        {{ $movie->title }}
                        </option>
                    @else
                        <option value="{{ $movie->id }}">
                        {{ $movie->title }}
                        </option>
                    @endif
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Agregar Actor">
        </div>
    </form>
</div>
@endsection
