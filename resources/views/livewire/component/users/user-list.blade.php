<div class="w-full lg:w-2/3">
    <h2 class="text-2xl font-medium text-gray-800 mb-6">Total Users: {{ $totalUsersCount }}</h2>

    <div class="overflow-x-auto shadow border border-gray-200 sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Username</th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Email</th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Created At</th>
                    <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">Edit</span>
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($users as $user)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            {{ $user->username }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $user->email }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $user->created_at }}
                        </td>
                        <td class="px-6 flex justify-end gap-4 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <button wire:click="openUpdateUserModal({{ $user->id }})"
                                class="text-indigo-600 hover:text-indigo-900 cursor-pointer">Edit</button>
                            <button wire:click="deleteUser({{ $user->id }})"
                                class="text-red-600 hover:text-red-900 cursor-pointer">Delete</button>
                        </td>
                    </tr>
                @endforeach
                @if ($users->isEmpty())
                    <tr>
                        <td colspan="4" class="text-center py-4 text-gray-500">
                            No users found.
                        </td>
                    </tr>
                @endif

            </tbody>

        </table>

    </div>
    <div class="my-6 mt-4 ">
        {{-- Pagination --}}
        {{ $users->links() }}
    </div>
</div>
