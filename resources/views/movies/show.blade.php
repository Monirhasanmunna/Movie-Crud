
@extends('layouts.movies')
@section('content')
@section('button')
<a class="nav-link active btn btn-m btn-secondary my_btn" aria-current="page" href="{{route('movieList')}}">Back</a>
@endsection
<div class="">
<div class="card m-auto border p-2" style="width: 19rem; ">
  <img class="card-img-top" src="{{asset('uploads/'.$movie->poster)}}" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">{{$movie->title}}</h5>
    <p>{{$movie->genre}} | {{$movie->release_year}}</p>
  </div>
</div>
</div>

@endsection