@extends('layouts.main')

@section('page-title') Create category @endsection

@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create category</li>
        </ol>
    </nav>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('category.store') }}" method="post">
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
                    <label for="category-description">Description</label>
                    <textarea name="description"
                              class="form-control  @if($errors->has('description')) {{'is-invalid' }} @endif"
                              id="category-description">{{ old('description') }}</textarea>
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
