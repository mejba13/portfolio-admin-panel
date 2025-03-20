@extends('mejba-theme-24.layouts.master')

@section('title', $category->name . ' - Blog')
@section('meta_description', 'Explore blog posts in ' . $category->name . ' category on Mejba.me.')

@section('content')

    <style>
        nav {
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.05);
            /* Light subtle shadow */
            background: white;
            position: relative;
            z-index: 10;
        }
        .blog-header {
            text-align: center;
            padding: 40px 0;
            background: linear-gradient(135deg, #38d39f, #38a4d3);
            color: white;
            font-size: 32px;
            font-weight: bold;
        }

        .blog-container {
            max-width: 1100px;
            margin: auto;
            padding: 40px 15px;
        }

        .post-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 25px;
            margin-top: 20px;
        }

        .post-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease-in-out;
        }

        .post-card:hover {
            transform: translateY(-5px);
            box-shadow: 0px 6px 14px rgba(0, 0, 0, 0.15);
        }

        .post-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .post-content {
            padding: 20px;
        }

        .post-title {
            font-size: 20px;
            font-weight: bold;
            color: #333;
            margin-bottom: 10px;
        }

        .post-meta {
            font-size: 14px;
            color: #777;
            margin-bottom: 10px;
        }

        .post-excerpt {
            font-size: 16px;
            color: #555;
            line-height: 1.6;
        }

        .read-more {
            display: inline-block;
            margin-top: 12px;
            padding: 10px 18px;
            border-radius: 8px;
            background: linear-gradient(135deg, #38d39f, #38a4d3);
            color: white;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease-in-out;
        }

        .read-more:hover {
            transform: scale(1.05);
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.15);
        }

        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 30px;
        }

        .pagination a {
            padding: 8px 15px;
            margin: 0 5px;
            background: #f1f1f1;
            border-radius: 6px;
            text-decoration: none;
            color: #333;
            transition: all 0.3s ease-in-out;
        }

        .pagination a:hover {
            background: linear-gradient(135deg, #38d39f, #38a4d3);
            color: white;
        }

        .pagination .active {
            background: linear-gradient(135deg, #38d39f, #38a4d3);
            color: white;
        }
    </style>

    <div class="blog-header">
        {{ $category->name }} Blog Posts
    </div>

    <div class="blog-container">
        @if ($posts->count())
            <div class="post-grid">
                @foreach ($posts as $post)
                    <div class="post-card">
                        <a href="{{ route('blog.show', $post->slug) }}">
                            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}">
                        </a>
                        <div class="post-content">
                            <h2 class="post-title">
                                <a href="{{ route('blog.show', $post->slug) }}" style="text-decoration: none; color: inherit;">
                                    {{ $post->title }}
                                </a>
                            </h2>
                            <p class="post-meta">
                                Published on {{ $post->published_at->format('M d, Y') }}
                            </p>
                            <p class="post-excerpt">
                                {{ Str::limit(strip_tags($post->content), 150) }}
                            </p>
                            <a href="{{ route('blog.show', $post->slug) }}" class="read-more">
                                Read More →
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Laravel Pagination -->
            <div class="pagination">
                {{ $posts->links() }}
            </div>
        @else
            <p style="text-align: center; font-size: 18px; color: #777;">No posts found in this category.</p>
        @endif
    </div>

@endsection
