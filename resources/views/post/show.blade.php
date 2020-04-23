@extends('layouts.main')

@section('page-title') {{ $post->name }} @endsection

@section('content')
    @if($post->fileIsImage)
        <img src="{{ asset($post->fileStoragePath) }}" alt="{{ $post->name }}">
    @else
        <p>
            Download file: <a href="{{ $post->fileStoragePath }}" download="">{{ $post->fileName }}</a>
        </p>
    @endif
    <p class="text-dark">{{ $post->created_at }}</p>
    {{ $post->content }}
@endsection
