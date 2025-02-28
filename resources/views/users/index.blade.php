<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-semibold mb-4">Users</h1>

                    <nav class="text-sm mb-4">
                        <ol class="flex space-x-2 text-gray-600">
                            <li>Users</li>
                            <li>/</li>
                            <li class="text-gray-800 font-semibold">List</li>
                        </ol>
                    </nav>

                    <a href="{{ route('users.create') }}" class="justify-start items-center">
                        <x-primary-button class="flex items-center gap-2">
                            <x-heroicon-o-plus-circle class="w-5 h-5" />
                            <span>Add</span>
                        </x-primary-button>
                    </a>

                    @include('sweetalert::alert')

                    {{-- Render the Livewire component --}}
                    @livewire('users-table')

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
