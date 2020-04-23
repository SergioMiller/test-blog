@extends('layouts.main')

@section('page-title') {{ $post->name }} @endsection

@section('content')
    {{ $post->content }}
@endsection
