@extends('layouts.main')

@section('page-title') {{ $category->name }} @endsection

@section('content')
    <p>{{ $category->description }}</p>
    @forelse($posts as $post)
        @include('templates.post', ['post' => $post])
        {{ $posts->links() }}
    @empty
        <p>Empty</p>
    @endforelse
@endsection
