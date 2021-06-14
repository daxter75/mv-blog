<x-layout>
    <header class="max-w-xl mx-auto mt-20 text-center">
        <h1 class="text-4xl">
            Users
        </h1>
        <p class="text-sm mt-14">
            <a href="/admin/users/create" class="bg-gray-100 border rounded px-4 py-2 hover:bg-green-100 hover:border-green-300 cursor-pointer">+ Add new</a>
        </p>
    </header>

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">

        @if($users->isNotEmpty())

            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Username
                    </th>
                    <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Level
                    </th>
                    <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Actions
                    </th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                @foreach($users as $user)
                    <tr {{ $user->level < 100 ? 'class=bg-red-100' : '' }}>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div>
                                    <div class="text-sm font-medium text-gray-900">
                                        {{ $user->name }}
                                    </div>
                                    <div class="text-sm text-gray-500">
                                        {{ $user->email }}
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                              {{ $user->username }}
                            </span>
                        </td>
                        <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $user->level }}
                        </td>
                        <td class="inline-flex px-4 py-6 whitespace-nowrap text-left text-sm font-medium">
                            <a href="/admin/users/{{ $user->id }}" class="text-blue-600 hover:text-blue-900">View</a>
                            <a href="/admin/users/{{ $user->id }}/edit" class="ml-2 text-yellow-600 hover:text-yellow-900">Edit</a>
                            <form action="/admin/users/{{ $user->id }}" method="POST" onsubmit="return ConfirmDelete()">
                                {!! csrf_field() !!}
                                {!! method_field('DELETE') !!}
                                <button type="submit" id="delete-user-{{ $user->id }}" class="ml-2 text-red-600 hover:text-red-900">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        @else
            <p class="text-center">No users yet</p>
        @endif
    </main>
</x-layout>
