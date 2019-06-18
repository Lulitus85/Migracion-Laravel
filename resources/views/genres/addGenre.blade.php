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
    <h1 class="text-center">Agregar Género</h1>
    <form class="form-group" action="" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="titulo">Género</label>
            <input type="text" name="name" value="{{ old("name") }}" class="form-control">
        </div>
        <div class="form-group">
            <label for="ranking">Ranking</label>
            <input type="text" name="ranking" value="{{ old("ranking") }}" class="form-control">
        </div>

        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Agregar Película">
        </div>
    </form>
</div>
@endsection
