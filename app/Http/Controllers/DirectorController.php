<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Director;
class DirectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $directors=Director::all();
        return view('directors.directors')->with('directors',$directors);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('directors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reglas=[
            'first_name'=>'required',
            'last_name'=>'required',
            'rating'=> 'required'
        ];

        $message=[
            'el campo :attribute es obligatorio'
        ];

        $this->validate($request, $reglas, $message);

        $director = new Director($request->all());

        $director->save();
        return redirect('/directors');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $director = Director::find($id);
        return view('directors.detalleDirector')->with('director',$director);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $director = Director::find($id);
        return view('directors.editDirector')->with('director',$director);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $reglas = [
            'first_name'=>'required',
            'last_name'=>'required',
            'rating'=>'required'
        ];

        $message = [
            'required' => 'el campo :attribute es obligatorio',
        ];

        $this->validate($request,$reglas,$message);

        $director=Director::find($id);

        $director->first_name = $request->input('first_name') !== $director->first_name ? $request->input('first_name') : $director->first_name;

        $director->last_name = $request->input('last_name') !== $director->last_name ? $request->input('last_name') : $director->last_name;

        $director->rating = $request->input('rating') !== $director->rating ? $request->input('rating') : $director->rating;

        $director->save();

        return redirect('/directors/' . $director->id);
    }



/**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $director=Director::find($id);
        $director->delete();
        return redirect('/directors');
    }
}
