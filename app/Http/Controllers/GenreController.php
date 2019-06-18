<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Genre;

class GenreController extends Controller
{
    public function index(){
        $genres=Genre::all();
        return view('genres.genres')->with('genres',$genres);
    }

    public function create(){
        return view('genres.addGenre');
    }

    public function store(Request $request){
        $rules=[
            'name'=>'required',
            'ranking'=>'required'
        ];

        $message=[
            'el :attribute es obligatorio'
        ];

        $this->validate($request, $rules, $message);

        $genero = new Genre($request->all());

        $genero->save();
        return redirect('/genres');
    }

    public function showMovie($id){
         $genre = Genre::find($id);
         return view('genres.show')->with('genre',$genre);
        
    }




}
