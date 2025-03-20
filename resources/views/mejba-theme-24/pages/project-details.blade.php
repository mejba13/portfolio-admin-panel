@extends('mejba-theme-24.layouts.master')

@section('title', $project->title)
@section('meta_description', Str::limit(strip_tags($project->description), 160))

@section('content')

    <style>
        nav {
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.05);
            /* Light subtle shadow */
            background: white;
            position: relative;
            z-index: 10;
        }
        /* General Page Styles */
        .project-details {
            font-family: 'Roboto', sans-serif;
            width: 90%;
            max-width: 991px;
            margin: auto;
            padding: 32px 0;
            color: #2c2c2c;
        }

        /* Project Card */
        .project-card {
            background: #ffffff;
            padding: 24px;
            border-radius: 10px;
            box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .project-title {
            font-size: 32px;
            font-weight: 700;
            color: #222;
            margin-bottom: 5px;
        }

        .project-meta {
            font-size: 16px;
            color: #777;
            margin-bottom: 15px;
        }

        /* Project Image */
        .project-image {
            width: 100%;
            max-width: 991px;
            margin: auto;
            border-radius: 24px;
            overflow: hidden;
        }

        .project-image img {
            width: 100%;
            height: auto;
            display: block;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.15);
        }

        /* Description */
        .project-description {
            font-size: 18px;
            line-height: 1.8;
            color: #444;
            padding: 20px;
            margin-top: 20px;
            background: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.05);
        }

        /* Buttons */
        .cta-section {
            margin-top: 30px;
            display: flex;
            justify-content: center;
            gap: 15px;
            flex-wrap: wrap;
        }

        .cta-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 12px 20px;
            font-size: 16px;
            font-weight: 600;
            border-radius: 8px;
            text-decoration: none;
            transition: all 0.3s ease-in-out;
            min-width: 200px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.15);
        }

        .back-button {
            background: linear-gradient(135deg, #38d39f, #38a4d3);
            color: #ffffff;
        }

        .back-button:hover {
            background: linear-gradient(135deg, #2fa383, #2f8cd3);
            transform: scale(1.05);
        }

        .visit-button {
            background: linear-gradient(135deg, #ff7e5f, #ffb47d);
            color: #ffffff;
        }

        .visit-button:hover {
            background: linear-gradient(135deg, #ff684f, #ffa05d);
            transform: scale(1.05);
        }

    </style>

    <section class="project-details">
        <div class="project-card">
            <h1 class="project-title">{{ $project->title }}</h1>
            <p class="project-meta"><strong>Category:</strong> {{ $project->category->name }}</p>
            @if($project->published_at)
                <p class="project-meta"><strong>Published At:</strong> {{ $project->published_at->format('M d, Y') }}</p>
            @endif

            <div class="project-image">
                <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}">
            </div>

            <div class="project-description">
                {!! nl2br($project->description) !!}
            </div>

            <div class="cta-section">
                @if ($project->url)
                    <a href="{{ $project->url }}" target="_blank" class="cta-button visit-button">
                        Visit Project 🚀
                    </a>
                @endif

                <a href="{{ url('/projects') }}" class="cta-button back-button">
                    Back to Projects
                </a>
            </div>
        </div>
    </section>


@endsection
