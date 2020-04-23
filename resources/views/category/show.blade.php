@extends('layouts.main')

@section('page-title') {{ $category->name }} @endsection

@section('content')
    <p>{{ $category->description }}</p>
    @forelse($posts as $post)
        @include('templates.post', ['post' => $post])
        {{ $posts->links() }}
    @empty
        <div class="alert alert-secondary">
            Empty
        </div>
    @endforelse
@endsection
