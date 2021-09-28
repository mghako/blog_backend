@props(['heading'])

<div class="flex-none w-full">

    <h3 class="inline-block py-2 px-1 text-3xl border-gray-200 bg-gray-100 shadow">{{ $heading }}</h3>
    {{$slot}}

</div>