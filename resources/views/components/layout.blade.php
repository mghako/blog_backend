
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mrhako.me | Blog</title>
    <meta name="author" content="Htet Aung Ko @Saimon">
    <meta name="description" content="">

    <!-- Tailwind -->
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');

        .font-family-karla {
            font-family: karla;
        }
    </style>

    <!-- AlpineJS -->
    <script defer src="https://unpkg.com/alpinejs@3.3.4/dist/cdn.min.js"></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
</head>
<body class="bg-white font-family-karla">
    
    @include('partials._header')

    <div class="container mx-auto flex flex-wrap py-6">
        <div class="absolute top-10 right-10 space-x-10">
            @auth
            <a href="/admin/posts/create" class="inline-flex border-2 px-2 py-1 border-gray-200 hover:bg-black hover:text-white {{request()->is('/admin/posts/create') == '/admin/posts/create' ? 'bg-gray-400' : ''}}">Add Post</a>
            <a href="/admin/posts" class="inline-flex border-2 px-2 py-1 border-gray-200 hover:bg-black hover:text-white {{request()->is('admin/posts') == 'admin/posts' ? 'bg-gray-400' : ''}}">All Posts</a>
            <a
                class="inline-flex border-2 px-2 py-1 hover:bg-red-500 hover:text-white"
                href="#"
                x-data="{}"
                @click.prevent="document.querySelector('#logout-form').submit()"
            >
                Log Out
            </a>
            <form id="logout-form" method="POST" action="/logout" class="hidden">
                @csrf
            </form>
            @else
            @if(url()->current() === '/login')
                <a href="/login">Login</a>
            @endif
            @endauth
        </div>
        <!-- Posts Section -->
        <section class="w-full md:w-2/3 flex flex-col items-center px-3">

            <!-- slot -->
            {{ $slot }}

        </section>

        <!-- Sidebar Section -->
        <aside class="w-full md:w-1/3 flex flex-col items-center px-3">

            <div class="w-full bg-white shadow flex flex-col my-4 p-6">
                <p class="text-xl font-semibold pb-5">About mrhako.me</p>
                <p class="pb-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas mattis est eu odio sagittis tristique. Vestibulum ut finibus leo. In hac habitasse platea dictumst.</p>
                <a href="#" class="w-full bg-blue-800 text-white font-bold text-sm uppercase rounded hover:bg-blue-700 flex items-center justify-center px-2 py-3 mt-4">
                    Get to know us
                </a>
            </div>

            <div class="w-full bg-white shadow flex flex-col my-4 p-6">
                <p class="text-xl font-semibold pb-5">Instagram</p>
                <div class="grid grid-cols-3 gap-3">
                    <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=1">
                    <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=2">
                    <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=3">
                    <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=4">
                    <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=5">
                    <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=6">
                    <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=7">
                    <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=8">
                    <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=9">
                </div>
                <a href="#" class="w-full bg-blue-800 text-white font-bold text-sm uppercase rounded hover:bg-blue-700 flex items-center justify-center px-2 py-3 mt-6">
                    <i class="fab fa-instagram mr-2"></i> Follow @dgrzyb
                </a>
            </div>

        </aside>

    </div>

    @include('partials._footer')

</body>
</html>