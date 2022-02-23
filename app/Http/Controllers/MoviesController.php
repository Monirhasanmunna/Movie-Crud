<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Movie;


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
        $request->validate([
            'title' => 'required|max:255',
            'genre' => 'required',
            'release_year' => 'required',
           // 'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);


       // dd($validate);

        // $imageName = '';
        // if($request->image){
        //     $imageName= time() . '.' . $request->image->extention();
        //     $request->image->move(public_path('uploads'),$imageName);
        // }

        $data = new Movie;

        $data->title = $request->title;
        $data->genre = $request->genre;
        $data->release_year = $request->release_year;
       // $data->poster = $request->$imageName;

        $data->save();

        return redirect()->route('addmovie')->with('status','Movies has been added succesfully');
    }
}
