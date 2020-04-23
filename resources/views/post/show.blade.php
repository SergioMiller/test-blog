@extends('layouts.main')

@section('page-title') {{ $post->name }} @endsection

@section('content')
    @if($post->fileIsImage)
        <img src="{{ $post->file }}" alt="{{ $post->name }}">
    @else
        <p>
            Download file: <a href="{{ $post->file }}" download="">{{ $post->fileName }}</a>
        </p>
    @endif
    <p class="text-dark">{{ $post->created_at }}</p>
    {{ $post->content }}
@endsection
