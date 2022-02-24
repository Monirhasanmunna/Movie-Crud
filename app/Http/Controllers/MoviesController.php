<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;


class MoviesController extends Controller
{
    public function index()
    {
        return view('movies.index');
    }

    public function addmovie()
    {

        $genres=['Action','Drama','Comedy','Thriller'];

        return view('movies.addmovies',compact('genres'));

    }

    public function store(Request $request)
    {

        // image validation //

        $request->validate([
            'title' => 'required|max:255',
            'genre' => 'required',
            'release_year' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imageName = '';
        if($request->image){
        $imageName= time().'.'.$request->file('image')->getClientOriginalExtension();
        $request->image->move(public_path('uploads'),$imageName);
        }

        // data store to database //

        $data = new Movie;

        $data->title = $request->title;
        $data->genre = $request->genre;
        $data->release_year = $request->release_year;
        $data->poster =$imageName;
        $data->save();

        return redirect()->route('addmovie')->with('status','Movies has been added succesfully');
    }
}
