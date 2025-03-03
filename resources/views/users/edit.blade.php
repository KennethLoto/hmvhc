<x-app-layout>
    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <nav class="text-lg mb-4">
                        <ol class="flex items-center space-x-2 text-gray-600">
                            <li class="flex items-center">
                                <x-heroicon-o-user-group class="w-5 h-5" />
                            </li>
                            <li>Users</li>
                            <li>/</li>
                            <li>List</li>
                            <li>></li>
                            <li class="text-gray-800 font-semibold">Edit</li>
                        </ol>
                    </nav>

                    <form action="{{ route('users.update', $user->id) }}" method="POST" class="mt-4">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 font-medium mb-1">Name</label>
                            <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}"
                                class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                            @error('name')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="email" class="block text-gray-700 font-medium mb-1">Email</label>
                            <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}"
                                class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                            @error('email')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <div class="mb-4" x-data="{ show: false }">
                                <label for="password" class="block text-gray-700 font-medium mb-1">Password (Leave blank
                                    if not changing)</label>
                                <div class="relative">
                                    <input :type="show ? 'text' : 'password'" id="password" name="password"
                                        class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none pr-10">
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
                        </div>

                        <div class="flex justify-end space-x-4">
                            <a href="{{ route('users.index') }}">
                                <x-secondary-button
                                    class="flex items-center gap-2 border border-gray-600 text-gray-700 hover:bg-gray-100">
                                    <x-heroicon-o-x-circle class="w-5 h-5" />
                                    <span>Cancel</span>
                                </x-secondary-button>
                            </a>

                            <x-primary-button type="submit"
                                class="flex items-center gap-2 text-white hover:text-white">
                                <span>Save Changes</span>
                                <x-heroicon-o-check-badge class="w-5 h-5 inline" />
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
