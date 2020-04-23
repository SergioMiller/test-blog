@extends('layouts.main')

@section('page-title') Edit post: {{ $post->name }} @endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('post.update', $post->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="post-name">Name</label>
                    <input type="text"
                           name="name"
                           class="form-control @if($errors->has('name')) {{'is-invalid' }} @endif"
                           id="post-name"
                           value="{{ old('name', $post->name) }}">
                    @if($errors->has('name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('content') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="post-content">Content</label>
                    <textarea name="content" class="form-control @if($errors->has('content')) {{'is-invalid' }} @endif"
                              id="category-description">{{ old('content', $post->content) }}</textarea>
                    @if($errors->has('content'))
                        <div class="invalid-feedback">
                            {{ $errors->first('content') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="post-upload_file">File</label>
                    <input type="file" name="upload_file" id="post-upload_file"
                           class="@if($errors->has('upload_file')) {{'is-invalid' }} @endif">
                    @if($errors->has('upload_file'))
                        <div class="invalid-feedback">
                            {{ $errors->first('upload_file') }}
                        </div>
                    @endif
                </div>
                <button class="btn btn-success">Save</button>
            </form>
        </div>
    </div>
@endsection
