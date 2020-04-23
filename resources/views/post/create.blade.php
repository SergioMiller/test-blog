@extends('layouts.main')

@section('page-title') Create post @endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="category-name">Name</label>
                    <input type="text"
                           name="name"
                           class="form-control @if($errors->has('name')) {{'is-invalid' }} @endif"
                           id="category-name"
                           placeholder="News"
                           value="{{ old('name') }}">
                    @if($errors->has('name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="post-content">Content</label>
                    <textarea name="content"
                              class="form-control @if($errors->has('content')) {{'is-invalid' }} @endif"
                              id="post-content">{{ old('content') }}</textarea>
                    @if($errors->has('content'))
                        <div class="invalid-feedback">
                            {{ $errors->first('content') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="post-upload_file">File</label>
                    <input type="file" name="upload_file" id="post-upload_file" class="@if($errors->has('upload_file')) {{'is-invalid' }} @endif">
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
