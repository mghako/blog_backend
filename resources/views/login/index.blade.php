<x-layout>

    <main class="mx-w-lg mx-auto w-2/4">
      <h2 class="text-center font-bold text-3xl my-10">Login!</h2>
      
        <form method="POST" action="/login">
          @csrf
          <div class="mb-6 text-sm">
            <label for="" class="block mb-2 uppercase font-bold text-lg text-gray-700 text-center">Email</label>
            <input type="email" value="{{old('email')}}" class="border border-gray-400 w-full rounded-full py-2 px-6 focus:outline-none focus:ring focus:border-0" autocomplete="off" type="text" name="email" id="username">
          </div>
          
          @error('email')
          <p class="text-red-500 text-xs">{{$message}}</p>
          @enderror

          <div class="mb-6 text-sm">
            <label for="" class="block mb-2 uppercase font-bold text-lg text-gray-700 text-center">Password</label>
            <input type="password" class="border border-gray-400 w-full rounded-full focus:outline-none py-2 px-6 focus:ring focus:border-0" autocomplete="off" type="text" name="password" id="password">
          </div>
          
          @error('password')
          <p class="text-red-500 text-xs">{{$message}}</p>
          @enderror
          
          <div class="mb-6 w-1/3 mx-auto">
            <button type="submit" class="block mx-auto mt-6 border text-lg border-gray-400 py-2 px-4 font-extrabold rounded-full hover:bg-gray-400 focus:ring-0 focus:border-opacity-0 hover:text-black bg-gray-200">Login</button>
          </div>

        </form>
    </main>

</x-layout>