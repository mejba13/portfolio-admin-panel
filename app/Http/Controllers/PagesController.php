<?php

namespace App\Http\Controllers;

use App\Models\Website\Portfolio;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    // homepage

    public function index()
    {
        $metaTitle = 'B.Sc in CSE | Entrepreneur | Software Engineer | Cybersecurity Engineer | Cloud DevOps Engineer';
        $metaDescription = 'Software Engineer, Cybersecurity Engineer, and Cloud DevOps Engineer. B.Sc. in Computer Science and Engineering (CSE), graduated in 2018. Expert in software development, cybersecurity, and cloud infrastructure (AWS, Azure). Passionate about SaaS solutions, DevOps automation, application security, and building scalable, high-performance digital solutions.';

        return view('mejba-theme-24.pages.index', compact('metaTitle', 'metaDescription'));
    }

    // about us page

    public function about()
    {
        $metaTitle = 'Software, Cybersecurity & Cloud DevOps Engineer';
        $metaDescription = 'Learn more about Engr. Mejba Ahmed, a Software Engineer, Cybersecurity Engineer, and Cloud DevOps Engineer with expertise in full-stack development, cybersecurity, DevOps automation, and cloud infrastructure. Passionate about SaaS, AI, and application security to drive business growth.';

        return view('mejba-theme-24.pages.about', compact('metaTitle', 'metaDescription'));
    }

    // login page

    public function projects()
    {
        $metaTitle = 'Explore My Work';
        $metaDescription = 'Discover Mejba.me, showcasing expertise in B.Sc in CSE, entrepreneurship, software engineering, and Cloud DevOps.';

        // Fetch all portfolio items from the database
        $portfolios = Portfolio::latest()->get();

        return view('mejba-theme-24.pages.projects', compact('metaTitle', 'metaDescription', 'portfolios'));
    }

    public function projectDetails($slug)
    {
        $project = Portfolio::where('slug', $slug)->firstOrFail(); // Rename Portfolio if needed

        return view('mejba-theme-24.pages.project-details', compact('project'));
    }


    // Contact us page
    public function contact()
    {
        $metaTitle = 'Reach Out to Connect';
        $metaDescription = 'Discover Mejba.me expertise in B.Sc in CSE, entrepreneurship, software engineering, and Cloud DevOps. Reach out for inquiries.';

        return view('mejba-theme-24.pages.contact', compact('metaTitle', 'metaDescription'));
    }



}
