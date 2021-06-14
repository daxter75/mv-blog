<x-layout>
    <header class="max-w-xl mx-auto mt-20 text-center">
        <h1 class="text-4xl">
            Posts
        </h1>
        <p class="text-sm mt-14">
            <a href="/admin/posts/create" class="bg-gray-100 border rounded px-4 py-2 hover:bg-green-100 hover:border-green-300 cursor-pointer">+ Add new</a>
        </p>
    </header>

    <main class="max-w-full mx-auto mt-6 lg:mt-20 space-y-6">

        @if($posts->isNotEmpty())

            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Title
                    </th>
                    <th scope="col" class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Excerpt
                    </th>
                    <th scope="col" class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Body
                    </th>
                    <th scope="col" class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Author
                    </th>
                    <th scope="col" class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Modified
                    </th>
                    <th scope="col" class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Actions
                    </th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                @foreach($posts as $post)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div>
                                    <div class="text-sm font-medium text-gray-900">
                                        {{ $post->title }}
                                    </div>
                                    <div class="text-xs text-gray-500">
                                        {{ $post->slug }}
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="px-2 py-4 whitespace-nowrap text-sm text-gray-500">
                          {{ $post->excerpt }}
                        </td>
                        <td class="px-2 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ Str::limit($post->body, 50) }}
                        </td>
                        <td class="px-2 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $post->author->name }}
                        </td>
                        <td class="px-2 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $post->updated_at->diffForHumans() }}
                        </td>
                        <td class="inline-flex px-2 py-6 whitespace-nowrap text-left text-sm font-medium">
                            <a href="/admin/posts/{{ $post->id }}" class="text-blue-600 hover:text-blue-900">View</a>
                            <a href="/admin/posts/{{ $post->id }}/edit" class="ml-2 text-yellow-600 hover:text-yellow-900">Edit</a>
                            <form action="/admin/posts/{{ $post->id }}" method="POST" onsubmit="return ConfirmDelete()">
                                {!! csrf_field() !!}
                                {!! method_field('DELETE') !!}
                                <button type="submit" id="delete-post-{{ $post->id }}" class="ml-2 text-red-600 hover:text-red-900">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
            {{ $posts->links() }}
        @else
            <p class="text-center">No posts yet</p>
        @endif
    </main>
</x-layout>
