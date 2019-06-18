@extends('master')
@section('content')

<div class="offset-2 col-6">

    <h1> Editar Director:  {{$director->first_name . " " . $director->last_name}}  </h1>

    @if(count($errors)>0)
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li> {{$error}} </li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="" method="POST" enctype="multipart/form-data">
    {{method_field('PATCH')}}
    @csrf
    <div class="form-group">
        <label for="nombre"> Nombre </label>
        <input type="text" name="first_name" value=" {{$director->first_name}} " class="form-control">
    </div>
    <div class="form-group">
        <label for="apellido"> Apellido </label>
        <input type="text" name="last_name" value=" {{$director->last_name}} " class="form-control">
    </div>
    <div class="form-group">
        <label for="rating"> Rating </label>
        <input type="text" name="rating" value=" {{$director->rating}} " class="form-control">
    </div>

    <div class="form-group">
            <input type="submit" class="btn btn-danger" value="Confirmar Cambios">
        </div>
    
    </form>

</div>

@endsection
