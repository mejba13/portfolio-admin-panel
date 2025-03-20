<?php

namespace App\Http\Controllers;

use App\Models\Blog\Post;
use App\Models\Blog\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::latest()->paginate(6);
        $categories = Category::all();

        return view('mejba-theme-24.pages.blog.index', compact('posts', 'categories'));
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        return view('mejba-theme-24.pages.blog.single', compact('post'));
    }

    public function category($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $posts = $category->posts()->latest()->paginate(6);

        return view('mejba-theme-24.pages.blog.category', compact('category', 'posts'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $posts = Post::where('title', 'LIKE', "%{$query}%")
            ->orWhere('content', 'LIKE', "%{$query}%")
            ->orWhereHas('category', function ($q) use ($query) {
                $q->where('name', 'LIKE', "%{$query}%");
            })
            ->paginate(6);

        $categories = Category::all();

        return view('mejba-theme-24.pages.blog.index', compact('posts', 'categories', 'query'));
    }
}
