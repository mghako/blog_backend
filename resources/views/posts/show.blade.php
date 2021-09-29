<x-layout>
<article class="container overflow-auto flex flex-col shadow my-4">
    <!-- Article Image -->
    <a href="#" class="hover:opacity-75">
        <img src="https://source.unsplash.com/collection/1346951/1000x500?sig=1">
    </a>
    <div class="bg-white flex flex-col justify-start p-6">
        <a href="#" class="text-blue-700 text-sm font-bold uppercase pb-4">{{ $post->category->name}}</a>
        <a href="#" class="text-3xl font-bold hover:text-gray-700 pb-4">{{ $post->title }}</a>
        <p href="#" class="text-sm pb-8">
            By <a href="#" class="font-semibold hover:text-gray-800">{{ $post->author->name }}</a>, Published on {{$post->published_at->diffForHumans()}}
        </p>
        {!! $post->content !!}
    </div>
</article>

<div class="w-full flex pt-6">
    <a href="{{ url()->previous() }}" class="w-1/2 bg-white shadow hover:shadow-md text-left p-6">
        <p class="text-lg text-blue-800 font-bold flex items-center"><i class="fas fa-arrow-left pr-1"></i> Back</p>
    </a>
</div>
</x-layout>