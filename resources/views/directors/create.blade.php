@extends('master')
@section('content')

@if(count($errors) > 0)
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li> {{$error}} </li>
        @endforeach
    </ul>
</div>
@endif
<br>
<div class="offset-3 col-6">
    <h1> Agregue su Director favorito </h1>
    <form class="form-group" action="" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="first_name">Nombre</label>
        <input type="text" name="first_name" value=" {{old("first_name")}} " class="form-control" >
    </div>
    <div class="form-group">
        <label for="last_name">Apellido</label>
        <input type="text" name="last_name" value=" {{old("last_name")}} " class="form-control" >
    </div>
    <div class="form-group">
        <label for="rating">Puntaje</label>
        <input type="text" name="rating" value=" {{old("rating")}} " class="form-control" >
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" value="Agregar">
    </div>
    </form>
</div>

@endsection
