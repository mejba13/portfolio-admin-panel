@php use Illuminate\Support\Facades\Storage; @endphp
@extends('mejba-theme-24.layouts.master')

@section('title', $metaTitle)
@section('meta_description', $metaDescription)

@section('content')

    <style>
        /* 🏗️ Navigation Bar with Light Dark Shadow */
        nav {
            background: white;
            position: relative;
            z-index: 10;
            border-bottom: 2px solid rgba(0, 0, 0, 0.1);
            box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.05);
            padding-bottom: 10px;
        }

        /* 📌 Project Section Styling */
        .projects {
            width: 90%;
            max-width: 1200px;
            margin: auto;
            padding: 40px 0;
            text-align: center;
        }

        .project-page-title h2 {
            font-size: 36px;
            font-weight: bold;
            color: #333;
        }

        .project-subheading {
            font-size: 18px;
            font-weight: 500;
            color: #555;
            margin-top: 5px;
            margin-bottom: 25px;
        }

        /* 🏷️ Category Tabs */
        .category-tabs {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            gap: 12px;
            margin-bottom: 30px;
        }

        .category-tab {
            padding: 12px 20px;
            font-size: 16px;
            font-weight: 600;
            border-radius: 30px;
            background: #f8f9fa; /* Default background */
            color: #333;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            border: none;
            display: inline-block;
            min-width: 140px;
            text-transform: capitalize;
            outline: none;
        }

        .category-tab:hover {
            background: -webkit-linear-gradient(left, #38d39f, #38a4d3);
            background: linear-gradient(to right, #38d39f, #38a4d3);
            color: white;
            transform: translateY(-3px);
            box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.15);
        }

        .category-tab.active {
            background: -webkit-linear-gradient(left, #38d39f, #38a4d3);
            background: linear-gradient(to right, #38d39f, #38a4d3);
            color: white;
            box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.25);
            transform: scale(1.05);
        }

        /* 🎨 Modern Project Cards */
        .project-list-section {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            justify-content: center;
        }

        .item {
            background: white;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.12);
            transition: all 0.3s ease-in-out;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .item img {
            width: 100%;
            height: auto;
            border-radius: 10px;
            transition: 0.3s ease-in-out;
        }

        .item:hover {
            transform: translateY(-8px);
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2);
        }

        .item-content {
            padding: 15px 10px;
        }

        .item-content h4 {
            font-size: 18px;
            font-weight: bold;
            margin-top: 12px;
            color: #333;
        }

        .item-content a {
            text-decoration: none;
            color: #ff3b3b;
            transition: 0.3s;
        }

        .item-content a:hover {
            color: #c82323;
            text-decoration: underline;
        }

        .item p {
            font-size: 14px;
            color: #777;
            margin-top: 5px;
        }

        .pagination-container {
            text-align: center;
            margin-top: 30px;
        }

        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .pagination li {
            margin: 5px;
        }

        .pagination a, .pagination span {
            display: inline-block;
            padding: 10px 16px;
            text-decoration: none;
            border-radius: 6px;
            font-weight: 600;
            font-size: 14px;
            transition: all 0.3s ease-in-out;
        }

        .pagination a {
            background: #f8f9fa;
            color: #333;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        .pagination a:hover {
            background: linear-gradient(to right, #38d39f, #38a4d3);
            color: white;
        }

        .pagination .active span {
            background: linear-gradient(to right, #38d39f, #38a4d3)!important;
            color: white;
            font-weight: bold;
            padding: 12px 18px;
        }


        /* 📱 Responsive Design */
        @media (max-width: 768px) {
            .category-tabs {
                flex-direction: row;
                flex-wrap: wrap;
            }
        }
    </style>

    <section class="projects">
        <!-- Page Title & Description -->
        <div class="project-page-title">
            <h2>Projects</h2>
            <p class="project-subheading">Explore my work across different categories. Select a tab to filter projects.</p>
        </div>

            <!-- 🏷️ Category Tabs -->
            <div class="category-tabs">
                <div class="category-tab active" data-category="all">All</div>
                @foreach($categories as $category)
                    <div class="category-tab" data-category="{{ $category->slug }}">{{ $category->name }}</div>
                @endforeach
            </div>

            <!-- 📌 Portfolio Projects -->
            <div class="project-list-section">
                @foreach($portfolios as $portfolio)
                    @php
                        $imagePath = $portfolio->image
                            ? asset('storage/' . $portfolio->image)
                            : 'https://via.placeholder.com/300';
                    @endphp

                    <div class="item" data-category="{{ $portfolio->category->slug }}">
                        <img src="{{ $imagePath }}" alt="{{ $portfolio->title }}" loading="lazy" />
                        <div class="item-content">
                            <h4>
                                <a href="{{ route('project.show', ['slug' => $portfolio->slug]) }}">
                                    {{ $portfolio->title }}
                                </a>
                            </h4>
                            <p><strong>Category:</strong> {{ $portfolio->category->name }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
    </section>

    <!-- ✅ Laravel Pagination Links -->
    <div class="pagination-container">
        {{ $portfolios->links('vendor.pagination.bootstrap-4') }}
    </div>

    <!-- 🏷️ JavaScript for Filtering -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const tabs = document.querySelectorAll(".category-tab");
            const projects = document.querySelectorAll(".item");

            tabs.forEach(tab => {
                tab.addEventListener("click", function() {
                    tabs.forEach(t => t.classList.remove("active"));
                    this.classList.add("active");

                    const selectedCategory = this.getAttribute("data-category");

                    projects.forEach(project => {
                        if (selectedCategory === "all" || project.getAttribute("data-category") === selectedCategory) {
                            project.style.display = "block";
                        } else {
                            project.style.display = "none";
                        }
                    });
                });
            });
        });
    </script>

@endsection
