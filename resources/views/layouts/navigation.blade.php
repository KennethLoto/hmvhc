<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 sticky top-0 w-full">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl  mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex items-center space-x-4">
                    <a href="{{ route('dashboard') }}">
                        <x-navbar-logo class="h-10 w-auto text-gray-700" />
                    </a>
                    <!-- Title -->
                    <span class="text-xl semi-bold text-gray-700">
                        HMHC
                    </span>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-3 py-2 border text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <x-heroicon-o-user-circle class="h-5 w-5 mr-2" />
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')" class="flex items-center">
                            <x-heroicon-o-user-plus class="h-5 w-5 mr-2" />
                            <span>Profile</span>
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                         this.closest('form').submit();"
                                class="flex items-center">
                                <x-heroicon-o-arrow-left-end-on-rectangle class="h-5 w-5 mr-2" />
                                <span>Log Out</span>
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                <div class="flex items-center">
                    <x-heroicon-o-rectangle-group class="w-5 h-5 mr-2" />
                    <span>{{ 'DASHBOARD' }}</span>
                </div>
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('users.index')" :active="request()->routeIs('users.index') ||
                request()->routeIs('users.create') ||
                request()->routeIs('users.edit')">
                <div class="flex items-center">
                    <x-heroicon-o-user-group class="w-5 h-5 mr-2" />
                    <span>{{ 'USERS' }}</span>
                </div>
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('typesOfDiseases.index')" :active="request()->routeIs('typesOfDiseases.index') ||
                request()->routeIs('typesOfDiseases.create') ||
                request()->routeIs('typesOfDiseases.edit')">
                <div class="flex items-center">
                    <x-heroicon-o-bolt-slash class="w-5 h-5 mr-2" />
                    <span>{{ 'TYPES OF DISEASES' }}</span>
                </div>
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')" class="flex items-center">
                    <x-heroicon-o-user-plus class="h-5 w-5 mr-2" />
                    {{ 'Profile' }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault();
                                        this.closest('form').submit();"
                        class="flex items-center">
                        <x-heroicon-o-arrow-left-end-on-rectangle class="h-5 w-5 mr-2" />

                        {{ 'Log Out' }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>


    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 hidden space-x-8 sm:flex bg-white">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        <x-heroicon-o-rectangle-group class="w-5 h-5 mr-2" />
                        {{ 'DASHBOARD' }}
                    </x-nav-link>
                    <x-nav-link :href="route('users.index')" :active="request()->routeIs('users.index') ||
                        request()->routeIs('users.create') ||
                        request()->routeIs('users.edit')">
                        <x-heroicon-o-user-group class="w-5 h-5 mr-2" />
                        {{ 'USERS' }}
                    </x-nav-link>
                    <x-nav-link :href="route('typesOfDiseases.index')" :active="request()->routeIs('typesOfDiseases.index') ||
                        request()->routeIs('typesOfDiseases.create') ||
                        request()->routeIs('typesOfDiseases.edit')">
                        <x-heroicon-o-bolt-slash class="w-5 h-5 mr-2" />
                        {{ 'TYPES OF DISEASES' }}
                    </x-nav-link>
                    <x-nav-link :href="route('patientsInfo.index')" :active="request()->routeIs('patientsInfo.index')">
                        <x-heroicon-o-identification class="w-5 h-5 mr-2" />
                        {{ 'PATIENTS INFO' }}
                    </x-nav-link>
                </div>
            </div>
        </div>
    </div>
</nav>
