<div class="navbar bg-primary z-[999] w-full fixed drop-shadow-lg p-2 px-8">
    <div class="navbar-start w-full">
        <div class="dropdown">
            <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-5 w-5"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M4 6h16M4 12h8m-8 6h16" />
                </svg>
            </div>
            <ul
                tabindex="0"
                class="menu menu-sm dropdown-content bg-base-100 rounded-box z-[1] mt-3 w-52 p-2 shadow">
                <li>
                    <a>Store</a>
                    <ul class="p-2">
                        <li class="my-2">
                            <a href="{{ route('seller.sellGames') }}">Sell Games</a>
                        </li>
                        <li class="my-2">
                            <a>Manage Promotions</a>
                        </li>
                        <li class="my-2">
                            <a>Transaction Processes</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a>
                        Profile
                    </a>
                </li>
            </ul>
        </div>
        <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse ms-auto lg:ms-0">
            <img src="{{ asset('assets/logo/text_light.png') }}" class="h-16" alt="GameX Logo" />
        </a>
    </div>
    <div class="navbar-end hidden lg:flex">
        <ul class="menu menu-horizontal px-1 font-medium flex flex-col md:flex-row p-4 md:p-0 mt-4 justify-end border border-gray-100 rounded-lg space-y-2 md:space-y-0 md:space-x-6 rtl:space-x-reverse md:mt-0 md:border-0">
            <li>
                <details>
                    <summary class="font-bold hover:text-accent transition text-strike text-lg">Store</summary>
                    <ul class="p-2 bg-neutral shadow-lg">
                        <li>
                            <a href="{{ route('seller.sellGames') }}">Sell Games</a>
                        </li>
                        <li>
                            <a>Manage Promotions</a>
                        </li>
                        <li>
                            <a>Transaction Processes</a>
                        </li>
                    </ul>
                </details>
            </li>
            <li>
                <a href="{{ route('seller.profile') }}" class="font-bold hover:text-accent transition text-strike text-lg">
                    Profile
                </a>
            </li>
        </ul>
    </div>
</div>