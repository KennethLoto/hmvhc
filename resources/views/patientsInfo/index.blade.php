<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <nav class="text-lg mb-4 flex flex-col sm:flex-row sm:justify-between gap-2 sm:gap-0">
                        <!-- Breadcrumb Navigation -->
                        <ol class="flex items-center space-x-2 text-gray-600 mb-2 sm:0">
                            <li class="flex items-center">
                                <x-heroicon-o-identification class="w-5 h-5" />
                            </li>
                            <li>Patients Info</li>
                            <li>/</li>
                            <li class="text-gray-800 font-semibold">List</li>
                        </ol>

                        <!-- Add Button -->
                        <a href="{{ route('patientsInfo.create') }}" class="flex items-center">
                            <x-primary-button class="flex items-center gap-2">
                                <x-heroicon-o-plus-circle class="w-5 h-5" />
                                <span>Add</span>
                            </x-primary-button>
                        </a>
                    </nav>

                    @include('sweetalert::alert')   

                    @livewire('patients-info-table')

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
