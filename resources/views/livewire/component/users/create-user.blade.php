<div class="w-full  md:w-1/3">
    <div class="bg-white shadow py-8 px-6 rounded-lg">
        <h2 class="text-2xl font-medium text-gray-800 text-center mb-6">Add New User</h2>
        <form wire:submit.prevent="createNewUser" class="space-y-6">
            <div>
                <label for="username" class="block text-sm font-medium text-gray-700"> Username </label>
                <input wire:model="newUserForm.username" id="username" name="username" type="text"
                    autocomplete="username" placeholder="Enter username"
                    class="mt-1 block w-full px-3 py-2 border border-gray-200 rounded-md shadow-xs placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <div>
                    @error('newUserForm.username')
                        <span class="error text-red-500">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700"> Email address </label>
                <input wire:model="newUserForm.email" id="email" name="email" type="email" autocomplete="email"
                    placeholder="example@gmail.com"
                    class="mt-1 block w-full px-3 py-2 border border-gray-200 rounded-md shadow-xs placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <div>
                    @error('newUserForm.email')
                        <span class="error text-red-500">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700"> Password </label>
                <input wire:model="newUserForm.password" id="password" name="password" type="password"
                    autocomplete="current-password" placeholder="********"
                    class="mt-1 block w-full px-3 py-2 border border-gray-200 rounded-md shadow-xs placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <div>
                    @error('newUserForm.password')
                        <span class="error text-red-500">{{ $message }}</span>
                    @enderror
                </div>

            </div>
            {{-- <div wire:loading>
                Loading...
            </div> --}}

            <div>
                <button type="submit" wire:loading.attr="disabled"
                    class="w-full cursor-pointer flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Create a user
                </button>
            </div>
        </form>
    </div>
</div>
