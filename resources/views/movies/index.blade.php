@extends('layouts.movies')
@section('content')

@section('button')
<a class="nav-link active btn btn-m btn-secondary my_btn" aria-current="page" href="{{route('addmovie')}}">Add New</a>
@endsection
<div class="d-flex">
  <div class="m-auto mb-3">
    <h3>Movies List</h3>
  </div>
</div>
@if($status = Session::get('status'))
  <div class="alert alert-success text-center">{{$status}}</div>
  @endif
<div class="card border p-3">
<table class="table">
  <thead class="table_head">
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Banner</th>
      <th scope="col">Title</th>
      <th scope="col">Genre</th>
      <th scope="col">Release Year</th>
    </tr>
  </thead>
  
  @if($movies)
  <tbody>
  @foreach($movies as $movie)
    <tr>
      <th class="align-middle">{{1+$i++}}</th>
      <td><img style="width:50px;" src="{{asset('uploads/'.$movie->poster)}}" class="img-thumbnail "></td>
      <td class="align-middle">{{$movie->title}}</td>
      <td class="align-middle">{{$movie->genre}}</td>
      <td class="align-middle">{{$movie->release_year}}</td>
    </tr>
    @endforeach
  </tbody>
  @endif
</table>
<div class="d-flex">
  <div class="m-auto">
      {!! $movies->links() !!}
  </div>
</div>

</div>

@endsection