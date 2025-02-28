<div class="mt-5">
    <div class="overflow-x-auto">
        <!-- Filter Controls -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-4">
            <select wire:model.live="perPage" class="border px-6 py-2 rounded w-full sm:w-auto">
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="20">20</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select>
            <input type="text" wire:model.live="search" class="border px-4 rounded w-full sm:w-48"
                placeholder="Search users...">
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
                    @foreach ($users as $user)
                        <tr class="border">
                            <td class="px-4 py-3 border-2">
                                {{ ($users->currentPage() - 1) * $users->perPage() + $loop->iteration }}</td>
                            <td class="px-4 py-3 border-2">{{ $user->name }}</td>
                            <td class="px-4 py-3 border-2">{{ $user->email }}</td>
                            <td class="px-4 py-3 border-2">{{ $user->created_at }}</td>
                            <td class="px-4 py-3 border-2">{{ $user->email_verified_at ?? 'N/A' }}</td>
                            <td class="px-4 py-3 border-2">
                                <div class="flex flex-wrap gap-2">
                                    <a href="{{ route('users.edit', $user->id) }}" class="w-full sm:w-auto">
                                        <x-primary-button
                                            class="flex items-center justify-center w-full sm:w-auto min-w-[120px]">
                                            <x-heroicon-o-pencil-square class="w-5 h-5 mr-1" />
                                            <span>Edit</span>
                                        </x-primary-button>
                                    </a>

                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                        class="w-full sm:w-auto">
                                        @csrf
                                        @method('DELETE')
                                        <x-primary-button type="submit"
                                            class="flex items-center justify-center w-full sm:w-auto min-w-[120px]">
                                            <x-heroicon-o-trash class="w-5 h-5 mr-1" />
                                            <span>Delete</span>
                                        </x-primary-button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-4">
            {{ $users->links() }}
        </div>
    </div>
</div>
