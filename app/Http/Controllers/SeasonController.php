<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Series;
use App\Season;
use App\Episode;
use App\Genre;

class SeasonController extends Controller
{
    public function index()
    {
        $seasons=Season::all();
        return view('series.detalleSerie')->with('seasons',$seasons);
    }

    public function create($id){
        $serie = Series::find($id);
        return view('seasons.create')
                    ->with('serie',$serie);
    }
    
    public function store(Request $request){
        $reglas=[
            'number'=>'required',
            'release_date'=>'required',
            'serie_id'=>'required'
        ];

        $mensaje=[
            'el campo :attribute no puede esta vacío'
        ];

        $this->validate($request, $reglas, $mensaje);

        $serie=New Season($request->all());
        $serie->save();

        return redirect ('/series');
    }

    public function destroy($id)
    {
        $temporada=Season::find($id);
        $temporada->delete();
        return redirect('/series');
    }
}
