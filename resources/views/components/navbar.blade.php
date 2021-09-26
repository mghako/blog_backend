@props(['trigger'])
<nav class="w-full py-4 border-t border-b bg-gray-100" x-data="{ show: false }" @click.away="show = false">
    {{-- Trigger --}}
    <div @click="show = ! show">
        {{ $trigger }}
    </div>
    {{-- dropdown links --}}
    <div :class="show ? 'block': 'hidden'" class="w-full flex-grow sm:flex sm:items-center sm:w-auto">
        <div class="w-full container mx-auto flex flex-col sm:flex-row items-center justify-center text-sm font-bold uppercase mt-0 px-6 py-2">
            @foreach ($categories as $category)
                <x-navbar-link href="/?category={{$category->slug}}">{{$category->name}}</x-navbar-link>
            @endforeach
        </div>
    </div>
    <div>
    
    </div>
</nav>