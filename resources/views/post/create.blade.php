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
                <div class="categories" style="margin-bottom: 25px;">
                    @foreach($categories as $category)
                        <div class="form-group form-check @if($errors->has('category_ids')) is-invalid @endif"
                             style="margin-bottom: 0;">
                            <input type="checkbox"
                                   name="category_ids[]"
                                   class="form-check-input"
                                   id="category-{{ $category->id }}"
                                   value="{{ $category->id }}"
                                    @if(in_array($category->id, old('category_ids', []))) checked @endif>
                            <label class="form-check-label" for="category-{{ $category->id }}">
                                {{ $category->name }}
                            </label>
                        </div>
                    @endforeach
                    @if($errors->has('category_ids'))
                        <div class="invalid-feedback">
                            {{ $errors->first('category_ids') }}
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
