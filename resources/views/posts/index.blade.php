<x-layout>

    @if($posts->count())
        @foreach($posts as $post)
        <article class="flex flex-col shadow my-4">
            <a href="#" class="hover:opacity-75">
                <img src="{{asset('storage/'. $post->thumbnail)}}">
            </a>
            <div class="bg-white flex flex-col justify-start p-6">
                <a href="#" class="text-blue-700 text-sm font-bold uppercase pb-4">{{$post->category->name}}</a>
                <a href="#" class="text-3xl font-bold hover:text-gray-700 pb-4">{{ $post->title }}</a>
                <p href="#" class="text-sm pb-3">
                    By <a href="#" class="font-semibold hover:text-gray-800">{{ $post->author->name }}</a>, Published on {{ $post->published_at->diffForHumans() }}
                </p>
                <a href="#" class="pb-6">{{ substr($post->content, 0, 101) . '...' }}</a>
                <a href="{{ route('posts.show', $post->slug) }}" class="uppercase text-gray-800 hover:text-black">Continue Reading <i class="fas fa-arrow-right"></i></a>
            </div>
        </article>
        @endforeach
    @else
        <p class="text-center">No posts yet. Please check back later.</p>
    @endif

    <!-- Pagination -->
    {{$posts->links()}}
</x-layout>