@extends('layouts.main')

@section('page-title') {{ $post->name }} @endsection

@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $post->name }}</li>
        </ol>
    </nav>
@endsection

@section('content')
    @if($post->fileIsImage)
        <img src="{{ asset($post->fileStoragePath) }}" alt="{{ $post->name }}">
    @else
        <p>
            Download file: <a href="{{ $post->fileStoragePath }}" download="">{{ $post->fileName }}</a>
        </p>
    @endif
    <p class="text-dark">{{ $post->created_at }}</p>

    <div class="post-content">
        {{ $post->content }}
    </div>
    <add-comment-component :post_id="{{ $post->id }}" :comments='@json($post->comments)'></add-comment-component>
@endsection
