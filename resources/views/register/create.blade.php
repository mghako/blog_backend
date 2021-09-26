<x-layout>
    <main class="mx-w-lg mx-auto">
      <h2 class="text-center font-bold text-xl my-10">Registration Form</h2>
      
        <form method="POST" action="/register">
        @csrf
           <div class="mb-6">
             <label for="" class="block mb-2 uppercase font-bold text-xs text-gray-700 text-center">Username</label>
             <input type="text" value="{{old('username')}}" class="border border-gray-400 w-full rounded-full focus:outline-none focus:ring focus:border-0" autocomplete="off" type="text" name="username" id="username">
           </div>
           @error('username')
           <p class="text-red-500 text-xs">{{$message}}</p>
           @enderror
            <div class="mb-6">
              <label for="" class="block mb-2 uppercase font-bold text-xs text-gray-700 text-center">Name</label>
              <input type="text" value="{{old('name')}}" class="border border-gray-400 w-full rounded-full focus:outline-none focus:ring focus:border-0" autocomplete="off" type="text" name="name" id="name">
            </div>
            @error('name')
            <p class="text-red-500 text-xs">{{$message}}</p>
            @enderror
           <div class="mb-6">
             <label for="" class="block mb-2 uppercase font-bold text-xs text-gray-700 text-center">Email</label>
             <input type="email" vlue="{{old('email')}}" class="border border-gray-400 w-full rounded-full focus:outline-none focus:ring focus:border-0" autocomplete="off" type="text" name="email" id="email">
           </div>
           @error('email')
           <p class="text-red-500 text-xs">{{$message}}</p>
           @enderror

            <div class="mb-6">
              <label for="" class="block mb-2 uppercase font-bold text-xs text-gray-700 text-center">Password</label>
              <input type="text" class="border border-gray-400 w-full rounded-full focus:outline-none focus:ring focus:border-0" autocomplete="off" type="text" name="password" id="password">
            </div>
            @error('password')
            <p class="text-red-500 text-xs">{{$message}}</p>
            @enderror
            
            <div class="mb-6">
              <button type="submit" class="border border-gray-400 w-full font-extrabold rounded-full hover:bg-gray-400 hover:text-black">Register</button>
            </div>

        </form>
    </main>
    
</x-layout>