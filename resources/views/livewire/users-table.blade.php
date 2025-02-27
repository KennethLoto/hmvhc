<div>
    <div class="overflow-x-auto">
        <input type="text" wire:model.live="search" class="mb-5 float-end" placeholder="Search">
        <table class="table-auto min-w-full border-collapse shadow-md rounded-lg overflow-hidden">
            <thead class="bg-gray-800 text-white border-2">
                <tr>
                    <th class="px-4 py-2 text-left border-2 text-sm">ID</th>
                    <th class="px-4 py-2 text-left border-2 text-sm">Name</th>
                    <th class="px-4 py-2 text-left border-2 text-sm">Email</th>
                    <th class="px-4 py-2 text-left border-2 text-sm">Created At</th>
                    <th class="px-4 py-2 text-left border-2 text-sm">Updated At</th>
                    <th class="px-4 py-2 text-left border-2 text-sm">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr class="border-2">
                        <td class="px-4 py-2 border-2">
                            {{ ($users->currentPage() - 1) * $users->perPage() + $loop->iteration }}</td>
                        <td class="px-4 py-2 border-2">{{ $user->name }}</td>
                        <td class="px-4 py-2 border-2">{{ $user->email }}</td>
                        <td class="px-4 py-2 border-2">{{ $user->created_at }}</td>
                        <td class="px-4 py-2 border-2">{{ $user->email_verified_at }}</td>
                        <td class="px-4 py-2 border-2">
                            <div class="flex gap-3 min-w-[100px]">
                                <a href="{{ route('users.edit', $user->id) }}">
                                    <x-primary-button class="flex justify-center items-center w-full">
                                        <x-heroicon-o-pencil-square class="w-5 h-5 mr-1" />
                                        <span>Edit</span>
                                    </x-primary-button>
                                </a>

                                <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <x-primary-button type="submit" class="flex justify-center items-center w-full">
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

    <!-- Livewire Pagination -->
    <div class="mt-4">
        {{ $users->links() }}
    </div>
</div>
