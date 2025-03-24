<div x-data="{ open: {{ $errors->any() ? 'true' : 'false' }} }">
    {{-- Button to Open Modal --}}
    <x-primary-button @click="open = true" class="flex items-center gap-2">
        <x-heroicon-o-plus-circle class="w-5 h-5" />
        <span>Add</span>
    </x-primary-button>

    {{-- Modal --}}
    <div x-show="open" x-cloak class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 z-50">
        <div class="bg-white rounded-lg shadow-lg max-w-md w-full p-6">
            <h2 class="text-xl font-semibold mb-4">Add User</h2>

            <form action="{{ route('users.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-medium mb-1">Name</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500">
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-gray-700 font-medium mb-1">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500">
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4" x-data="{ show: false }">
                    <label for="password" class="block text-gray-700 font-medium mb-1">Password</label>
                    <div class="relative">
                        <input :type="show ? 'text' : 'password'" id="password" name="password"
                            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 pr-10">
                        <button type="button" @click="show = !show"
                            class="absolute inset-y-0 right-3 flex items-center text-gray-600">
                            <x-heroicon-o-eye x-show="!show" class="w-5 h-5" />
                            <x-heroicon-o-eye-slash x-show="show" class="w-5 h-5" />
                        </button>
                    </div>
                    @error('password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end space-x-4">
                    <a @click="open = false">
                        <x-secondary-button
                            class="flex items-center gap-2 border border-gray-600 text-gray-700 hover:bg-gray-100">
                            <x-heroicon-o-x-circle class="w-5 h-5" />
                            <span>Cancel</span>
                        </x-secondary-button>
                    </a>

                    <x-primary-button class="flex items-center gap-2 text-white hover:text-white">
                        <x-heroicon-o-check-badge class="w-5 h-5 inline" />
                        <span>Save</span>
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</div>
