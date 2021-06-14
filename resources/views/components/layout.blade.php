<!doctype html>

<title>MV Blog</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

<body style="font-family: Open Sans, sans-serif">
<section class="px-6 py-8">
    <nav class="md:flex md:justify-between md:items-center">
        <div>
            <a href="/">
                <img src="/images/logo.svg" alt="MV Logo" width="165" height="16">
            </a>
        </div>

        <div x-data="{ showMenu: false }" class="mt-8 md:mt-0 flex items-center">
            @auth
                <div @click="showMenu = !showMenu" class="flex text-xs font-bold text-white bg-green-700 p-3 rounded uppercase cursor-pointer z-20">
                    <span>Hi, {{ auth()->user()->name }}</span>
                    <span>
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-down" class="svg-inline--fa fa-angle-down fa-w-10 w-2 ml-2" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path fill="currentColor" d="M143 352.3L7 216.3c-9.4-9.4-9.4-24.6 0-33.9l22.6-22.6c9.4-9.4 24.6-9.4 33.9 0l96.4 96.4 96.4-96.4c9.4-9.4 24.6-9.4 33.9 0l22.6 22.6c9.4 9.4 9.4 24.6 0 33.9l-136 136c-9.2 9.4-24.4 9.4-33.8 0z"></path></svg>
                    </span>
                </div>
                <div x-show="showMenu" class="user-menu">
                    <div class="absolute top-0 left-0 w-full h-full bg-black opacity-0 z-10" @click="showMenu = false"></div>
                    <div class="absolute top-20 right-6 bg-green-700 text-white w-32 rounded p-2 z-20">
                        <a href="/admin/posts" class="tracking-wide pl-3 cursor-pointer hover:text-green-200">Posts</a>
                        @if (auth()->user()->isAdmin())
                            <a href="/admin/users" class="tracking-wide pl-3 cursor-pointer hover:text-green-200">Users</a>
                        @endif
                        <form method="post" action="/logout" class="mt-4 pl-3 pt-2 hover:text-green-200 border-t">
                            @csrf
                            <button type="submit">Logout</button>
                        </form>
                    </div>
                </div>
            @else
                <a href="/register" class="text-xs font-bold uppercase">Register</a>
                <a href="/login" class="ml-6 text-xs font-bold uppercase">Login</a>
            @endauth
        </div>
    </nav>

    {{ $slot }}

    <footer class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">
        <h5 class="text-3xl">MV simple Blog App</h5>
        <p class="text-sm mt-3">&copy; 2021 MV Inc.</p>

    </footer>
</section>

<x-flash />
</body>
<script>
    function ConfirmDelete()
    {
        return confirm("Are you sure?");
    }
</script>
