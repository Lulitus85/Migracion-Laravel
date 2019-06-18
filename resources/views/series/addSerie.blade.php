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
    <h1 class="text-center">Agregar nueva Serie</h1>
    <form class="form-group" action="" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="titulo">Titulo</label>
            <input type="text" name="title" value="{{ old("title") }}" class="form-control">
        </div>
        <div class="form-group">
            <label for="comienzo">Comienzo</label>
            <input type="date" name="release_date" value="{{ old("release_date") }}" class="form-control">
        </div>
        <div class="form-group">
            <label for="terminacion">Terminación</label>
            <input type="date" name="end_date" value="{{ old("end_date") }}" class="form-control">
        </div>
       
        <div class="form-group">
            <label for="genero">Género</label>
            <select class="form-control" name="genre_id">
                <option value="" disabled selected>Seleccione genero</option>
                @foreach($generos as $genero)
                    @if ($genero->id == old("genre_id"))
                        <option value="{{ $genero->id }}" selected>
                        {{ $genero->name }}
                        </option>
                    @else
                        <option value="{{ $genero->id }}">
                        {{ $genero->name }}
                        </option>
                    @endif
                @endforeach
            </select>
        </div>

        
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Agregar Película">
        </div>
    </form>
</div>
@endsection
