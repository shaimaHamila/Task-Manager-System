<div class="w-full max-w-6xl mx-auto mt-10">
    <!-- Title Section -->
    <div class="text-center mb-8">
        <h2 class="text-3xl font-semibold text-gray-800">Members Management</h2>
    </div>

    <div class="flex justify-between items-center mb-6">
        <!-- Total Members Count -->
        <h2 class="text-xl font-medium text-gray-800">Total Members: {{ $totalMembersCount }}</h2>

        <!-- Add New Member Button -->
        <button wire:click="openMemberModal()"
            class="cursor-pointer px-4 py-2 bg-indigo-600 text-white font-medium text-sm rounded-md hover:bg-indigo-700 focus:outline-none">
            Add New Member
        </button>
    </div>

    <!-- Table Section -->
    <div class="overflow-x-auto bg-white shadow rounded-lg border border-gray-200">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-slate-200 ">
                <tr>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">
                        ID</th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">
                        First Name</th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">
                        Last Name</th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">
                        Email</th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">
                        Phone Number</th>
                    <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">Edit</span>
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($members as $member)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            {{ $member->id }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            {{ $member->firstName }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            {{ $member->lastName }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $member->email }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $member->phone }}</td>
                        <td class="px-6 flex justify-end gap-4 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <button wire:click="openMemberModal({{ $member->id }})"
                                class="text-indigo-600 hover:text-indigo-900 cursor-pointer">Edit</button>
                            <button wire:click="deleteMember({{ $member->id }})"
                                class="text-red-600 hover:text-red-900 cursor-pointer">Delete</button>
                        </td>
                    </tr>
                @endforeach

                @if ($members->isEmpty())
                    <tr>
                        <td colspan="5" class="text-center py-4 text-gray-500">
                            No Members found.
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>

    <!-- Pagination Section -->
    <div class="my-6 mt-4 text-center">
        {{-- Pagination --}}
        {{ $members->links() }}
    </div>
    {{-- member modal --}}
    @if ($isMemberModalOpen)
        <livewire:component.members.form-members :memberForm="$memberForm" />
    @endif
</div>
