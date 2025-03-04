<div class="mt-5">
    <div class="overflow-x-auto">
        <!-- Filter Controls -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2 sm:gap-4 mb-4">
            <!-- Per Page Dropdown -->
            <div class="flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-2 w-full sm:w-auto">
                <label class="text-gray-600 text-sm sm:text-base">Entries per page:</label>
                <select wire:model.live="perPage" class="border px-6 py-2 rounded w-full sm:w-auto">
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
            </div>

            <!-- Search Input with Icon (Fixed Alignment) -->
            <div class="relative w-full sm:w-48">
                <x-heroicon-o-magnifying-glass class="absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400" />
                <input type="text" wire:model.live="search" class="border px-4 py-2 pl-10 rounded w-full"
                    placeholder="Search...">
            </div>
        </div>

        <!-- Responsive Table -->
        <div class="w-full overflow-x-auto bg-white shadow-md rounded-lg">
            <table class="table-auto min-w-full border-collapse">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="px-4 py-3 text-left border-2 text-sm">ID</th>
                        <th class="px-4 py-3 text-left border-2 text-sm">Name</th>
                        <th class="px-4 py-3 text-left border-2 text-sm">Email</th>
                        <th class="px-4 py-3 text-left border-2 text-sm">Created At</th>
                        <th class="px-4 py-3 text-left border-2 text-sm">Email Verified At</th>
                        <th class="px-4 py-3 text-left border-2 text-sm">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($users->isEmpty())
                        <tr>
                            <td colspan="5" class="px-4 py-3 text-center text-gray-500 border-2">
                                No data available.
                            </td>
                        </tr>
                    @else
                        @foreach ($users as $user)
                            <tr class="border">
                                <td class="px-4 py-3 border-2">
                                    {{ ($users->currentPage() - 1) * $users->perPage() + $loop->iteration }}</td>
                                <td class="px-4 py-3 border-2">{{ $user->name }}</td>
                                <td class="px-4 py-3 border-2">{{ $user->email }}</td>
                                <td class="px-4 py-3 border-2">{{ $user->created_at }}</td>
                                <td class="px-4 py-3 border-2">{{ $user->email_verified_at ?? 'Not yet verified' }}</td>
                                {{-- @if ($user->email_verified_at)
                                    <span
                                        class="bg-green-700 text-green-200 text-sm font-semibold px-3 py-1 rounded-full">
                                        Verified
                                    </span>
                                @else
                                    <span class="bg-red-700 text-red-200 text-sm font-semibold px-3 py-1 rounded-full">
                                        Not Verified
                                    </span>
                                @endif --}}
                                <td class="px-4 py-3 border-2">
                                    <div class="flex flex-col lg:flex-row gap-2">
                                        <a href="{{ route('users.edit', $user->id) }}" class="w-full lg:w-auto">
                                            <x-primary-button
                                                class="flex items-center justify-center w-full lg:w-auto min-w-[110px]">
                                                <x-heroicon-o-pencil-square class="w-5 h-5 mr-1" />
                                                <span>Edit</span>
                                            </x-primary-button>
                                        </a>

                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                            class="w-full lg:w-auto">
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
        @if ($users->isNotEmpty())
            <div class="mt-5">
                {{ $users->onEachSide(1)->links() }}
            </div>
        @endif
    </div>
</div>
