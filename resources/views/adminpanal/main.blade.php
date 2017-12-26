@extends('layouts.template')

@section('title','Admin Panel')

@section('content')
    <h1>Admin Panel</h1>
    <a href="{{ route('Blog.create') }}" class="btn btn-primary float-md-right">Add New Blog</a>
    <table class="table">
        <thead>
            <th>id</th>
            <th>title</th>
            <th>Body</th>
            <th>Edit</th>
            <th>Delete</th>
        </thead>
        <tbody>
            @foreach($displayBlog as $data)
                <tr>
                    <th>{{ $data->id }}</th>
                    <td>{{ $data->Title }}</td>
                    <td>{{ $data->content }}</td>
                    <td><a href="{{ route('Blog.edit',['blog'=>$data->id]) }}" class="btn btn-primary">Edit</a></td>
                    <td>
                        <form action="{{ route('Blog.destroy',['blog'=>$data->id]) }}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="delete">
                            <input type="submit" class="btn btn-danger" value="Delete">
                        </form>
                    </td>
                </tr>

            @endforeach

        </tbody>
    </table>
@endsection