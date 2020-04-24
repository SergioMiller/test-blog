@extends('layouts.main')

@section('page-title') {{ $category->name }} @endsection

@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $category->name }}</li>
        </ol>
    </nav>
@endsection

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
