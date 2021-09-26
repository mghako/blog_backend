<x-layout>

    <main class="mx-w-lg mx-auto">
      <h2 class="text-center font-bold text-xl my-10">Registration Form</h2>
      
        <form method="POST" action="/login">
        @csrf
           <div class="mb-6 text-sm">
             <label for="" class="block mb-2 uppercase font-bold text-xs text-gray-700 text-center">Emil</label>
             <input type="email" value="{{old('email')}}" class="border border-gray-400 w-full rounded-full focus:outline-none focus:ring focus:border-0" autocomplete="off" type="text" name="email" id="username">
           </div>
           
           @error('email')
           <p class="text-red-500 text-xs">{{$message}}</p>
           @enderror

            <div class="mb-6 text-sm">
              <label for="" class="block mb-2 uppercase font-bold text-xs text-gray-700 text-center">Password</label>
              <input type="password" class="border border-gray-400 w-full rounded-full focus:outline-none focus:ring focus:border-0" autocomplete="off" type="text" name="password" id="password">
            </div>
            @error('password')
            <p class="text-red-500 text-xs">{{$message}}</p>
            @enderror
            
            <div class="mb-6">
              <button type="submit" class="border border-gray-400 w-full font-extrabold rounded-full hover:bg-gray-400 hover:text-black">Login</button>
            </div>

        </form>
    </main>

</x-layout>