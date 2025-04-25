<!-- Modal Overlay -->
<div class="fixed inset-0 flex items-center justify-center z-50 bg-black/70">
    <!-- Modal Container -->
    <div class="bg-white rounded-lg shadow-lg w-full max-w-lg p-6 relative">

        <!-- Close Button -->

        <button class="absolute top-4 right-6 text-lg text-gray-500 cursor-pointer hover:text-red-600"
            wire:click="closeModal">✕</button>
        <!-- Modal Title -->
        <h2 class="text-2xl font-semibold mb-4 text-gray-800">Add / Edit Member</h2>

        <!-- Form -->
        <form wire:submit.prevent="saveMember" class="space-y-4">

            <!-- Flash Messages -->
            @if (session()->has('memberMessage'))
                <div class="text-green-600 font-medium">{{ session('memberMessage') }}</div>
            @endif

            @if (session()->has('error'))
                <div class="text-red-600 font-medium">{{ session('error') }}</div>
            @endif

            <!-- First Name -->
            <div>
                <label for="firstName" class="block text-sm font-medium text-gray-700">First Name</label>
                <input placeholder="Enter first name" type="text" wire:model.defer="memberForm.firstName"
                    id="firstName"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-xs p-2 focus:ring focus:ring-indigo-300 focus:outline-none" />
                @error('memberForm.firstName')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Last Name -->
            <div>
                <label for="lastName" class="block text-sm font-medium text-gray-700">Last Name</label>
                <input placeholder="Enter last name" type="text" wire:model.defer="memberForm.lastName"
                    id="lastName"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-xs p-2 focus:ring focus:ring-indigo-300 focus:outline-none" />
                @error('memberForm.lastName')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input placeholder="Enter email" type="email" wire:model.defer="memberForm.email" id="email"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-xs p-2 focus:ring focus:ring-indigo-300 focus:outline-none" />
                @error('memberForm.email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Phone -->
            <div>
                <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                <input placeholder="Enter phone number" type="text" wire:model.defer="memberForm.phone"
                    id="phone"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-xs p-2 focus:ring focus:ring-indigo-300 focus:outline-none" />
                @error('memberForm.phone')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Submit Button + Spinner -->
            <div class="flex justify-end items-center gap-4">
                <button type="submit" wire:loading.attr="disabled"
                    class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 focus:outline-none">
                    Save
                </button>

                <div wire:loading wire:target="saveMember" class="flex items-center">
                    <svg class="animate-spin h-5 w-5 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                            stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 1 1 8 8A8 8 0 0 1 4 12z"></path>
                    </svg>
                </div>
            </div>
        </form>
    </div>
</div>
