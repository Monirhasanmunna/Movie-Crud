@extends('layouts.movies')
@section('content')

<div class="col-sm-12 col-m-4 col-lg-6 m-auto card border p-2">
    <form action="{{route('movies.create')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title">
        </div>

        <div class="mb-3">
            <label for="genre">Genre</label>
            
            <select class="form-select" id="genre"  name="genre">
            <option selected value="Genre">Genre</option>
                @if($genres)
                @foreach($genres as $genre)
                <option value="{{ $genre }}">{{ $genre }}</option>
                @endforeach
                @endif
            </select>
        </div>

        <div class="mb-3">
            <label for="release_year" class="form-label">Release Year</label>
            <input type="text" class="form-control" id="release_year" name="release_year">
        </div>

        <div class="mb-3">
            
            <input type="file" class="form-control-file" id="poster" name="poster">
        </div>
        
        
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
</div>




@endsection