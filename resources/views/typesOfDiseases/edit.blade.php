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
                            <li class="text-gray-800 font-semibold">Edit</li>
                        </ol>
                    </nav>

                    <form action="{{ route('typesOfDiseases.update', $typesOfDisease->id) }}" method="POST"
                        class="mt-4">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-5 gap-6">
                            {{-- Column 1 (Name & Category) --}}
                            <div class="col-span-2">
                                {{-- Name of Disease --}}
                                <div class="mb-4">
                                    <label for="nameOfDisease" class="block text-gray-700 font-medium mb-1">Name of
                                        Disease</label>
                                    <input type="text" id="nameOfDisease" name="nameOfDisease"
                                        value="{{ old('nameOfDisease', $typesOfDisease->nameOfDisease) }}"
                                        placeholder="e.g., Influenza (Flu)"
                                        class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                                    @error('nameOfDisease')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                {{-- Category --}}
                                <div x-data="{ showNewCategory: {{ $categories->isEmpty() || old('category', $typesOfDisease->category) === 'not_in_category' ? 'true' : 'false' }} }">
                                    @php
                                        $hasCategories = !$categories->isEmpty();
                                    @endphp

                                    @if ($hasCategories)
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

                                    {{-- New Category Input --}}
                                    <div x-show="showNewCategory" class="mt-2" x-cloak>
                                        <label for="new_category" class="block text-gray-700 font-medium mb-1">New
                                            Category</label>
                                        <input type="text" id="new_category" name="category"
                                            value="{{ old('category', $typesOfDisease->category == 'not_in_category' ? '' : $typesOfDisease->category) }}"
                                            placeholder="Enter new category"
                                            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                                    </div>
                                </div>
                            </div>

                            {{-- Column 2 (Description) --}}
                            <div class="col-span-3">
                                {{-- Short Description --}}
                                <div class="mb-4">
                                    <label for="shortDescription" class="block text-gray-700 font-medium mb-1">Short
                                        Description</label>
                                    <textarea id="shortDescription" name="shortDescription"
                                        placeholder="e.g., A contagious respiratory illness caused by influenza viruses, leading to fever, cough, and body aches."
                                        class="w-full border border-gray-300 rounded-lg px-3 h-32 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">{{ old('shortDescription', $typesOfDisease->shortDescription) }}</textarea>
                                    @error('shortDescription')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        {{-- Submit Button --}}
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
                                <x-heroicon-o-check-badge class="w-5 h-5 inline" />
                                <span>Save Changes</span>
                            </x-primary-button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
