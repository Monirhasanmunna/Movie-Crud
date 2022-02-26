@extends('layouts.movies')
@section('content')

@section('button')
<a class="nav-link active btn btn-m btn-secondary my_btn" aria-current="page" href="{{route('movieList')}}">Movies</a>
@endsection

@if($update=Session::get('update'))
  <div class="alert alert-primary text-center">{{$update}}</div>
  @endif

<div class="col-sm-12 col-m-4 col-lg-6 m-auto card border p-2">
    <form action="{{route('update',$post->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        <!-- <input type="text" hidden class="form-control" id="title" name="id" value="{{$post->id}}"> -->
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{$post->title}}">
        </div>

        <div class="mb-3">
            <label for="genre">Genre</label>
            <select class="form-select" id="genre"  name="genre">
                <option selected value="{{$post->genre}}">{{$post->genre}}</option>
                @if($genres)
                @foreach($genres as $genre)
                <option  value="{{$genre}}">{{$genre}}</option>
                @endforeach
                @endif
            </select>
        </div>

        <div class="mb-3">
            <label for="release_year" class="form-label">Release Year</label>
            <input type="text" class="form-control" id="release_year" name="release_year" value="{{$post->release_year}}" >
        </div>

        <div class="mb-3">
            <input type="file" class="form-control-file" id="poster" name="image" value="{{$post->poster}}">
        </div>
        
        <!-- <a class="btn btn-primary btn-sm" href="{{$post->id}}">Update</a> -->
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

@endsection