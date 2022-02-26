@extends('layouts.movies')
@section('content')

@section('button')
<a class="nav-link active btn btn-m btn-secondary my_btn" aria-current="page" href="{{route('movieList')}}">Back</a>
@endsection

<div class="col-sm-12 col-m-4 col-lg-6 m-auto card border p-2">
    <form action="" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title"  class="@error('title') is-invalid @enderror">
            @error('title')
            <strong class="alert text-danger">{{ $message }}</strong>
            @enderror
        </div>

        <div class="mb-3">
            <label for="genre">Genre</label>
            <select class="form-select" id="genre"  name="genre"  class="@error('genre') is-invalid @enderror">
                <option selected value="">Genre</option>
                @if($genres)
                @foreach($genres as $genre)
                <option  value="{{$genre}}">{{$genre}}</option>
                @endforeach
                @endif
            </select>
            @error('genre')
            <strong class="alert text-danger">{{ $message }}</strong>
            @enderror
        </div>

        <div class="mb-3">
            <label for="release_year" class="form-label">Release Year</label>
            <input type="text" class="form-control" id="release_year" name="release_year"  class="@error('release_year') is-invalid @enderror">
            @error('release_year')
            <strong class="alert text-danger">{{ $message }}</strong>
            @enderror
        </div>

        <div class="mb-3">
            <label for="release_year" class="form-label"></label>
            <input type="file" class="form-control-file" id="poster" name="image"  class="@error('image') is-invalid @enderror">
        </div>
        
        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection