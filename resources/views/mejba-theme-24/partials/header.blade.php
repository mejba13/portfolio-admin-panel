<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="keywords" content="B.Sc in CSE, Entrepreneur, Software Engineer, Cloud DevOps Engineer HTML, CSS, JavaScript,WordPress, Laravel , WordPress theme development, Wordpress Plugin development, Cloud security, bug fixing,Full Stack Developer">
    <meta name="author" content="setblue">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Open Graph meta tags --}}

    <meta property="og:title" content="Engr Mejba Ahmed - @yield('title')" />
    <meta property="og:description" content="@yield('meta_description', config('app.meta_description'))" />
    <meta property="og:image" content="https://s3.amazonaws.com/mejba.me/social-sharing-image.png" />

    <!-- Description -->
    <meta name="description" content="@yield('meta_description', config('app.meta_description'))">

    <!-- Title -->
    <title>Engr Mejba Ahmed - @yield('title')</title>

    <meta name="google-site-verification" content="rjfwh1EyMpZXxU1FEJVPh1qdISvm4VWBnsd5Kl2cqC4" />

    <!-- Favicon Icon -->
    <link rel=" shortcut icon" href="{{ asset('assets/images/logos/mejba.jpg') }}" type="image/png">

    <!-- Helvetica Neue font-->
    <link href="https://fonts.cdnfonts.com/css/helvetica-neue-55" rel="stylesheet">

    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">


</head>

<body>
    <header class="main-head">
        <nav>
            <div class="logo">
            <a href="{{ url('/') }}">
                <img
                src="{{ asset('assets/images/logos/mejba.jpg') }}"
                title="Engr Mejba Ahmed"
                alt="Engr Mejba Ahmed"
                />
            </a>
            <a href="{{ url('/') }}"><h1><span>Entrepreneur | Software Engineer</span> <span>Cloud DevOps</span></h1></a>
            </div>
            <ul>
{{--            <li><a class="{{ request()->is('/') ? 'active' : ''}}" href="{{ url('/') }}">Home</a></li>--}}
            <li><a class="{{ request()->is('about-me') ? 'active' : ''}}" href="{{ url('/about-me/') }}">About</a></li>
            <li><a class="{{ request()->is('projects') ? 'active' : ''}}" href="{{ url('/projects/') }}">Projects</a></li>
                <li><a class="{{ request()->is('blog') || request()->is('blog/*') ? 'active' : ''}}" href="{{ url('/blog/') }}">Blog</a></li> <!-- Added Blog Link -->
            <li><a class="{{ request()->is('contact') ? 'active' : ''}}" href="{{ url('/contact/') }}">Contact</a></li>
            </ul>
        </nav>
    </header>
    <!-- Navbar Ends -->
