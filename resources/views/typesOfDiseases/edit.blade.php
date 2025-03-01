<x-app-layout>
    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-semibold mb-4">Edit Disease Type</h1>

                    <nav class="text-sm mb-4">
                        <ol class="flex space-x-2 text-gray-600">
                            <li>Types of Diseases</li>
                            <li>/</li>
                            <li class="text-gray-800 font-semibold">Edit</li>
                        </ol>
                    </nav>

                    <a href="{{ route('typesOfDiseases.index') }}" class="mb-4 flex justify-between items-center">
                        <x-primary-button class="flex items-center gap-2">
                            <x-heroicon-o-arrow-uturn-left class="w-5 h-5" />
                            <span>Back</span>
                        </x-primary-button>
                    </a>

                    <form action="{{ route('typesOfDiseases.update', $typesOfDisease->id) }}" method="POST"
                        class="mt-4">
                        @csrf
                        @method('PUT')

                        {{-- Name of Disease --}}
                        <div class="mb-4">
                            <label for="nameOfDisease" class="block text-gray-700 font-medium mb-1">Name of
                                Disease</label>
                            <input type="text" id="nameOfDisease" name="nameOfDisease"
                                value="{{ old('nameOfDisease', $typesOfDisease->nameOfDisease) }}"
                                class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                            @error('nameOfDisease')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Short Description --}}
                        <div class="mb-4">
                            <label for="shortDescription" class="block text-gray-700 font-medium mb-1">Short
                                Description</label>
                            <textarea id="shortDescription" name="shortDescription"
                                class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">{{ old('shortDescription', $typesOfDisease->shortDescription) }}</textarea>
                            @error('shortDescription')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Category Section --}}
                        <div class="mb-4" x-data="{ showNewCategory: {{ $categories->isEmpty() || old('category', $typesOfDisease->category) === 'not_in_category' ? 'true' : 'false' }} }">
                            @php
                                $hasCategories = !$categories->isEmpty();
                            @endphp

                            @if ($hasCategories)
                                {{-- Category Dropdown --}}
                                <label for="category" class="block text-gray-700 font-medium">Category</label>
                                <select id="category" name="category"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none mb-4"
                                    x-on:change="showNewCategory = ($event.target.value === 'not_in_category')">
                                    <option value="" hidden disabled>Select Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category }}"
                                            {{ old('category', $typesOfDisease->category) == $category ? 'selected' : '' }}>
                                            {{ ucfirst($category) }}
                                        </option>
                                    @endforeach
                                    <option value="not_in_category"
                                        {{ old('category', $typesOfDisease->category) == 'not_in_category' ? 'selected' : '' }}>
                                        Not in Category
                                    </option>
                                </select>
                            @endif

                            {{-- New Category Input (Appears if no categories exist OR if "Not in Category" is selected) --}}
                            <div x-show="showNewCategory" class="mt-2" x-cloak>
                                <label for="new_category" class="block text-gray-700 font-medium mb-1">New
                                    Category</label>
                                <input type="text" id="new_category" name="category"
                                    value="{{ old('category', $typesOfDisease->category == 'not_in_category' ? '' : $typesOfDisease->category) }}"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                                    placeholder="Enter new category">
                            </div>
                        </div>

                        {{-- Submit Button --}}
                        <div class="flex justify-center mt-5">
                            <x-primary-button type="submit"
                                class="flex items-center gap-2 text-white hover:text-white">
                                <span>Update</span>
                                <x-heroicon-o-check-badge class="w-5 h-5 inline" />
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
