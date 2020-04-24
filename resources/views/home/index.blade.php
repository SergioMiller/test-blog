@extends('layouts.main')

@section('page-title') All posts @endsection

@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Home</li>
        </ol>
    </nav>
@endsection

@section('content')

    <div class="row">
        <div class="col-md-4">
            <a href="{{ route('category.create') }}" class="btn btn-primary btn-sm" style="margin-bottom: 15px;">Add category</a>
            @forelse($categories as $category)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="{{ route('category.show', $category->id) }}">
                        {{ $category->name }}
                    </a>
                    <div class="action-group">
                        <a href="{{ route('category.edit', $category->id) }}" class="btn btn-primary btn-sm">
                            edit
                        </a>
                        <form action="{{ route('category.destroy', $category->id) }}" method="POST" class="d-inline-block">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger btn-sm">delete</button>
                        </form>
                    </div>
                </li>
            @empty
                <div class="alert alert-secondary">
                    Empty
                </div>
            @endforelse
        </div>
        <div class="col-md-8">
            <a href="{{ route('post.create') }}" class="btn btn-primary btn-sm" style="margin-bottom: 15px;">Add post</a>
            @foreach($posts as $post)
                @include('templates.post', ['post' => $post])
            @endforeach
            {{ $posts->links() }}
        </div>
    </div>

@endsection
