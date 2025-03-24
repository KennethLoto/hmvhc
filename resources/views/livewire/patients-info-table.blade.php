<div class="mt-5">
    <div class="overflow-x-auto sm:min-h-[275px] min-h-[375px]">
        <!-- Filter Controls -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-2 mb-4">
            <!-- Per Page & Role Filter (Grouped) -->
            <div class="flex flex-col md:flex-row md:items-center gap-2 w-full md:w-auto">
                <!-- Per Page Dropdown -->
                <div class="flex flex-col md:flex-row md:items-center gap-1">
                    <label class="text-gray-600 text-sm">Entries per page:</label>
                    <select wire:model.live="perPage" class="border px-4 py-2 rounded w-full md:w-auto">
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                </div>
            </div>

            <!-- Search Input (Takes Full Width on Mobile) -->
            <div class="w-full md:w-auto">
                <input type="text" wire:model.live="search" class="border px-4 py-2 rounded w-full md:w-64"
                    placeholder="Search...">
            </div>
        </div>

        <!-- Responsive Table -->
        <div class="w-full overflow-x-auto bg-white shadow-md rounded-lg">
            <div wire:loading
                class="absolute left-1/2 -translate-x-1/2 translate-y-28 sm:translate-y-30 text-gray-600 font-semibold">
                <div
                    class="w-6 h-6 sm:w-8 sm:h-8 border-4 border-gray-600 border-t-transparent rounded-full animate-spin mx-auto mb-2">
                </div>
                <span>Loading, please wait...</span>
            </div>
            <table class="table-auto min-w-full border-collapse">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="px-4 py-3 text-left border-2 text-sm">ID</th>
                        <th class="px-4 py-3 text-left border-2 text-sm">Name</th>
                        <th class="px-4 py-3 text-left border-2 text-sm">Address</th>
                        <th class="px-4 py-3 text-left border-2 text-sm">Contact Number</th>
                        <th class="px-4 py-3 text-left border-2 text-sm">Email</th>
                        <th class="px-4 py-3 text-left border-2 text-sm">Action</th>
                    </tr>
                </thead>
                <tbody wire:Loading.remove>
                    @if ($patientsInfos->isEmpty())
                        <tr>
                            <td colspan="7" class="px-4 py-20 text-center text-gray-500 border-2">
                                No data available.
                            </td>
                        </tr>
                    @else
                        @foreach ($patientsInfos as $patientsInfo)
                            <tr class="border">
                                <td class="px-4 py-3 border-2">
                                    {{ ($patientsInfos->currentPage() - 1) * $patientsInfos->perPage() + $loop->iteration }}
                                </td>
                                <td class="px-4 py-3 border-2">
                                    {{ $patientsInfo->firstName }}
                                    {{ $patientsInfo->middleName ? $patientsInfo->middleName . ' ' : '' }}
                                    {{ $patientsInfo->lastName }}
                                    {{ $patientsInfo->suffix ? ', ' . $patientsInfo->suffix : '' }}
                                </td>
                                <td class="px-4 py-3 border-2">
                                    {{ $patientsInfo->street }},
                                    {{ $patientsInfo->barangay }}
                                    {{ $patientsInfo->municipality }},
                                    {{ $patientsInfo->province }}
                                </td>
                                <td class="px-4 py-3 border-2">{{ $patientsInfo->contactNumber }}</td>
                                <td class="px-4 py-3 border-2">{{ $patientsInfo->email }}</td>
                                <td class="px-4 py-3 border-2">
                                    <div class="flex flex-col lg:flex-row gap-2">
                                        <a href="{{ route('patientsInfo.edit', $patientsInfo->id) }}"
                                            class="w-full lg:w-auto">
                                            <x-secondary-button
                                                class="flex items-center justify-center w-full lg:w-auto min-w-[110px]">
                                                <x-heroicon-o-pencil-square class="w-5 h-5 mr-1" />
                                                <span>Edit</span>
                                            </x-secondary-button>
                                        </a>

                                        <form action="{{ route('patientsInfo.destroy', $patientsInfo->id) }}"
                                            method="POST" class="w-full lg:w-auto">
                                            @csrf
                                            @method('DELETE')
                                            <x-primary-button type="submit"
                                                class="flex items-center justify-center w-full lg:w-auto min-w-[110px]">
                                                <x-heroicon-o-trash class="w-5 h-5 mr-1" />
                                                <span>Delete</span>
                                            </x-primary-button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
        <!-- Pagination -->
        @if ($patientsInfos->isNotEmpty())
            <div class="mt-5" wire:Loading.remove>
                {{ $patientsInfos->onEachSide(1)->links() }}
            </div>
        @endif
    </div>
</div>
