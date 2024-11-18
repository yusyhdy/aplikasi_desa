<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
{
    $posts = Post::latest()->take(3)->get(); // Get the latest 3 posts
    return view('home', compact('posts'));
}
}
