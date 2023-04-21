<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::with('city.province.region')->get();
        return view('admin.index', compact('posts'));
    }

    public function profile()
    {
        return view('admin.profile');
    }
}
