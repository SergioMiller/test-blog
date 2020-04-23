@extends('layouts.main')

@section('page-title') Edit post: {{ $post->name }} @endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="#">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="post-name">Name</label>
                    <input type="email" class="form-control" id="category-name" value="{{ $post->name }}">
                </div>
                <div class="form-group">
                    <label for="post-content">Content</label>
                    <textarea type="email" class="form-control" id="category-description">{{ $post->content }}</textarea>
                </div>
                <button class="btn btn-success">Save</button>
            </form>
        </div>
    </div>
@endsection
