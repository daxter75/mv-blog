@if(session()->has('success'))
    <div x-data="{ show: true }"
         x-init="setTimeout(() => show = false, 3000)"
         x-show="show"
         class="fixed top-2 w-1/3 left-1/3 my-0 mx-auto bg-green-800 text-white text-center px-6 py-3 rounded">
        <p>{{ session('success') }}</p>
    </div>
@endif
