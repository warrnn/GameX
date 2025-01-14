<div class="navbar bg-primary z-[999] w-full fixed drop-shadow-lg p-2 px-8">
    <div class="navbar-start w-full">
        <div class="dropdown">
            <div tabindex="0" role="button" class="btn btn-ghost 2xl:hidden">
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
                    <a>Users</a>
                    <ul class="p-2">
                        <li class="my-2">
                            <a href="{{ route('admin.usersList') }}">Users List</a>
                        </li>
                        <li class="my-2">
                            <a href="{{ route('admin.sellerVerification') }}">Seller Verification</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('admin.transactions') }}">
                        Transactions
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.admins') }}">
                        Admins
                    </a>
                </li>
                <li class="hover:bg-red-500/70 rounded-lg transition">
                <a href="{{ route('buyer.store') }}">
                    Main Page
                </a>
                </li>
            </ul>
        </div>
        <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse ms-auto 2xl:ms-0">
            <img src="{{ asset('assets/logo/text_light.png') }}" class="h-16" alt="GameX Logo" />
        </a>
    </div>
    <div class="navbar-end hidden w-full 2xl:flex">
        <ul class="menu menu-horizontal px-1 font-medium flex flex-col md:flex-row p-4 md:p-0 mt-4 justify-end border border-gray-100 rounded-lg space-y-2 md:space-y-0 md:space-x-6 rtl:space-x-reverse md:mt-0 md:border-0">
            @php
            $routes = [
            'admin.usersList' => 'Users List',
            'admin.sellerVerification' => 'Seller Verification',
            ];
            @endphp
            <li>
                <details>
                    <summary class="font-bold text-lg {{ url()->current() == route('admin.usersList') || url()->current() == route('admin.sellerVerification') ? 'text-accent' : 'hover:text-accent transition text-strike' }}">Users</summary>
                    <ul class="p-2 bg-neutral shadow-lg">
                        @foreach ($routes as $route=> $label)
                            <li><a href="{{ route($route) }}">{{ $label }}</a></li>
                        @endforeach
                    </ul>
                </details>
            </li>
            <li>
                <a href="{{ route('admin.transactions') }}" class="font-bold text-lg {{ url()->current() == route('admin.transactions') ? 'text-accent' : 'hover:text-accent transition text-strike' }}">
                    Transactions
                </a>
            </li>
            <li>
                <a href="{{ route('admin.categories') }}" class="font-bold text-lg {{ url()->current() == route('admin.categories') ? 'text-accent' : 'hover:text-accent transition text-strike' }}">
                    Categories
                </a>
            </li>
            <li>
                <a href="{{ route('admin.admins') }}" class="font-bold text-lg {{ url()->current() == route('admin.admins') ? 'text-accent' : 'hover:text-accent transition text-strike' }}">
                    Admins
                </a>
            </li>
            <li>
                <a href="{{ route('buyer.store') }}" class="font-bold hover:text-red-500 transition text-strike text-lg">
                    Main Page
                </a>
            </li>
        </ul>
    </div>
</div>