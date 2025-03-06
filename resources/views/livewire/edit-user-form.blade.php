<div x-data="{ open: false }">
    {{-- Button to Open Modal --}}
    <button @click="open = true" class="text-blue-600 hover:underline">
        <x-heroicon-o-pencil class="w-5 h-5 inline" />
        Edit
    </button>

    {{-- Modal --}}
    <div x-show="open" x-cloak class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 z-50">
        <div class="bg-white rounded-lg shadow-lg max-w-md w-full p-6">
            <h2 class="text-xl font-semibold mb-4">Edit User</h2>

            <form action="{{ route('users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-medium mb-1">Name</label>
                    <input type="text" id="name" name="name" value="{{ $user->name }}"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500">
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-gray-700 font-medium mb-1">Email</label>
                    <input type="email" id="email" name="email" value="{{ $user->email }}"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500">
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-gray-700 font-medium mb-1">New Password (optional)</label>
                    <input type="password" id="password" name="password"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500">
                    @error('password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end space-x-4">
                    <button type="button" @click="open = false"
                        class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600">
                        Cancel
                    </button>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
