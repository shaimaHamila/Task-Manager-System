<!-- Modal -->
<div>
    <div class="fixed inset-0 z-50 flex items-center justify-center bg-black/70">

        <div class="bg-white w-full max-w-lg p-6 rounded shadow-xl relative">
            <!-- Close button -->
            <button class="absolute top-4 right-6 text-lg text-gray-500 cursor-pointer hover:text-red-600"
                wire:click="closeModal">✕</button>

            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Edit User</h2>

            <form wire:submit.prevent="updateUser">
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Username</label>
                    <input type="text" wire:model.defer="selectedUser.username"
                        class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    @error('selectedUser.username')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" wire:model.defer="selectedUser.email"
                        class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    @error('selectedUser.email')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700">Password (optional)</label>
                    <input type="password" wire:model.defer="selectedUser.password"
                        class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    @error('selectedUser.password')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex justify-end">
                    <button type="submit"
                        class=" cursor-pointer flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
