@props(['name'])
    
<x-form.field>
    
    <x-form.label name="{{ $name }}" />

    <textarea 
        value="{{old($name)}}" 
        class="border border-gray-400 w-full rounded py-4 px-2 focus:outline-none focus:ring focus:border-0" 
        autocomplete="off"
        name="{{$name}}"
        required
        >
        {{ $slot ?? old($name) }}
    </textarea>

    <x-form.error name="{{ $name }}"/>

</x-form.field>