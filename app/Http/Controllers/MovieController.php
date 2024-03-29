<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use App\Genre;
use App\Director;

class MovieController extends Controller
{
    public function index(){
        $movies=Movie::all();
        return view('movies.movies')->with('movies',$movies);
    }

    public function create(){
       // $movies=Movie::all();
        $genres=Genre::all();
        $directors=Director::all();
        return view('movies.addMovie')
                ->with('genres',$genres)
                ->with('directors',$directors);
    }

    public function store(Request $request){
        $rules=[
            'title'=>'required',
            'rating'=>'required',
            'awards'=>'required',
            'release_date'=>'required',
            'length'=>'required',
            'genre_id'=>'required',
            'director_id'=>'required'
        ];

        $message=[
            'el :attribute es obligatorio'
        ];

        $this->validate($request, $rules, $message);

        $movie = new Movie($request->all());

        $movie->save();
        return redirect('/movies');
    }

    public function show($id){
        $movie = Movie::find($id);

        return view('movies.detalleMovie')->with('movie', $movie);
    }

    public function edit($id)
    {
        // Paso 1, buscar la pelicula:
        $movie = Movie::find($id);
        // Paso 2, por si hubiera que cambiarlo, envio los GENEROS tambien
        $genres = Genre::all();
        // Paso 3, devolver la vista CON la pelicula y los generos:
        return view('movies.editMovie')
            ->with('movie', $movie)
            ->with('genres', $genres);
        // De aca, ir al archivo Blade con la vista porque se complica!
    }

    public function update(Request $request, $id)
    {
        // Dejo este dd comentado para ir viendo los cambios!
        //dd($request->all());
        // Primero que nada, nos auto-robamos la validacion:
        $rules = [
            'title' => 'required',
            'rating' => 'required',
            'awards' => 'required',
            'length' => 'required',
            'release_date' => 'date|required',
            'genre_id' => 'required',
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
        $movie = Movie::find($id);

        // Explicacion con el primer campo/atributo
         $movie->title = $request->input('title') !== $movie->title ? $request->input('title') : $movie->title;
         // El titulo va a ser igual a lo que salga de este if ternario.
         // El if ocurre antes del signo de pregunta, "lo que llega de Request, NO ES igual a lo que movie ya tiene?"
         // si NO es igual, pone lo que llego, si es igual, queda como esta.
         $movie->rating = $request->input('rating') !== $movie->rating ? $request->input('rating') : $movie->rating;
         $movie->awards = $request->input('awards') !== $movie->awards ? $request->input('awards') : $movie->awards;
         $movie->length = $request->input('length') !== $movie->length ? $request->input('length') : $movie->length;
         $movie->release_date = $request->input('release_date') !== $movie->release_date ? $request->input('release_date') : $movie->release_date;
         $movie->genre_id = $request->input('genre_id') !== $movie->genre_id ? $request->input('genre_id') : $movie->genre_id;

         //una vez que terminamos el proceso anterior, simplemente hacemos:
         $movie->save();

         // y vamos a ver los cambios:
         return redirect("/movies/" . $movie->id);

    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movie=Movie::find($id);
        $movie->delete();
        return redirect('/movies');
    }


}
