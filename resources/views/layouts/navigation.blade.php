<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->


                @if (Auth::user()->role === \App\Enums\UserRole::ADMIN)
                <div class="shrink-0 flex items-center">
                    <a href="{{route('dashboard.admin')}}">
                        <h2 class="text-blue-200 dark:text-gray-200  text-xl font-bold">Tengok<span class="text-gray-200 dark:text-yellow-200">Tetangga</span></h2>

                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">


                    <x-nav-link :href="route('dashboard.admin')" :active="request()->routeIs('dashboard.admin')">
                        {{ __('Dashboard') }}
                    </x-nav-link>

                    <x-nav-link :href="route('surveyor.index')" :active="request()->routeIs('surveyor.index')">
                        {{ __('Responden') }}
                    </x-nav-link>
                    <x-nav-link :href="route('tema')" :active="request()->routeIs('tema')">
                        {{ __('Tema Kuisioner') }}
                    </x-nav-link>
                    <x-nav-link :href="route('admin.observasi')" :active="request()->routeIs('admin.observasi')">
                        {{ __('Observasi') }}
                    </x-nav-link>
                    <x-nav-link :href="route('admin.hasilobservasi')" :active="request()->routeIs('admin.hasilobservasi')">
                        {{ __('Hasil Observasi') }}
                    </x-nav-link>
                    <x-nav-link :href="route('admin.grafikobservasi')" :active="request()->routeIs('admin.grafikobservasi')">
                        {{ __('Grafik') }}
                    </x-nav-link>
                    <x-nav-link :href="route('kondisi.index')" :active="request()->routeIs('kondisi.index')">
                        {{ __('Kondisi') }}
                    </x-nav-link>
                    <x-nav-link :href="route('skor.index')" :active="request()->routeIs('skor.index')">
                        {{ __('Skoring') }}
                    </x-nav-link>



                </div>
                @endif

                @if (Auth::user()->role->value ==='pelaksana')
                <div class="shrink-0 flex items-center">
                    <a href="{{route('dashboard.user')}}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                    </a>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">


                    <x-nav-link :href="route('dashboard.user')" :active="request()->routeIs('dashboard.user')">
                        {{ __('Dashboard') }}
                    </x-nav-link>


                </div>


                @endif



            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">

        @if (Auth::user()->role === \App\Enums\UserRole::ADMIN)
        <div class="mt-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard.admin')" :active="request()->routeIs('dashboard.admin')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('surveyor.index')" :active="request()->routeIs('surveyor.index')">
                {{ __('Responden') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('tema')" :active="request()->routeIs('tema')">
                {{ __('Tema Kuisioner') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('admin.observasi')" :active="request()->routeIs('admin.observasi')">
                {{ __('Observasi') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('admin.hasilobservasi')" :active="request()->routeIs('admin.hasilobservasi')">
                {{ __('Hasil Observasi') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('admin.grafikobservasi')" :active="request()->routeIs('admin.grafikobservasi')">
                {{ __('Grafik') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('kondisi.index')" :active="request()->routeIs('kondisi.index')">
                {{ __('Kondisi') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('skor.index')" :active="request()->routeIs('skor.index')">
                {{ __('Skoring') }}
            </x-responsive-nav-link>
        </div>

        @endif



        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>























        </div>
    </div>
</nav>