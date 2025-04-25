<div class="max-w-6xl mx-auto p-5 mt-10">
    @if (session('deleteUserSession'))
        <div class="bg-red-100 border mb-4 border-red-300 text-green-700 px-4 py-3 rounded relative" role="alert">
            {{ session('deleteUserSession') }}
        </div>
    @endif
    <div class="flex flex-col lg:flex-row gap-16">

        <!-- TUsers display table -->
        @include('livewire.component.users.user-list', ['users' => $users, 'totalUsersCount' => $count])


        <!-- Add user Form -->
        @include('livewire.component.users.create-user', ['newUserForm' => $newUserForm])

    </div>

    {{-- Update user modal --}}
    @if ($showModal)
        <livewire:component.users.update-user :selectedUser="$selectedUser" />
    @endif

</div>
