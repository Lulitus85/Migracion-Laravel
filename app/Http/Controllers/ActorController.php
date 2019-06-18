<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Actor;
use App\Movie;

class ActorController extends Controller
{
    public function index(){
        $actors=Actor::all();
        return view('actors.actors')->with('actors',$actors);
    }

    public function create(){
        // $movies=Movie::all();
         $movies = Movie::all();
         return view('actors.addActor')
                 ->with('movies',$movies);
     }

     public function store(Request $request){
         $reglas = [
             'first_name'=>'required',
             'last_name'=>'required',
             'rating'=>'required',
             'favorite_movie_id'=>'required'
         ];

         $message=[
             'el campo :attribute es obligatorio'
         ];

         $this->validate($request,$reglas,$message);

         $actor=new Actor($request->all());

         $actor->save();
         return redirect('/actors');

     }

     public function show($id){
         $actor = Actor::find($id);
         //dd($actor->favorite->title); esta en el modelo Actor con un belongsTo.
         return view('actors.show')->with('actor',$actor);

    }

    public function edit($id)
    {
        // Paso 1, buscar el actor:
        $actors = Actor::find($id);
        // Paso 2, por si hubiera que cambiarlo, envio las pelis tambien
        $peliculafavorita = Movie::all();
        // Paso 3, devolver la vista CON el actor y las pelis:
        return view('actors.editActor')
            ->with('actor', $actors)
            ->with('peliculas', $peliculafavorita);
        // De aca, ir al archivo Blade con la vista porque se complica!
    }

    public function update(Request $request, $id)
    {
        // Primero que nada, nos auto-robamos la validacion:
        $rules = [
            'first_name' => 'required',
            'last_name' => 'required',
            'rating' => 'required',
            'favorite_movie_id' => 'required',
        ];

        $messages = [
            'required' => 'el campo :attribute es obligatorio',
        ];
        
        $this->validate($request, $rules, $messages);

        // La logica de hacer un update es la siguiente:
        // Tenemos el personaje A, que se llama Request, y el personaje B, que se 
        // llama Movie.
        // El personaje Request trae data que puede ser nueva o no, y el personaje Movie
        // se para adelante y dice "compara con todo lo que tengo yo". Si el valor de un 
        // campo de Request es igual a lo que ya tiene Movie, no hay cambio. Si es diferente,
        // Movie atrapa el cambio y lo guarda, borrando el dato que tenia antes.

        // En codigo:
        $actor = Actor::find($id);

        // Explicacion con el primer campo/atributo
         $actor->first_name = $request->input('first_name') !== $actor->first_name ? $request->input('first_name') : $actor->first_name;
         // El titulo va a ser igual a lo que salga de este if ternario.
         // El if ocurre antes del signo de pregunta, "lo que llega de Request, NO ES igual a lo que movie ya tiene?"
         // si NO es igual, pone lo que llego, si es igual, queda como esta.
         $actor->last_name = $request->input('last_name') !== $actor->last_name ? $request->input('last_name') : $actor->last_name;
         $actor->rating = $request->input('rating') !== $actor->rating ? $request->input('rating') : $actor->rating;
        
         $actor->favorite_movie_id = $request->input('favorite_movie_id') !== $actor->favorite_movie_id ? $request->input('favorite_movie_id') : $actor->favorite_movie_id;

         //una vez que terminamos el proceso anterior, simplemente hacemos:
         $actor->save();

         // y vamos a ver los cambios:
         return redirect("/actors/" . $actor->id);

    }

    public function destroy($id)
    {
        $actor=Actor::find($id);
        $actor->delete();
        return redirect('/actors');
    }

}