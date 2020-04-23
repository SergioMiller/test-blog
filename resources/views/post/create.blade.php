@extends('layouts.main')

@section('page-title') Create post @endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('post.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="post-name">Name</label>
                    <input type="email" class="form-control" id="post-name">
                </div>
                <div class="form-group">
                    <label for="post-content">Content</label>
                    <textarea type="email" class="form-control" id="post-content"></textarea>
                </div>
                <div class="form-group">
                    <label for="post-file">File</label>
                    <input type="file" id="post-file">
                </div>
                <button class="btn btn-success">Save</button>
            </form>
        </div>
    </div>
@endsection
