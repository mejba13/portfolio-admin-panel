@extends('mejba-theme-24.layouts.master')

@section('title', $post->title)
@section('meta_description', Str::limit($post->content, 150))

@section('content')
    <style>
        .single-post-container {
            font-family: 'Roboto', sans-serif;
            max-width: 800px;
            margin: auto;
            padding: 40px;
        }

        .post-header {
            text-align: center;
        }

        .post-header img {
            width: 100%;
            height: auto;
            border-radius: 10px;
            padding: 24px 0px;
        }

        .post-content {
            font-size: 18px;
            color: #444;
            line-height: 1.8;
        }

        .featured-image {
            width: 100%;
            max-height: 450px;
            object-fit: cover;
            border-radius: 10px;
        }

    </style>

    <div class="single-post-container">
        <div class="post-header">
            <h1>{{ $post->title }}</h1>
            <p class="post-meta">{{ $post->category->name }} | {{ $post->published_at->format('M d, Y') }} | {{ $post->author->name }}</p>
            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="featured-image">
        </div>
        <div class="post-content">
            {!! nl2br(e($post->content)) !!}
        </div>
    </div>


@endsection
