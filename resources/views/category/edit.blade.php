@extends('layouts.main')

@section('page-title') Edit category: {{ $category->name }} @endsection

@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $category->name }}</li>
        </ol>
    </nav>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('category.update', $category->id) }}" method="post">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="category-name">Name</label>
                    <input type="text"
                           name="name"
                           class="form-control @if($errors->has('name')) {{'is-invalid' }} @endif"
                           id="category-name"
                           placeholder="News"
                           value="{{ old('name', $category->name) }}">
                    @if($errors->has('name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="category-description">Description</label>
                    <textarea name="description"
                              class="form-control @if($errors->has('description')) {{'is-invalid' }} @endif"
                              id="category-description">{{old('description',  $category->description) }}</textarea>
                    @if($errors->has('description'))
                        <div class="invalid-feedback">
                            {{ $errors->first('description') }}
                        </div>
                    @endif
                </div>
                <button class="btn btn-success">Save</button>
            </form>
        </div>
    </div>
@endsection
