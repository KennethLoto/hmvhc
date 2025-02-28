<x-app-layout>
    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-semibold mb-4">Users</h1>

                    <nav class="text-sm mb-4">
                        <ol class="flex space-x-2 text-gray-600">
                            <li>Users</li>
                            <li>/</li>
                            <li class="text-gray-800 font-semibold">Add</li>
                        </ol>
                    </nav>

                    <a href="{{ route('users.index') }}" class="mb-4 flex justify-between items-center">
                        <x-primary-button class="flex items-center gap-2">
                            <x-heroicon-o-arrow-uturn-left class="w-5 h-5" />
                            <span>Back</span>
                        </x-primary-button>
                    </a>

                    <form action="{{ route('users.store') }}" method="POST" class="mt-4">
                        @csrf

                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 font-medium mb-1">Name</label>
                            <input type="text" id="name" name="name"
                                class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                            @error('name')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="email" class="block text-gray-700 font-medium mb-1">Email</label>
                            <input type="email" id="email" name="email"
                                class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                            @error('email')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <div class="mb-4" x-data="{ show: false }">
                                <label for="password" class="block text-gray-700 font-medium mb-1">Password</label>
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

                        {{-- <div class="mb-4">
                            <label for="role" class="block text-gray-700 font-medium mb-1">Role</label>
                            <select name="role" id="role"
                                class="w-full mt-2 px-4 py-2 border border-gray-600 bg-white text-gray-800 rounded-lg
                                focus:outline-none focus:ring-2 focus:ring-indigo-500 appearance-none">
                                <option value="Applicant" selected>Applicant</option>
                                <option value="Staff">Staff</option>
                                <option value="Admin">Admin</option>
                            </select>
                        </div> --}}

                        <div class="flex justify-center mt-5">
                            <x-primary-button type="submit"
                                class="flex items-center gap-2 text-white hover:text-white">
                                <span>Save</span>
                                <x-heroicon-o-check-badge class="w-5 h-5 inline" />
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
