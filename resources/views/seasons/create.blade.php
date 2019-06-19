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
    <h1 class="text-center">Agregar nueva Temporada</h1>
    
    <h2 class="text-center"> {{$serie->title}} </h2>
    
    
    <form class="form-group" action="" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
                <label for="id">Código de serie</label>
                <input type="text" name="serie_id" value="{{ $serie->id }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="numero">Numero</label>
            <input type="text" name="number" value="{{ old("number") }}" class="form-control">
        </div>
        <div class="form-group">
            <label for="titulo">Titulo</label>
            <input type="text" name="title" value="{{ old("title") }}" class="form-control">
        </div>
        <div class="form-group">
            <label for="comienzo">Comienzo</label>
            <input type="date" name="release_date" value="{{ old("release_date") }}" class="form-control">
        </div>
        <div class="form-group">
            <label for="terminacion">Terminacion</label>
            <input type="date" name="end_date" value="{{ old("end_date") }}" class="form-control">
        </div>

        

        
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Agregar Película">
        </div>
    </form>
</div>
@endsection
