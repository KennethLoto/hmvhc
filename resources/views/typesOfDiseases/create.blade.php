<x-app-layout>
    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-semibold mb-4">Types of Diseases</h1>

                    <nav class="text-sm mb-4">
                        <ol class="flex space-x-2 text-gray-600">
                            <li>Types of Diseases</li>
                            <li>/</li>
                            <li class="text-gray-800 font-semibold">Add</li>
                        </ol>
                    </nav>

                    <a href="{{ route('typesOfDiseases.index') }}" class="mb-4 flex justify-between items-center">
                        <x-primary-button class="flex items-center gap-2">
                            <x-heroicon-o-arrow-uturn-left class="w-5 h-5" />
                            <span>Back</span>
                        </x-primary-button>
                    </a>

                    <form action="{{ route('typesOfDiseases.store') }}" method="POST" class="mt-4">
                        @csrf

                        <div class="mb-4">
                            <label for="nameOfDisease" class="block text-gray-700 font-medium mb-1">Name of
                                Disease</label>
                            <input type="text" id="nameOfDisease" name="nameOfDisease"
                                class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                            @error('nameOfDisease')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="shortDescription" class="block text-gray-700 font-medium mb-1">Short
                                Description</label>
                            <textarea type="text" id="shortDescription" name="shortDescription"
                                class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"></textarea>
                            @error('shortDescription')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4" x-data="{ showNewCategory: {{ $categories->isEmpty() ? 'true' : 'false' }} }">
                            @php
                                $hasCategories = !$categories->isEmpty();
                            @endphp

                            @if ($hasCategories)
                                {{-- Show Dropdown when categories exist --}}
                                <label for="category" class="block text-gray-700 font-medium">Category</label>
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
                                </select>
                            @endif

                            {{-- New Category Input (Always visible if no categories exist, otherwise hidden until selected) --}}
                            <div x-show="showNewCategory" class="mt-2" x-cloak>
                                <label for="new_category" class="block text-gray-700 font-medium mb-1">New
                                    Category</label>
                                <input type="text" id="new_category" name="new_category"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                                    placeholder="Enter new category" x-bind:required="showNewCategory">
                            </div>
                        </div>

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
