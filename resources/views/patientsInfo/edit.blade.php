<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <nav class="text-md mb-10">
                        <ol class="flex space-x-3 text-gray-500 items-center">
                            <li class="flex items-center">
                                <x-heroicon-o-identification class="w-5 h-5 text-gray-400" />
                                <span class="ml-1">Patients Info</span>
                            </li>
                            <li>/</li>
                            <li>List</li>
                            <li>/</li>
                            <li class="text-gray-800 font-semibold">Edit</li>
                        </ol>
                    </nav>

                    <form action="{{ route('patientsInfo.update', $patientsInfo->id) }}" method="POST" class="mt-4">
                        @csrf
                        @method('PUT')

                        <!-- Personal Information Row -->
                        <div class="mb-6">
                            <h3 class="font-semibold text-lg mb-2">Personal Information</h3>
                            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
                                <div>
                                    <label for="firstName" class="block text-gray-700 font-medium">First Name <span
                                            class="text-red-500">*</span></label>
                                    <input type="text" id="firstName" name="firstName"
                                        class="w-full border rounded-lg px-3 py-2"
                                        value="{{ old('firstName', $patientsInfo->firstName) }}">
                                    @error('firstName')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="middleName" class="block text-gray-700 font-medium">Middle Name
                                        (Optional)</label>
                                    <input type="text" id="middleName" name="middleName"
                                        class="w-full border rounded-lg px-3 py-2"
                                        value="{{ old('middleName', $patientsInfo->middleName) }}">
                                </div>
                                <div>
                                    <label for="lastName" class="block text-gray-700 font-medium">Last Name <span
                                            class="text-red-500">*</span></label>
                                    <input type="text" id="lastName" name="lastName"
                                        class="w-full border rounded-lg px-3 py-2"
                                        value="{{ old('lastName', $patientsInfo->lastName) }}">
                                    @error('lastName')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="suffix" class="block text-gray-700 font-medium">Suffix
                                        (Optional)</label>
                                    <select id="suffix" name="suffix" class="w-full border rounded-lg px-3 py-2">
                                        <option value="" selected disabled hidden>Select suffix</option>
                                        <option value="">None</option>
                                        <option value="Jr."
                                            {{ old('suffix', $patientsInfo->suffix) == 'Jr.' ? 'selected' : '' }}>Jr.
                                        </option>
                                        <option value="Jra."
                                            {{ old('suffix', $patientsInfo->suffix) == 'Jra.' ? 'selected' : '' }}>Jra.
                                        </option>
                                        <option value="Sr."
                                            {{ old('suffix', $patientsInfo->suffix) == 'Sr.' ? 'selected' : '' }}>Sr.
                                        </option>
                                        <option value="II"
                                            {{ old('suffix', $patientsInfo->suffix) == 'II' ? 'selected' : '' }}>II
                                        </option>
                                        <option value="III"
                                            {{ old('suffix', $patientsInfo->suffix) == 'III' ? 'selected' : '' }}>III
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Address Row -->
                        <div class="mb-6">
                            <h3 class="font-semibold text-lg mb-2">Address</h3>
                            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
                                <div>
                                    <label for="province" class="block text-gray-700 font-medium">Province <span
                                            class="text-red-500">*</span></label>
                                    <input type="text" id="province" name="province"
                                        class="w-full border rounded-lg px-3 py-2"
                                        value="{{ old('province', $patientsInfo->province) }}">
                                    @error('province')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="municipality" class="block text-gray-700 font-medium">Municipality <span
                                            class="text-red-500">*</span></label>
                                    <input type="text" id="municipality" name="municipality"
                                        class="w-full border rounded-lg px-3 py-2"
                                        value="{{ old('municipality', $patientsInfo->municipality) }}">
                                    @error('municipality')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="barangay" class="block text-gray-700 font-medium">Barangay <span
                                            class="text-red-500">*</span></label>
                                    <input type="text" id="barangay" name="barangay"
                                        class="w-full border rounded-lg px-3 py-2"
                                        value="{{ old('barangay', $patientsInfo->barangay) }}">
                                    @error('barangay')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Contact Information Row -->
                        <div class="mb-6">
                            <h3 class="font-semibold text-lg mb-2">Contact Information</h3>
                            <div class="grid grid-cols-1 sm:grid-cols-4 gap-4">
                                <div>
                                    <label for="contactNumber" class="block text-gray-700 font-medium">Contact Number
                                        <span class="text-red-500">*</span></label>
                                    <input type="text" id="contactNumber" name="contactNumber"
                                        class="w-full border rounded-lg px-3 py-2"
                                        value="{{ old('contactNumber', $patientsInfo->contactNumber) }}">
                                    @error('contactNumber')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="email" class="block text-gray-700 font-medium">Email <span
                                            class="text-red-500">*</span></label>
                                    <input type="email" id="email" name="email"
                                        class="w-full border rounded-lg px-3 py-2"
                                        value="{{ old('email', $patientsInfo->email) }}">
                                    @error('email')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="flex justify-end space-x-4">
                            <a href="{{ route('patientsInfo.index') }}">
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
