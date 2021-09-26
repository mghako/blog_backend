@props(['name', 'type' => 'text'])

<x-form.field>
    
    <x-form.label name="{{$name}}" />
    
    <input 
        type="{{$type}}"
        class="border border-gray-400 w-full rounded py-2 px-2 focus:outline-none focus:ring focus:border-0" 
        autocomplete="off"
        name="{{$name}}" 
        id="{{$name}}""
        {{ $attributes(['value' => old($name)]) }}
    >
    
    <x-form.error name="{{$name}}"/>

</x-form.field>