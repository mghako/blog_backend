<x-layout>
    <x-setting heading="Publish New Post">
        <form action="/admin/posts" method="POST" enctype="multipart/form-data">
            @csrf
            
            <x-form.field>
                <x-form.label name="category"/>
                <select name="category_id" id="category_id" class="block mx-auto">
                    @foreach (\App\Models\Category::all() as $category)
                        <option value="{{$category->id}}" {{ old('category_id') == $category->id ? 'selected':''}} >{{ucwords($category->name)}}</option>
                    @endforeach
                </select>
            </x-form.field>
            <x-form.input name="thumbnail" type="file" />
            <x-form.input name="title" />
            <x-form.textarea name="content" />
    
            <div class="mb-6">
                <button type="submit" class="block mx-auto text-center border py-1 px-2 border-gray-400 rounded hover:bg-blue-800 hover:text-white focus:outline-none focus:ring focus:border-0" autocomplete="off" type="text">Publish</button>
            </div>
        </form>
    </x-setting>
</x-layout>