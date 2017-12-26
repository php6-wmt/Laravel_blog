@extends('layouts.template')
@section('title', 'Edit New Blog')
@section('content')

<h1>Edit Blog</h1>

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
<form action="{{ route('Blog.update', ['blog'=>$blogEdit->id]) }}" method="post">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="put">
    <div class="form-group">
        <lable for="title">Title:</lable>
        <input type="text" name="updatedtitle" class="form-control" value="{{ $blogEdit->Title }}">
    </div>
    <div class="form-group">
        <lable for="body">Blog:</lable>
        <textarea name="updatedbody" id="" cols="2" rows="2" class="form-control">{{ $blogEdit->content }}</textarea>
    </div>
    <div>
        <input type="submit" class="btn btn-primary" value="Save changes">
        <a href="{{ route('Blog.index') }}" class="btn btn-danger float-md-right">Go Back</a>
    </div>
</form>
@endsection