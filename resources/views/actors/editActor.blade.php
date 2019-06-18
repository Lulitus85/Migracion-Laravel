
@extends('master') 
@section('content')


{{-- VISTA PARA EDITAR PELICULAS! --}}


<div class="col-7 offset-1">
    <h3 class="">Editando datos del actor:</h3>
    <h2>{{ $actor->first_name . " " . $actor->last_name }}</h2>
    {{-- Muestreo de errores si los hubiera --}}
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form class="" action="" method="POST" enctype="multipart/form-data">

    {{ method_field('PATCH') }}
    {{-- IMPORTANTE: hay que agregar este metodo (method_field) ya que HTML no reconoce si le pones 
        "PATCH" en el method de un form. Solo reconoce POST y GET. Laravel nos facilita la vida y nos da
        este metodo para que el flujo se de sin problemas.  --}}

    @csrf
        {{-- Fijense que en cada VALUE de los inputs, ya van a tener cargados los datos de la pelicula seleccionada --}}
        <div class="form-group">
            <label for="Nombre">Nombre</label>
            <input type="text" name="first_name" value="{{ $actor->first_name }}" class="form-control">
        </div>
        <div class="form-group">
            <label for="Apellido">Apellido</label>
            <input type="text" name="last_name" value="{{ $actor->last_name }}" class="form-control">
        </div>
       <div class="form-group">
            <label for="Rating">Rating</label>
            <input type="text" name="rating" value="{{ $actor->rating }}" class="form-control">
        </div>
       
        <div class="form-group">
            <label for="peliFavorita">Película Favorita</label>
            {{-- Aca hacemos un parate, fijense que gracias a las relaciones, puedo acceder al genero actual
                de esta pelicula, y la dejo como SELECTED a esa option del Select. --}}
            <select class="form-control" name="favorite_movie_id">
                <option value="{{ $actor->favorite->id }}" selected>{{ $actor->favorite->title }}</option>
                {{-- Aun asi, si necesitara cambiar el genero, el foreach es de GENEROS directamente, 
                    que es una variable del tipo Collection que los llego del backend, con un array de 
                    objetos del tipo Genre a los cuales puedo pedirles id y name --}}
            @foreach($peliculas as $pelicula)
                <option value="{{ $pelicula->id }}">{{ $pelicula->title }}</option>
            @endforeach
        </select>
        </div>

        <div class="form-group">
            <input type="submit" class="btn btn-danger" value="Confirmar Cambios">
        </div>
    </form>
</div>
@endsection