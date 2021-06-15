<x-layout>
    <section class="px-6 py-8">
        <div class="hidden lg:flex justify-between mb-6">
            <a href="/admin/users"
               class="transition-colors duration-300 relative inline-flex items-center text-lg hover:text-green-500">
                <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
                    <g fill="none" fill-rule="evenodd">
                        <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                        </path>
                        <path class="fill-current"
                              d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                        </path>
                    </g>
                </svg>
                Back to Users
            </a>
        </div>
        <main class="max-w-lg mx-auto mt-10 bg-green-100 border border-green-200 p-6 rounded-xl">
            <h1 class="text-center font-bold text-xl">Edit user</h1>
            <form method="POST" action="{{ route('users.update', $user->id) }}" class="mt-10">
                @method('PUT')
                @csrf

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="name">
                        Name
                    </label>

                    <input class="border border-gray-400 p-2 w-full"
                           type="text"
                           name="name"
                           id="name"
                           value="{{ $user->name }}"
                           required>

                    @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="username">
                        Username
                    </label>

                    <input class="border border-gray-400 p-2 w-full"
                           type="text"
                           name="username"
                           id="username"
                           value="{{ $user->username }}"
                           required>

                    @error('username')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="email">
                        Email
                    </label>

                    <input class="border border-gray-400 p-2 w-full"
                           type="email"
                           name="email"
                           id="email"
                           value="{{ $user->email }}"
                           required>

                    @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="password">
                        Password <span class="font-thin">(leave blank if you don't want to change it)</span>
                    </label>

                    <input class="border border-gray-400 p-2 w-full"
                           type="password"
                           name="password"
                           id="password">

                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="level">
                        Level
                    </label>

                    <select id="level" name="level" class="bg-white border border-gray-400 p-2 w-full">
                        <option value="0" {{ $user->level == 0 ? 'selected' : '' }}>0 - Disabled</option>
                        <option value="500" {{ $user->level == 500 ? 'selected' : '' }}>500 - Writer</option>
                        <option value="700" {{ $user->level == 700 ? 'selected' : '' }}>700 - Editor</option>
                        <option value="900" {{ $user->level == 900 ? 'selected' : '' }}>900 - Administrator</option>
                        <option value="999" {{ $user->level == 999 ? 'selected' : '' }}>999 - Super Administrator</option>
                    </select>

                    @error('level')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <button type="submit" class="bg-green-400 text-white rounded py-2 px-4 hover:bg-green-500">
                        Submit
                    </button>
                </div>
            </form>
        </main>
    </section>
</x-layout>
