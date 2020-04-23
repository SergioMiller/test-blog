@extends('layouts.main')

@section('page-title') All posts @endsection

@section('content')

    <div class="row">
        <div class="col-md-4">
            <a href="#" class="btn btn-primary btn-sm" style="margin-bottom: 15px;">Add category</a>
            <ul class="list-group" style="margin-bottom: 15px;">
            @foreach($categories as $category)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <a href="#">{{ $category->name }}</a>
                        <div class="action-group">
                            <a href="#" class="btn btn-primary btn-sm">edit</a>
                            <a href="#" class="btn btn-danger btn-sm">delete</a>
                        </div>

                    </li>
            @endforeach
            </ul>
        </div>
        <div class="col-md-8">
            <a href="#" class="btn btn-primary btn-sm" style="margin-bottom: 15px;">Add post</a>
            @foreach($posts as $post)
                <div class="card" style="margin-bottom: 15px;">
                    <div class="card-header">
                        {{ $post->id }}. {{ $post->name }}
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{ $post->content }}</p>
                        <a href="#" class="btn btn-success btn-sm">View</a>
                        <a href="#" class="btn btn-primary btn-sm">Edit</a>
                        <a href="#" class="btn btn-danger btn-sm">Delete</a>
                    </div>
                </div>
            @endforeach
            {{ $posts->links() }}
        </div>
    </div>

@endsection
