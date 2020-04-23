@extends('layouts.main')

@section('page-title') Edit category: {{ $category->name }} @endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('category.update', $category->id) }}" method="post">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="category-name">Name</label>
                    <input type="email" class="form-control" id="category-name" placeholder="News" value="{{ $category->name }}">
                </div>
                <div class="form-group">
                    <label for="category-description">Description</label>
                    <textarea type="email" class="form-control" id="category-description">{{ $category->description }}</textarea>
                </div>
                <button class="btn btn-success">Save</button>
            </form>
        </div>
    </div>
@endsection
