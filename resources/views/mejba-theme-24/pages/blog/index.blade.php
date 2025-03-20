{{-- resources/views/mejba-theme-24/pages/blog/index.blade.php --}}
@extends('mejba-theme-24.layouts.master')

@section('title', 'Blog')
@section('meta_description', 'Read our latest articles on software development, cybersecurity, and tech trends.')

@section('content')
    <style>
        /* Global Styles */
        body {
            font-family: 'Roboto', sans-serif;
            background: #f9f9f9;
        }

        /* Blog Container */
        .blog-container {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            max-width: 1200px;
            margin: auto;
            padding: 40px 20px;
            min-height: 80vh;
        }

        /* Post Card */
        .post-card {
            background: white;
            border-radius: 12px;
            padding: 15px;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.12);
            transition: all 0.3s ease-in-out;
            display: flex;
            gap: 15px;
            align-items: center;
            margin-bottom: 20px;
        }

        .post-card img {
            width: 120px;
            height: 90px;
            border-radius: 8px;
            object-fit: cover;
        }

        .post-card:hover {
            transform: translateY(-4px);
            box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.2);
        }

        .post-meta {
            font-size: 13px;
            color: #777;
        }

        /* Sidebar */
        .sidebar {
            width: 30%;
            padding-left: 20px;
        }

        .search-box {
            display: flex;
            align-items: center;
            border: 2px solid #38a4d3;
            border-radius: 8px;
            overflow: hidden;
            padding: 5px;
        }

        .search-box input {
            flex: 1;
            padding: 10px;
            border: none;
            outline: none;
            font-size: 16px;
        }

        .search-box button {
            background: #38d39f;
            color: white;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
        }
        .search-box button:hover {
            background: #38a4d3;
        }

        .category-list a {
            display: block;
            padding: 10px 0;
            color: #444;
            text-decoration: none;
            border-bottom: 1px solid #eee;
        }

        /* Pagination */
        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 30px;
            gap: 10px;
        }

        .pagination a,
        .pagination span {
            display: inline-block;
            padding: 8px 12px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 600;
            color: #333;
            background: #F3F3F3;
            transition: all 0.3s;
        }

        .pagination a:hover {
            background: #38A4D3;
            color: white;
        }

        .pagination .active {
            background: #38A4D3;
            color: white;
            font-weight: bold;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .blog-container {
                flex-direction: column;
            }
            .sidebar {
                width: 100%;
            }
        }
    </style>

    <div class="blog-container">
        <!-- Left: Posts -->
        <div class="posts-list">
            @foreach($posts as $post)
                <div class="post-card">
                    <img src="{{ $post->image ? asset('storage/' . $post->image) : 'https://via.placeholder.com/120' }}" alt="{{ $post->title }}">
                    <div>
                        <h4><a href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a></h4>
                        <p class="post-meta">{{ $post->category->name }} | {{ $post->published_at->format('M d, Y') }} | {{ $post->author->name }}</p>
                        <p>{{ Str::limit($post->content, 100) }}</p>
                    </div>
                </div>
            @endforeach

            <!-- Pagination -->
            <div class="pagination">
                {{ $posts->links() }}
            </div>
        </div>

        <!-- Right: Sidebar -->
        <div class="sidebar">
            <!-- Search -->
{{--            <div class="search-box">--}}
{{--                <form action="{{ route('blog.search') }}" method="GET">--}}
{{--                    <input type="text" name="query" placeholder="Search blog..." value="{{ request('query') }}" required>--}}
{{--                    <button type="submit"><i class="fas fa-search"></i></button>--}}
{{--                </form>--}}
{{--            </div>--}}

            <!-- Categories -->
            <h3>Categories</h3>
            <div class="category-list">
                @foreach($categories as $category)
                    <a href="{{ route('blog.category', $category->slug) }}">{{ $category->name }}</a>
                @endforeach
            </div>
        </div>
    </div>
@endsection
