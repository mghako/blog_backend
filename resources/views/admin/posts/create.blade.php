<x-layout>
    @prepend('custom-css')
    
    @endprepend
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

            <x-form.label name="Content" />
            <textarea 
                value="{{old('content')}}" 
                class="border border-gray-400 w-full rounded py-4 px-2 focus:outline-none focus:ring focus:border-0" 
                autocomplete="off"
                name="content"
                id="myBlogContent"
                required
                >
                {{ old('content') ?? '' }}
            </textarea>
    
            <div class="my-6">
                <button type="submit" class="block mx-auto text-center border py-1 px-2 border-gray-400 rounded hover:bg-blue-800 hover:text-white focus:outline-none focus:ring focus:border-0" autocomplete="off" type="text">Publish</button>
            </div>
        </form>
    </x-setting>
    @prepend('custom-js')
    <script src="https://cdn.tiny.cloud/1/4jc8yrrfa01djtm6u23rz6su6xvly9sl8pauaw46iht2k4je/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea#myBlogContent',
            plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            toolbar_mode: 'floating',
        });
    </script>
    @endprepend
</x-layout>