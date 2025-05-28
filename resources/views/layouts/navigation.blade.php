<nav class="bg-white border-b border-gray-100 dark:bg-gray-800 dark:border-gray-700">
    <!-- ... tu logo, enlaces públicos, etc. ... -->

    <div class="hidden sm:flex sm:items-center sm:ml-6">
        @auth
            <!-- Dropdown de usuario -->
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <button class="flex items-center px-3 py-2 text-sm font-medium text-gray-600 dark:text-gray-300 hover:text-gray-800 dark:hover:text-white focus:outline-none transition">
                        <span>{{ Auth::user()->name }}</span>
                        <svg class="ml-2 h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.25a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.08z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </x-slot>

                <x-slot name="content">
                    <x-dropdown-link :href="route('profile.edit')">
                        {{ __('Profile') }}
                    </x-dropdown-link>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-dropdown-link :href="route('logout')"
                                         onclick="event.preventDefault(); this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                </x-slot>
            </x-dropdown>
        @endauth
    </div>

    <!-- Opciones para invitado -->
    <div class="sm:hidden flex items-center">
        @guest
            <a href="{{ route('login') }}" class="text-sm text-gray-600 dark:text-gray-300 hover:underline">Login</a>
            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-600 dark:text-gray-300 hover:underline">Register</a>
        @endguest
    </div>
</nav>
