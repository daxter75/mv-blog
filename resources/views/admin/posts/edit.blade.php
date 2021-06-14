<x-layout>
    <section class="px-6 py-8">
        <div class="hidden lg:flex justify-between mb-6">
            <a href="/admin/posts"
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
                Back to Posts
            </a>
        </div>
        <main class="max-w-lg mx-auto mt-10 bg-green-100 border border-green-200 p-6 rounded-xl">
            <h1 class="text-center font-bold text-xl">Edit post</h1>
            <form method="POST" action="{{ route('posts.update', $post->id) }}" class="mt-10">
                @method('PUT')
                @csrf

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="name">
                        Title
                    </label>

                    <input class="border border-gray-400 p-2 w-full"
                           type="text"
                           name="title"
                           id="title"
                           value="{{ $post->title }}"
                           required>

                    @error('title')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="username">
                        Slug
                    </label>

                    <input class="border border-gray-400 p-2 w-full"
                           type="text"
                           name="slug"
                           id="slug"
                           value="{{ $post->slug }}"
                           required>

                    @error('slug')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="email">
                        Excerpt
                    </label>

                    <textarea class="border border-gray-400 p-2 w-full"
                           name="excerpt"
                           id="excerpt"
                           rows="4"
                           cols="50"
                           required
                    >{{ $post->excerpt }}</textarea>
                    @error('excerpt')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="email">
                        Body
                    </label>

                    <textarea class="border border-gray-400 p-2 w-full"
                           name="body"
                           id="body"
                           rows="8"
                           cols="50"
                           required
                    >{{ $post->body }}</textarea>
                    @error('body')
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
