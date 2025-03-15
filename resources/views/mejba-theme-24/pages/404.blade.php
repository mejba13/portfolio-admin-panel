@extends('mejba-theme-24.layouts.master')

@section('content')

    <section class="contact-section">
        <div class="page-page-title">
          <h2>Page Not Found</h2>
        </div>
        <div class="contact-content 404-content">
            {{-- <div>
                <img src="{{ asset('assets/images/icons/404.svg') }}" class="img-fluid" alt="404">
            </div> --}}

            <h3 style="font-weight: 900;margin: 24px 0px;">Sorry we can't found anything</h3>
            <p style="margin-bottom: 24px;">Oops! It seems like the page you're looking for isn't here. Please check the URL or go back to the homepage.</p>
            <a href="{{ url('/') }}" style="border-radius: 10px;
                background: rgb(21, 67, 83);
                padding: 8px 32px;
                transition: all 300ms ease-in-out;
                transform: scale(1);
                min-width: 45%;
                color: #fff;
                text-transform: capitalize;
            }" class="back-to-home">back to home</a>
        </div>
      </section>

        <!-- Contact Ends -->


    @endsection
