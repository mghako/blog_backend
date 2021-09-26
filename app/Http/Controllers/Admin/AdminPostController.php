<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{
    public function index() {
        return view('admin.posts.index',[
            'posts' => Post::paginate(10)
        ]);
    }

    public function create(){
        return view('admin.posts.create');
    }
    
    public function store(Request $request){
        $attributes = $request->validate([
            'category_id' => ['required', Rule::exists('categories', 'id')],
            'title' => 'required|unique:posts,title',
            'content' => 'required',
            'thumbnail' => 'required|image'
            
        ]);
        
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnail');
        $attributes['user_id'] = auth()->id();
        $attributes['slug'] = $attributes['title'];
        $attributes['published_at'] = now();
        
        Post::create($attributes);

        return redirect('/');

    }

    public function edit(Post $post) {
        return view('admin.posts.edit', [
            'post' => $post
        ]);
    }

    public function update(Request $request, Post $post) {
        $attributes = $request->validate([
            'category_id' => ['required', Rule::exists('categories', 'id')],
            'title' => 'required|unique:posts,title',
            'content' => 'required',
            'thumbnail' => 'image'
            
        ]);
        if(isset($attributes['thumbnail'])) {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnail');
        }
        
        $post->update($attributes);

        return back()->with('success', 'Post Updated!');
    }
}
