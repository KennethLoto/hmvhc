<x-app-layout>
    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <nav class="text-md mb-10">
                        <ol class="flex space-x-3 text-gray-500 items-center">
                            <li class="flex items-center">
                                <x-heroicon-o-link-slash class="w-5 h-5 text-gray-400" />
                                <span class="ml-1">Types of Diseases</span>
                            </li>
                            <li>/</li>
                            <li>List</li>
                            <li>/</li>
                            <li class="text-gray-800 font-semibold">Add</li>
                        </ol>
                    </nav>

                    <form action="{{ route('typesOfDiseases.store') }}" method="POST" class="mt-4">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-5 gap-6">
                            <!-- First Column (2/5) -->
                            <div class="md:col-span-2">
                                <div class="mb-4">
                                    <label for="nameOfDisease" class="block text-gray-700 font-medium mb-1">
                                        Name of Disease
                                    </label>
                                    <input type="text" id="nameOfDisease" name="nameOfDisease"
                                        class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                                        placeholder="e.g., Influenza (Flu)">
                                    @error('nameOfDisease')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div x-data="{ showNewCategory: {{ $categories->isEmpty() ? 'true' : 'false' }} }">
                                    @php
                                        $hasCategories = !$categories->isEmpty();
                                    @endphp

                                    @if ($hasCategories)
                                        <label for="category" class="block text-gray-700 font-medium">
                                            Category
                                        </label>
                                        <select id="category" name="category"
                                            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none mb-4"
                                            x-on:change="showNewCategory = ($event.target.value === 'not_in_category')">
                                            <option value="" hidden selected disabled>Select Category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->category }}"
                                                    {{ old('category') == $category->category ? 'selected' : '' }}>
                                                    {{ ucfirst($category->category) }}
                                                </option>
                                            @endforeach
                                            <option value="not_in_category">Not in Category</option>
                                        </select>
                                    @endif

                                    <div x-show="showNewCategory" class="mb-4 mt-2" x-cloak>
                                        <label for="new_category" class="block text-gray-700 font-medium mb-1">
                                            New Category
                                        </label>
                                        <input type="text" id="new_category" name="new_category"
                                            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                                            placeholder="Enter new category" x-bind:required="showNewCategory">
                                    </div>
                                </div>
                            </div>

                            <!-- Second Column (3/5) -->
                            <div class="md:col-span-3">
                                <div class="mb-4">
                                    <label for="shortDescription" class="block text-gray-700 font-medium mb-1">
                                        Short Description
                                    </label>
                                    <textarea id="shortDescription" name="shortDescription"
                                        class="w-full border border-gray-300 rounded-lg px-3 py-2 h-32 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                                        placeholder="e.g., A contagious respiratory illness caused by influenza viruses, leading to fever, cough, and body aches."></textarea>
                                    @error('shortDescription')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="flex justify-end space-x-4">
                            <a href="{{ route('typesOfDiseases.index') }}">
                                <x-secondary-button
                                    class="flex items-center gap-2 border border-gray-600 text-gray-700 hover:bg-gray-100">
                                    <x-heroicon-o-x-circle class="w-5 h-5" />
                                    <span>Cancel</span>
                                </x-secondary-button>
                            </a>

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
