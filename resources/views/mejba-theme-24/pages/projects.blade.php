@php use Illuminate\Support\Facades\Storage; @endphp
@extends('mejba-theme-24.layouts.master')

@section('title', $metaTitle)

@section('meta_description', $metaDescription)

@section('content')

<section class="projects">
    <div class="project-page-title">
      <h2>Projects</h2>
    </div>
    <div class="project-page-title">
        <h3>Achievements That Define My Professional Growth</h3>
    </div>
    <div class="project-list">
        <div class="item">
            <img src="https://s3.us-east-1.amazonaws.com/mejba.me/leetcode-50-days-badge-2025.png" alt="LeetCode Badge Achievement" />
            <div class="item-content">
                <h4>
                    <a target="_blank" href="https://leetcode.com/u/engrmejbaahmed/">LeetCode Badge Achievement</a>
                </h4>
            </div>
        </div>
        <div class="item">
            <img src="https://s3.us-east-1.amazonaws.com/mejba.me/aws-clf-c02-course-certificate-2025.jpg" alt="AWS Course Completion Certificate" />
            <div class="item-content">
                <h4>
                    <a target="_blank" href="https://www.udemy.com/certificate/UC-885ee006-4bfe-4176-b221-2e38544aa230/">AWS Course Completion Certificate</a>
                </h4>
            </div>
        </div>
        <div class="item">
            <img src="https://s3.us-east-1.amazonaws.com/mejba.me/aws-clf-c02-practice-exam-results-2025.PNG" alt="AWS Practice Exam Results" />
            <div class="item-content">
                <h4>
                    <a target="_blank" href="https://www.udemy.com/certificate/UC-885ee006-4bfe-4176-b221-2e38544aa230/">AWS Practice Exam Results</a>
                </h4>
            </div>
        </div>
    </div>
    <div class="project-page-title">
        <h3>Check Out Some Awesome Projects (latest)</h3>
    </div>

    <div class="project-list">
        @foreach($portfolios as $portfolio)
            <div class="item">
                @php
                    // Determine image path for local storage
                    $imagePath = asset('storage/' . $portfolio->image);

                    // If using Vite, uncomment the line below (ensure image is in `resources/images/`)
                    // $imagePath = Vite::asset('resources/images/' . $portfolio->image);
                @endphp

                <img src="{{ $imagePath }}" alt="{{ $portfolio->title }}" />
                <div class="item-content">
                    <h4>
                        <a target="_blank" href="{{ $portfolio->url }}">{{ $portfolio->title }}</a>
                    </h4>
                </div>
            </div>
        @endforeach
    </div>



    <div class="project-list">
      <div class="item">
        <img src=" {{ asset('assets/images/projects/website/lens-aid.png') }} " alt="Lens Aid" />
        <div class="item-content">
          <h4>
            <a target="_blank" href="https://www.lens-aid.de/">Lens Aid</a>
          </h4>
        </div>
      </div>
      <div class="item">
        <img
          src=" {{ asset('assets/images/projects/website/pentagon-tactical.png') }}"
          alt="Pentagon Tactical"
        />
        <div class="item-content">
          <h4>
            <a target="_blank" href="https://www.pentagon-tactical.com/"
              >Pentagon Tactical</a
            >
          </h4>
        </div>
      </div>
      <div class="item">
        <img src=" {{ asset('assets/images/projects/website/sav.png') }}" alt="Sav" />
        <div class="item-content">
          <h4>
            <a target="_blank" href="https://www.sav.com/">Sav</a>
          </h4>
        </div>
      </div>
      <div class="item">
        <img src="{{ asset('assets/images/projects/website/lemenu.png') }}" alt="Lemenu" />
        <div class="item-content">
          <h4>
            <a target="_blank" href="https://lemenu.ch/de/">Lemenu</a>
          </h4>
        </div>
      </div>
      <div class="item">
        <img src="{{ asset('assets/images/projects/website/strapswap.png') }}" alt="Strapswap" />
        <div class="item-content">
          <h4>
            <a target="_blank" href="https://strapswap.de/">Strapswap</a>
          </h4>
        </div>
      </div>
      <div class="item">
        <img src=" {{ asset('assets/images/projects/website/studiosuits.png') }}" alt="Studiosuits" />
        <div class="item-content">
          <h4>
            <a target="_blank" href="https://www.studiosuits.com/"
              >Studiosuits</a
            >
          </h4>
        </div>
      </div>
      <div class="item">
        <img src=" {{ asset('assets/images/projects/website/natu-real.png') }}" alt="natu-real" />
        <div class="item-content">
          <h4>
            <a target="_blank" href="https://www.natu-real.com/">Natu-Real</a>
          </h4>
        </div>
      </div>
      <div class="item">
        <img src="{{ asset('assets/images/projects/website/21shoes.png') }}" alt="21shoes" />
        <div class="item-content">
          <h4>
            <a target="_blank" href="https://21shoes.net/">21shoes</a>
          </h4>
        </div>
      </div>
      <div class="item">
        <img
          src=" {{ asset('assets/images/projects/website/anguillasands.png') }}"
          alt="anguillasands"
        />
        <div class="item-content">
          <h4>
            <a target="_blank" href="https://anguillasands.com/"
              >Anguillasands</a
            >
          </h4>
        </div>
      </div>
      <div class="item">
        <img src=" {{ asset('assets/images/projects/website/exoracing.png') }}" alt="Exoracing" />
        <div class="item-content">
          <h4>
            <a target="_blank" href="https://exoracing.co.uk/">Exoracing</a>
          </h4>
        </div>
      </div>
      <div class="item">
        <img
          src="{{ asset('assets/images/projects/website/setjoodirectory.png') }}"
          alt="setjoodirectory"
        />
        <div class="item-content">
          <h4>
            <a target="_blank" href="https://www.setjoodirectory.com/"
              >setjoodirectory</a
            >
          </h4>
        </div>
      </div>
      <div class="item">
        <img
          src=" {{ asset('assets/images/projects/website/napolilimoservice.png') }}"
          alt="napolilimoservice"
        />
        <div class="item-content">
          <h4>
            <a target="_blank" href="https://napolilimoservice.com/"
              >Naples Limousine Services</a
            >
          </h4>
        </div>
      </div>
      <div class="item">
        <img src=" {{ asset('assets/images/projects/website/thinkhostel.png') }}" alt="thinkhostel" />
        <div class="item-content">
          <h4>
            <a target="_blank" href="https://thinkhostel.com/">thinkhostel</a>
          </h4>
        </div>
      </div>
      <div class="item">
        <img
          src="{{ asset('assets/images/projects/website/interessante-dinge.png') }}"
          alt="interessante-dinge"
        />
        <div class="item-content">
          <h4>
            <a target="_blank" href="http://interessante-dinge.de/"
              >Interessante Dinge</a
            >
          </h4>
        </div>
      </div>
      <div class="item">
        <img src=" {{ asset('assets/images/projects/website/plantae.png') }}" alt="plantae" />
        <div class="item-content">
          <h4>
            <a target="_blank" href="https://plantae.org/">plantae</a>
          </h4>
        </div>
      </div>
      <div class="item">
        <img
          src="{{ asset('assets/images/projects/website/wealthacademyglobal.png') }}"
          alt="Wealth Academy Global"
        />
        <div class="item-content">
          <h4>
            <a target="_blank" href="https://www.wealthacademyglobal.com/"
              >Wealth Academy Global</a
            >
          </h4>
        </div>
      </div>
      <div class="item">
        <img
          src=" {{ asset('assets/images/projects/website/everydayhealth.png') }}"
          alt="everydayhealth"
        />
        <div class="item-content">
          <h4>
            <a target="_blank" href="https://www.everydayhealth.com/"
              >Every Day Health</a
            >
          </h4>
        </div>
      </div>
      <div class="item">
        <img
          src="{{ asset('assets/images/projects/website/mississaugaimplants.png') }}"
          alt="mississaugaimplants"
        />
        <div class="item-content">
          <h4>
            <a target="_blank" href="http://www.mississaugaimplants.com/"
              >Mississaugaimplants</a
            >
          </h4>
        </div>
      </div>
      <div class="item">
        <img
          src="{{ asset('assets/images/projects/website/bottlemeamessage.png') }}"
          alt="bottlemeamessage"
        />
        <div class="item-content">
          <h4>
            <a target="_blank" href="https://bottlemeamessage.com/"
              >Bottle me amessage</a
            >
          </h4>
        </div>
      </div>
      <div class="item">
        <img src="{{ asset('assets/images/projects/website/bottlemeamessage.png') }}" alt="Sav" />
        <div class="item-content">
          <h4>
            <a target="_blank" href="https://thecottageandloft.com/"
              >thecottageandloft</a
            >
          </h4>
        </div>
      </div>
      <div class="item">
        <img src="{{ asset('assets/images/projects/website/freshzza.png') }}" alt="freshzza" />
        <div class="item-content">
          <h4>
            <a target="_blank" href="https://www.freshzza.com/">Freshzza</a>
          </h4>
        </div>
      </div>
      <div class="item">
        <img
          src=" {{ asset('assets/images/projects/website/williamtotiphotography.png') }}"
          alt="William Toti Photography Blog"
        />
        <div class="item-content">
          <h4>
            <a target="_blank" href="https://blog.williamtotiphotography.com/"
              >William Toti Photography Blog</a
            >
          </h4>
        </div>
      </div>
      <div class="item">
        <img
          src="{{ asset('assets/images/projects/website/brookescollege.png') }}"
          alt="BrookesCollege"
        />
        <div class="item-content">
          <h4>
            <a target="_blank" href="https://brookescollege.ca/"
              >Brookes College</a
            >
          </h4>
        </div>
      </div>
      <div class="item">
        <img src="{{ asset('assets/images/projects/website/shirtinator.png') }}" alt="shirtinator" />
        <div class="item-content">
          <h4>
            <a target="_blank" href="https://www.shirtinator.co.uk/"
              >Shirtinator</a
            >
          </h4>
        </div>
      </div>
      <div class="item">
        <img src="{{ asset('assets/images/projects/website/fougen.png') }}" alt="fougen" />
        <div class="item-content">
          <h4>
            <a target="_blank" href="https://www.fougen.org/">Fougen</a>
          </h4>
        </div>
      </div>
      <div class="item">
        <img
          src="{{ asset('assets/images/projects/website/freemotionshop.png') }}"
          alt="freemotionshop"
        />
        <div class="item-content">
          <h4>
            <a target="_blank" href="https://freemotionshop.com/"
              >Free Motion Shop</a
            >
          </h4>
        </div>
      </div>
      <div class="item">
        <img
          src="{{ asset('assets/images/projects/website/bitcoinsidehustles.png') }}"
          alt="bitcoinsidehustles"
        />
        <div class="item-content">
          <h4>
            <a target="_blank" href="https://bitcoinsidehustles.com/"
              >Bitcoin Side Hustles</a
            >
          </h4>
        </div>
      </div>
      <div class="item">
        <img
          src="{{ asset('assets/images/projects/aws/aws-developer-tools-codepipeline.png') }}"
          alt="bitcoinsidehustles"
        />
        <div class="item-content">
          <h4>
            <a target="_blank" href="https://us-east-1.console.aws.amazon.com/codesuite/home?region=us-east-1"
              >CodePipeline</a
            >
          </h4>
        </div>
      </div>
    </div>
  </section>


    @endsection
