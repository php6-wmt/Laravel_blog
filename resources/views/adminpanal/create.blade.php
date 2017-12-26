@extends('layouts.template')

@section('title', 'Add New Blog')

@section('content')
    <h1 align="center">Add new blog</h1>

    {{--display success message--}}
    @if(Session('success'))
        <div class="alert alert-success">
            <strong>Success:</strong>{{ Session::get('success') }}
        </div>
    @endif


    {{--print error message--}}
    @if(count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Error:</strong>

            @foreach($errors->all() as $error)
                {{ $error }}
            @endforeach
        </div>
    @endif
   &nbsp;
    <div class="col-md-offset-2 col-md-12">
        <form action="{{ route('Blog.store') }}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <lable for="title">Title:</lable>
                <input type="text" name="title" class="form-control">
            </div>
            <div class="form-group">
                <lable for="body">Blog:</lable>
                <textarea name="body" id="" cols="30" rows="10" class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ route('Blog.index') }}" class="btn btn-danger float-md-right">Go back</a>
        </form>
    </div>

@endsection