@extends('layouts.viewPostTemplate')
@section('title', 'Show Post')
@section('content')
        &nbsp;
   <div class="card">
       <h2 class="card-title"> {{ $blog->Title }}</h2>
       <p class="card-body">{{ $blog->content }}</p>
   </div>

        <a href="{{ route('home') }}" class="btn btn-danger float-md-right">Go Back</a>


@endsection