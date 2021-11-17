<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{
    public function index() {
        $posts = cache()->remember('posts', 3600, function() {
            return Post::paginate(10);
        });
        return view('admin.posts.index',[
            'posts' => $posts
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
        
        $post = Post::create($attributes);
        // add to cache
        cache()->forget('post'.$post->id);
        Cache::add('post'.$post->id, 3600);
        cache()->forget('posts');
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
            'title' => 'required',
            'content' => 'required',
            'thumbnail' => 'image'
            
        ]);
        if(isset($attributes['thumbnail'])) {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnail');
        }
        
        // clear cache
        cache()->forget('post'.$post->id);
        // then update
        $post->update($attributes);

        return back()->with('success', 'Post Updated!');
    }

    public function destroy(Post $post)
    {
        // clear cache
        cache()->forget('post'.$post->id);
        // then delete
        $post->delete();

        return back()->with('success', 'Post Deleted!');
    }
}
