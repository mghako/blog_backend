<x-layout>
    <x-setting :heading="'Edit Post: '. $post->title">
        <form action="/admin/posts/{{$post->slug}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <x-form.field>
                <x-form.label name="category"/>
                <select name="category_id" id="category_id" class="block mx-auto">
                    @foreach (\App\Models\Category::all() as $category)
                    <option
                        value="{{ $category->id }}"
                        {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}
                        >{{ ucwords($category->name) }}
                    </option>
                    @endforeach
                </select>
            </x-form.field>
            <x-form.input name="title" :value="old('title', $post->title)" />
            <x-form.textarea name="content">{{ old('body', $post->content) }}</x-form.textarea>
            <div class="flex mt-6">
                <div class="flex-1">
                    <x-form.input name="cover_photo" type="file" />
                </div>
                <img src="{{ asset('storage/'. $post->thumbnail) }}" class="rouned-xl ml-10" width="300">
            </div>
            
                
            <div class="mb-6 mt-6">
                <button type="submit" class="block mx-auto text-center border py-1 px-2 border-gray-400 rounded hover:bg-blue-800 hover:text-white focus:outline-none focus:ring focus:border-0" autocomplete="off" type="text">Update</button>
            </div>
        </form>
    </x-setting>
</x-layout>