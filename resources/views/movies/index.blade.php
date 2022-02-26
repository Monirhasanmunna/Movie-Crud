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
  @if($deletemsg=Session::get('deletemsg'))
  <div class="alert alert-primary text-center">{{$deletemsg}}</div>
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
      <th scope="col" ></th>
    </tr>
  </thead>
  
  @if($movies)
  <tbody>
  @foreach($movies as $movie)
    <tr class="align-middle">
      <th >{{1+$i++}}</th>
      <td><img style="width:60px;" src="{{asset('uploads/'.$movie->poster)}}" class="img-thumbnail "></td>
      <td >{{$movie->title}}</td>
      <td >{{$movie->genre}}</td>
      <td >{{$movie->release_year}}</td> 
      <td><a class="btn btn-sm btn-info" href="{{route('show',$movie->id)}}">Show</a></td>
      <td><a class="btn btn-sm btn-primary" href="{{route('edit',$movie->id)}}">Edit</a></td>
      <td><a class="btn btn-sm btn-danger" href="{{route('delete',$movie->id)}}"onclick="return confirm('Are you sure you want to delete this item?')">Delete</a></td>
      
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