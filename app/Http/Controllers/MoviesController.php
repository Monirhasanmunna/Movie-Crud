<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;



class MoviesController extends Controller
{
    public function index()
    {
        //data retrive from databese
        $i=1;
        $movies = Movie::latest()->paginate(3);
        return view('movies.index',compact('movies','i'))->with('i',(request()->input('page',1)-1)*4);
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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
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

        return redirect()->route('movieList')->with('status','Movies has been added succesfully');
    }


    public function show($id)
    {
        //movie details show here //
        $movie = Movie::where('id',$id)->first();
        return view('movies.show',compact('movie'));
    }


    public function delete($id)
    {
        //Movie post delete here //
        Movie::where('id',$id)->delete();
        return redirect()->route('movieList')->with('deletemsg','Movie has been delete successfully');
    }
    

    public function edit($id)
    {
        $genres=['Action','Drama','Comedy','Thriller'];
        $post = Movie::find($id);
        
        return view('movies.edit',compact('genres','post'));

    }

    public function update(Request $request, $id)
    {
        
        // data update here //

        $imageName = '';
        if($request->image){
        $imageName= time().'.'.$request->file('image')->getClientOriginalExtension();
        $request->image->move(public_path('uploads'),$imageName);
        }

        $post = Movie::find($id);
        $post->title=$request->get('title');
        $post->genre=$request->get('genre');
        $post->release_year=$request->get('release_year');
        $post->poster = $imageName;
        $post->save();

        return back()->with('update','Movies has been Update succesfully');
    }
    
}
