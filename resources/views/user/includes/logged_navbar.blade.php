<nav class="bg-primary z-[999] w-full fixed">
    <div class="flex flex-wrap items-center justify-between mx-auto p-2 px-8">
        <a href="{{ route('user.store') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="{{ asset('assets/logo/text_light.png') }}" class="h-16" alt="GameX Logo" />
        </a>
        <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
            </svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
            <ul class="font-medium flex flex-col md:flex-row p-4 md:p-0 mt-4 justify-end border border-gray-100 rounded-lg space-y-2 md:space-y-0 md:space-x-6 rtl:space-x-reverse md:mt-0 md:border-0">
                @php
                $routes = [
                    'user.store' => 'Store',
                    'user.community' => 'Community',
                    'user.games' => 'Games',
                    'user.profile' => 'Profile',
                ];
                @endphp

                @foreach ($routes as $route => $label)
                <li>
                    <a href="{{ route($route) }}" class="text-strike {{ url()->current() == route($route) ? 'text-accent font-bold' : 'hover:text-accent transition font-bold' }}">
                        {{ $label }}
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</nav>