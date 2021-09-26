<x-layout>
    <main class="mx-w-lg mx-auto w-2/4">
      <h2 class="text-center font-bold text-3xl my-10">Register!</h2>
      
        <div class="w-100">
          <form method="POST" action="/register">
            @csrf
               <x-form.input name="username" /> 
               <x-form.input name="name" /> 
               <x-form.input name="email" type="email" /> 
               <x-form.input name="password" type="password" /> 
                
                <div class="mb-6">
                  <button type="submit" class="block mx-auto mt-6 border text-lg border-gray-400 py-2 px-4 font-extrabold rounded-full hover:bg-gray-400 focus:ring-0 focus:border-opacity-0 hover:text-black bg-gray-200">Register</button>
                </div>

              </form>
        </div>
    </main>
    
</x-layout>