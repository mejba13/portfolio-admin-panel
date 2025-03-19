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

        .project-details {
            font-family: 'Roboto', sans-serif;
            width: 85%;
            height: auto;
            margin: auto;
            padding: 50px 0;
            color: #2c2c2c;
        }

        .project-details .container {
            max-width: 900px;
            margin: auto;
            display: flex;
            justify-content: center;
        }

        .project-card {
            background: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 100%;
        }

        .project-title {
            font-size: 32px;
            font-weight: 700;
            color: #2c2c2c;
            margin-bottom: 10px;
        }

        .published-date {
            font-size: 16px;
            color: #777;
            margin-bottom: 20px;
        }

        .project-image {
            width: 100%;
            max-width: 750px;
            margin: auto;
        }

        .project-image img {
            width: 100%;
            height: auto;
            border-radius: 8px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.15);
        }

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

        .cta-section {
            margin-top: 30px;
        }

        /* ✅ Updated Button Styles */
        .back-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 12px 20px;
            background: linear-gradient(135deg, #38d39f, #38a4d3);
            color: #ffffff;
            font-size: 16px;
            font-weight: 600;
            border-radius: 8px;
            text-decoration: none;
            transition: all 0.3s ease-in-out;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.15);
            min-width: 200px;
        }

        .back-button svg {
            width: 20px;
            height: 20px;
            margin-right: 8px;
            stroke: white;
        }

        .back-button:hover {
            background: linear-gradient(135deg, #2fa383, #2f8cd3);
            transform: scale(1.05);
            box-shadow: 0px 5px 12px rgba(0, 0, 0, 0.2);
        }
    </style>

    <section class="project-details">
        <div class="container">
            <div class="project-card">
                <h1 class="project-title">{{ $project->title }}</h1>
                <p class="published-date"><strong>Published At:</strong> {{ $project->published_at->format('M d, Y') }}</p>

                <div class="project-image">
                    <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}">
                </div>

                <div class="project-description">
                    {!! nl2br($project->description) !!}
                </div>

                <div class="cta-section">
                    <a href="{{ url('/projects') }}" class="back-button">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                            </path>
                        </svg>
                        Back to Projects
                    </a>
                </div>
            </div>
        </div>
    </section>

@endsection
