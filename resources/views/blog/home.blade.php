@extends('layouts.homepgtemplate')
@section('title','Blog Post Home')
@section('content')


    <div>
        <h2>Top 10 Most Recent Blog</h2>
    </div>
    &nbsp;
    @foreach( $blog as $data)
        <div class="card col-md-12">
            <h2 class="card-title">{{ $data->Title }}</h2>
            <p class="card-body">{{ $data->content }}</p>
        </div>
        <a href="{{ route('Blog.show', ['Showid'=>$data->id]) }}" class="btn btn-default float-md-right">View Post</a>
    @endforeach


@endsection