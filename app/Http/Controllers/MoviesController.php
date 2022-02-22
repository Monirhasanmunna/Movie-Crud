<?php

namespace App\Http\Controllers;

use App\Model;
use App\Movie;
use Illuminate\Http\Request;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('movies.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genres=['Action','Drama','Comedy','Thriller'];

        return view('movies.addmovies',compact('genres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'genre' => 'required',
            'release_year' => 'required',
            'poster' => 'required|iamge|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imageName = '';
        if($request->poster){

            $imageName= time() . '.' . $request->poster->extention();
            $request->poster->move(public_path('uploads'),$imageName);

        }

        $data = new Movie;

        $data->title = $request->title;
        $data->genre = $request->genre;
        $data->release_year = $request->release_year;
        $data->poster = $request->$imageName;

        $data->save();

        return redirect()->route('movies.create')->with('status','Movies has been added succesfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model  $model
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model  $model
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model  $model
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model  $model
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //
    }
}
