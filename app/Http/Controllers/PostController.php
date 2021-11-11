<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    public function index(Request $request) {
        $posts = Post::latest()->filter(request(['search', 'category']))->paginate(3);
        
        return view('posts.index', compact('posts'));
    }
    public function show(Post $post) {
        // cache()->remember('post'.$post->id, 3600,)
        return view('posts.show', compact('post'));
    }

    
}
