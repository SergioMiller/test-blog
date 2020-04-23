@extends('layouts.main')

@section('page-title') Create category @endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('category.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="category-name">Name</label>
                    <input type="email" class="form-control" id="category-name" placeholder="News">
                </div>
                <div class="form-group">
                    <label for="category-description">Description</label>
                    <textarea type="email" class="form-control" id="category-description"></textarea>
                </div>
                <button class="btn btn-success">Save</button>
            </form>
        </div>
    </div>
@endsection
