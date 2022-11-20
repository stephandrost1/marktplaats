<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('advertenties') }}">
                        <x-application-logo class="block h-10 w-auto fill-current text-gray-600" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('advertenties')" :active="request()->routeIs('advertenties')">
                        {{ __('Advertenties') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            @if (Auth::user())
            <div class="hidden sm:flex sm:items-center">
                <div class="hidden sm:flex gap-2 sm:items-center sm:ml-6 text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                    <i class="far fa-comments"></i> Berichten
                </div>

                <div class="hidden sm:flex sm:items-center sm:ml-6">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                <div>{{ substr(Auth::user()->first_name, 0, 1) }}. {{ Auth::user()->last_name }}</div>
    
                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>
    
                        <x-slot name="content">
                            <!-- Mijn advertenties -->
                            <x-dropdown-link href="{{ route('mijn-advertenties') }}">
                                {{ __('Mijn Advertenties') }}
                            </x-dropdown-link>

                            <!-- Mijn favorieten -->
                            <x-dropdown-link href="{{ route('mijn-favorieten') }}">
                                {{ __('Mijn Favorieten') }}
                            </x-dropdown-link>

                            <!-- Account Settings -->
                            <x-dropdown-link href="{{ route('mijn-profiel') }}">
                                {{ __('Mijn Profiel') }}
                            </x-dropdown-link>
    
                            <!-- Authentication -->
                            <form method="POST" class="m-0" action="{{ route('logout') }}">
                                @csrf
    
                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Uitloggen') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>

                <div class="hidden sm:flex gap-2 sm:items-center sm:ml-6 text-sm font-medium">
                    <a href="{{ route('plaats-advertentie') }}">
                        <x-primary-button class="!bg-[#EEA766] hover:!bg-[#f0b27b] focus:!bg-[#f0b27b] focus:!border-[#f0b27b] active:!bg-[#f0b27b] focus:ring-0">
                            <i class="fa-solid fa-thumbtack fa-rotate-by" style="--fa-rotate-angle: 330deg;"></i>&nbsp;{{ __('Plaats advertentie') }}
                        </x-primary-button>
                    </a>
                    
                </div>
            </div>
            @else
                <a href="{{ route('login')}}" class="hidden sm:flex items-center justify-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                    Inloggen
                </a>
            @endif

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
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
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('advertenties')" :active="request()->routeIs('advertenties')">
                {{ __('Advertenties') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="@if(Auth::user()) pt-4 @else pt-2 @endif pb-1 border-t border-gray-200">

            @if (Auth::user())
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ substr(Auth::user()->first_name, 0, 1) }}. {{ Auth::user()->last_name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            
            <div class="mt-3 space-y-1">
                <!-- Own advertisements -->
                <x-responsive-nav-link href="{{ route('plaats-advertentie') }}">
                    {{ __('Plaats Advertentie') }}
                </x-responsive-nav-link>
            </div>
            <div class="mt-3 space-y-1">
                <!-- Own advertisements -->
                <x-responsive-nav-link href="{{ route('mijn-advertenties') }}">
                    {{ __('Mijn Advertenties') }}
                </x-responsive-nav-link>
            </div>
            <div class="mt-3 space-y-1">
                <!-- Own advertisements -->
                <x-responsive-nav-link href="{{ route('mijn-favorieten') }}">
                    {{ __('Mijn Favorieten') }}
                </x-responsive-nav-link>
            </div>
            <div class="mt-3 space-y-1">
                <!-- Account settings -->
                <x-responsive-nav-link href="{{ route('mijn-profiel') }}">
                    {{ __('Mijn Profiel') }}
                </x-responsive-nav-link>
            </div>
            <div class="mt-3 space-y-1">
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Uitloggen') }}
                    </x-responsive-nav-link>
                </form>
            </div>
            @else
            <a class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out">
                Inloggen
            </a>
            @endif
        </div>
    </div>
</nav>
