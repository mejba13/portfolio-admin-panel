{{-- resources/views/mejba-theme-24/pages/blog/search.blade.php --}}
@extends('mejba-theme-24.layouts.master')

@section('title', 'Search Results')
@section('meta_description', 'Find blog articles related to your search.')

@section('content')
    <style>
        /* Blog Search Container */
        .search-container {
            max-width: 1200px;
            margin: auto;
            padding: 40px 20px;
            min-height: 80vh;
        }

        .search-title {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 30px;
            color: #333;
        }

        /* Blog Cards */
        .blog-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }

        .blog-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: all 0.3s ease-in-out;
        }

        .blog-card:hover {
            transform: translateY(-5px);
            box-shadow: 0px 6px 14px rgba(0, 0, 0, 0.15);
        }

        .blog-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .blog-content {
            padding: 20px;
        }

        .blog-content h4 {
            font-size: 18px;
            font-weight: bold;
            color: #333;
            margin-bottom: 8px;
        }

        .blog-content p {
            font-size: 14px;
            color: #777;
            line-height: 1.6;
        }

        /* No Results */
        .no-results {
            text-align: center;
            font-size: 18px;
            color: #777;
        }

        /* Pagination */
        .blog-pagination {
            display: flex;
            justify-content: center;
            margin-top: 30px;
        }

        .blog-pagination a {
            padding: 8px 15px;
            margin: 0 5px;
            background: #f1f1f1;
            border-radius: 6px;
            text-decoration: none;
            color: #333;
            transition: all 0.3s ease-in-out;
        }

        .blog-pagination a:hover {
            background: linear-gradient(135deg, #38d39f, #38a4d3);
            color: white;
        }

        .blog-pagination .active {
            background: linear-gradient(135deg, #38d39f, #38a4d3);
            color: white;
        }
    </style>

    <div class="search-container">
        <h2 class="search-title">Search Results for "{{ request('query') }}"</h2>

        @if($posts->count() > 0)
            <div class="blog-grid">
                @foreach($posts as $post)
                    <div class="blog-card">
                        <a href="{{ route('blog.show', $post->slug) }}">
                            <img src="{{ $post->image ? asset('storage/' . $post->image) : 'https://via.placeholder.com/300x200' }}" alt="{{ $post->title }}">
                        </a>
                        <div class="blog-content">
                            <h4>
                                <a href="{{ route('blog.show', $post->slug) }}" style="text-decoration: none; color: inherit;">
                                    {{ $post->title }}
                                </a>
                            </h4>
                            <p>
                                <small>Published on {{ $post->published_at->format('M d, Y') }} | Category: {{ $post->category->name }}</small>
                            </p>
                            <p>{{ Str::limit(strip_tags($post->content), 150) }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="blog-pagination">
                {{ $posts->links() }}
            </div>
        @else
            <p class="no-results">No results found.</p>
        @endif
    </div>

@endsection
