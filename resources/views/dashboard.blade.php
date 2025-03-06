<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Single Card for Breadcrumbs, Stats, and Chart -->
            <div class="bg-white shadow rounded-lg p-6">
                <!-- Breadcrumb Navigation -->
                <nav class="text-lg flex items-center space-x-2 text-gray-600 mb-6">
                    <x-heroicon-o-rectangle-group class="w-5 h-5 mr-2" />
                    <span>Dashboard</span>
                </nav>

                <!-- Stats Cards Inside the Same Card -->
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-6">
                    <!-- Total Users Card -->
                    <div class="bg-gray-900 shadow-sm rounded-lg p-6 text-center">
                        <h3 class="text-lg font-semibold text-gray-300 mb-2">Number of Users</h3>
                        <p class="text-2xl font-bold text-gray-400">{{ $totalUsers }}</p>
                    </div>

                    <!-- Verified Municipal Users Card -->
                    <div class="bg-gray-900 shadow-sm rounded-lg p-6 text-center">
                        <h3 class="text-lg font-semibold text-gray-300 mb-2">Verified Municipal Users</h3>
                        <p class="text-2xl font-bold text-gray-400">{{ $verifiedMunicipalUsers }}</p>
                    </div>

                    <!-- Pending Municipal Users Card -->
                    <div class="bg-gray-900 shadow-sm rounded-lg p-6 text-center">
                        <h3 class="text-lg font-semibold text-gray-300 mb-2">Pending Municipal Users</h3>
                        <p class="text-2xl font-bold text-gray-400">{{ $pendingMunicipalUsers }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
