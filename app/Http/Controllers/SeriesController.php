<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Series;
use App\Genre;

class SeriesController extends Controller
{
    public function index(){
        $series = Series::all();
        return view('series.series')->with('series',$series);
    }

    public function create(){
        $generos = Genre::all();
        return view('series.addSerie')->with('generos',$generos);
    }
    
    public function store(Request $request){
        $reglas=[
            'title'=>'required',
            'release_date'=>'required',
            'genre_id'=>'required'
        ];

        $mensaje=[
            'el campo :attribute no puede esta vacío'
        ];

        $this->validate($request, $reglas, $mensaje);

        $serie=New Series($request->all());
        $serie->save();

        return redirect ('/series');
    }

    public function show($id){
        $serie = Series::find($id);
        return view('series.detalleSerie')->with('serie',$serie);
    }
    
}
