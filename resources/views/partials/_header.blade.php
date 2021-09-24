@props(['categories'])
<header class="w-full container mx-auto">
    <div class="flex flex-col items-center py-12">
        <a class="font-bold text-gray-800 uppercase hover:text-gray-700 text-5xl" href="#">
            mrhako.me
        </a>
        <p class="text-lg text-gray-600">
            Blog
        </p>
    </div>
</header>

<!-- Menu Nav -->
<x-navbar>
    <x-slot name="trigger">
        <div class="block sm:hidden">
            <a href="#" class="block md:hidden text-base font-bold uppercase text-center flex justify-center items-center">
                Menu <i :class="show ? 'fa-chevron-down': 'fa-chevron-up'" class="fas ml-2"></i>
            </a>
        </div>
    </x-slot>
</x-navbar>