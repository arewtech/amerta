    <!-- navigation -->
    <header x-data="{ open: false }" class="bg-transparent">
        <nav class="mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8" aria-label="Global">
            <div class="flex lg:flex-1">
                <a href="{{ route('home') }}" class="-m-1.5 p-1.5">
                    <span class="sr-only">Your Company</span>
                    <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600"
                        alt="" />
                </a>
            </div>
            <div class="flex lg:hidden">
                <button @click="open = !open" type="button"
                    class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
                    <span class="sr-only">Open main menu</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </button>
            </div>
            <div class="hidden lg:flex lg:gap-x-12">
                <a href="{{ route('home') }}"
                    class="{{ request()->url() == url('/') ? 'text-blue-500 font-semibold' : 'text-gray-900 font-medium' }} text-sm leading-6">Program</a>
                <a href="#" class="text-sm font-medium leading-6 text-gray-900">Mentor</a>
                <a href="#" class="text-sm font-medium leading-6 text-gray-900">Pricing</a>
                <div x-data="{ open: false }" class="relative">
                    <button @click="open = !open" @click.away="open = false" type="button"
                        class="flex items-center gap-x-1 text-sm font-medium leading-6 text-gray-900"
                        aria-expanded="false">
                        Business
                        <svg :class="{ 'rotate-180': open }" class="h-5 w-5 flex-none text-gray-400" viewBox="0 0 20 20"
                            fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>

                    <!--
                                              'Product' flyout menu, show/hide based on flyout menu state.
                                            -->
                    <div x-show="open" x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 translate-y-1"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100 translate-y-0"
                        x-transition:leave-end="opacity-0 translate-y-1"
                        class="absolute -left-8 top-full z-10 mt-3 w-screen max-w-md overflow-hidden rounded-3xl bg-white shadow-lg ring-1 ring-gray-900/5">
                        <div class="p-4">
                            <div
                                class="group relative flex items-center gap-x-6 rounded-lg p-4 text-sm leading-6 hover:bg-gray-50">
                                <div
                                    class="flex h-11 w-11 flex-none items-center justify-center rounded-lg bg-gray-50 group-hover:bg-white">
                                    <svg class="h-6 w-6 text-gray-600 group-hover:text-indigo-600" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M10.5 6a7.5 7.5 0 107.5 7.5h-7.5V6z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M13.5 10.5H21A7.5 7.5 0 0013.5 3v7.5z" />
                                    </svg>
                                </div>
                                <div class="flex-auto">
                                    <a href="#" class="block font-semibold text-gray-900">
                                        Analytics
                                        <span class="absolute inset-0"></span>
                                    </a>
                                    <p class="mt-1 text-gray-600">
                                        Get a better understanding of your traffic
                                    </p>
                                </div>
                            </div>

                            <div
                                class="group relative flex items-center gap-x-6 rounded-lg p-4 text-sm leading-6 hover:bg-gray-50">
                                <div
                                    class="flex h-11 w-11 flex-none items-center justify-center rounded-lg bg-gray-50 group-hover:bg-white">
                                    <svg class="h-6 w-6 text-gray-600 group-hover:text-indigo-600" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.042 21.672L13.684 16.6m0 0l-2.51 2.225.569-9.47 5.227 7.917-3.286-.672zM12 2.25V4.5m5.834.166l-1.591 1.591M20.25 10.5H18M7.757 14.743l-1.59 1.59M6 10.5H3.75m4.007-4.243l-1.59-1.59" />
                                    </svg>
                                </div>
                                <div class="flex-auto">
                                    <a href="#" class="block font-semibold text-gray-900">
                                        Engagement
                                        <span class="absolute inset-0"></span>
                                    </a>
                                    <p class="mt-1 text-gray-600">
                                        Speak directly to your customers
                                    </p>
                                </div>
                            </div>

                            <div
                                class="group relative flex items-center gap-x-6 rounded-lg p-4 text-sm leading-6 hover:bg-gray-50">
                                <div
                                    class="flex h-11 w-11 flex-none items-center justify-center rounded-lg bg-gray-50 group-hover:bg-white">
                                    <svg class="h-6 w-6 text-gray-600 group-hover:text-indigo-600" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M7.864 4.243A7.5 7.5 0 0119.5 10.5c0 2.92-.556 5.709-1.568 8.268M5.742 6.364A7.465 7.465 0 004.5 10.5a7.464 7.464 0 01-1.15 3.993m1.989 3.559A11.209 11.209 0 008.25 10.5a3.75 3.75 0 117.5 0c0 .527-.021 1.049-.064 1.565M12 10.5a14.94 14.94 0 01-3.6 9.75m6.633-4.596a18.666 18.666 0 01-2.485 5.33" />
                                    </svg>
                                </div>
                                <div class="flex-auto">
                                    <a href="#" class="block font-semibold text-gray-900">
                                        Security
                                        <span class="absolute inset-0"></span>
                                    </a>
                                    <p class="mt-1 text-gray-600">
                                        Your customers’ data will be safe and secure
                                    </p>
                                </div>
                            </div>

                            <div
                                class="group relative flex items-center gap-x-6 rounded-lg p-4 text-sm leading-6 hover:bg-gray-50">
                                <div
                                    class="flex h-11 w-11 flex-none items-center justify-center rounded-lg bg-gray-50 group-hover:bg-white">
                                    <svg class="h-6 w-6 text-gray-600 group-hover:text-indigo-600" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                        aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M13.5 16.875h3.375m0 0h3.375m-3.375 0V13.5m0 3.375v3.375M6 10.5h2.25a2.25 2.25 0 002.25-2.25V6a2.25 2.25 0 00-2.25-2.25H6A2.25 2.25 0 003.75 6v2.25A2.25 2.25 0 006 10.5zm0 9.75h2.25A2.25 2.25 0 0010.5 18v-2.25a2.25 2.25 0 00-2.25-2.25H6a2.25 2.25 0 00-2.25 2.25V18A2.25 2.25 0 006 20.25zm9.75-9.75H18a2.25 2.25 0 002.25-2.25V6A2.25 2.25 0 0018 3.75h-2.25A2.25 2.25 0 0013.5 6v2.25a2.25 2.25 0 002.25 2.25z" />
                                    </svg>
                                </div>
                                <div class="flex-auto">
                                    <a href="#" class="block font-semibold text-gray-900">
                                        Integrations
                                        <span class="absolute inset-0"></span>
                                    </a>
                                    <p class="mt-1 text-gray-600">
                                        Connect with third-party tools
                                    </p>
                                </div>
                            </div>

                            <div
                                class="group relative flex items-center gap-x-6 rounded-lg p-4 text-sm leading-6 hover:bg-gray-50">
                                <div
                                    class="flex h-11 w-11 flex-none items-center justify-center rounded-lg bg-gray-50 group-hover:bg-white">
                                    <svg class="h-6 w-6 text-gray-600 group-hover:text-indigo-600" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                        aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                                    </svg>
                                </div>
                                <div class="flex-auto">
                                    <a href="#" class="block font-semibold text-gray-900">
                                        Automations
                                        <span class="absolute inset-0"></span>
                                    </a>
                                    <p class="mt-1 text-gray-600">
                                        Build strategic funnels that will convert
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 divide-x divide-gray-900/5 bg-gray-50">
                            <a href="#"
                                class="flex items-center justify-center gap-x-2.5 p-3 text-sm font-semibold leading-6 text-gray-900 hover:bg-gray-100">
                                <svg class="h-5 w-5 flex-none text-gray-400" viewBox="0 0 20 20" fill="currentColor"
                                    aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M2 10a8 8 0 1116 0 8 8 0 01-16 0zm6.39-2.908a.75.75 0 01.766.027l3.5 2.25a.75.75 0 010 1.262l-3.5 2.25A.75.75 0 018 12.25v-4.5a.75.75 0 01.39-.658z"
                                        clip-rule="evenodd" />
                                </svg>
                                Watch demo
                            </a>

                            <a href="#"
                                class="flex items-center justify-center gap-x-2.5 p-3 text-sm font-semibold leading-6 text-gray-900 hover:bg-gray-100">
                                <svg class="h-5 w-5 flex-none text-gray-400" viewBox="0 0 20 20" fill="currentColor"
                                    aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M2 3.5A1.5 1.5 0 013.5 2h1.148a1.5 1.5 0 011.465 1.175l.716 3.223a1.5 1.5 0 01-1.052 1.767l-.933.267c-.41.117-.643.555-.48.95a11.542 11.542 0 006.254 6.254c.395.163.833-.07.95-.48l.267-.933a1.5 1.5 0 011.767-1.052l3.223.716A1.5 1.5 0 0118 15.352V16.5a1.5 1.5 0 01-1.5 1.5H15c-1.149 0-2.263-.15-3.326-.43A13.022 13.022 0 012.43 8.326 13.019 13.019 0 012 5V3.5z"
                                        clip-rule="evenodd" />
                                </svg>
                                Contact sales
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @guest
                <div class="hidden lg:flex lg:flex-1 lg:justify-end">
                    <a href="{{ route('login') }}" class="text-sm font-semibold leading-6 text-gray-900">Log in <span
                            aria-hidden="true">&rarr;</span></a>
                </div>
            @else
                <div class="hidden lg:flex lg:flex-1 lg:justify-end">
                    <div class="ml-4 flex items-center md:ml-6">
                        <button type="button"
                            class="relative rounded-full bg-blue-500 p-1 text-white hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-blue-500">
                            <span class="sr-only">View notifications</span>
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                            </svg>
                            <div
                                class="absolute inline-flex items-center justify-center w-5 h-5 text-xs font-bold text-white bg-red-500 border-2 border-white rounded-full -top-2 -right-2">
                                2
                            </div>
                        </button>

                        <!-- Profile dropdown -->
                        <div x-data="{ open: false }" class="relative ml-2">
                            <div>
                                <button @click="open = !open" type="button"
                                    class="flex max-w-xs items-center rounded-full bg-transparent text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-blue-600"
                                    id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                    <span class="sr-only">Open user menu</span>
                                    <img class="h-7 w-7 rounded-full"
                                        src="{{ auth()->user()->avatar !== null ? asset('storage/' . auth()->user()->avatar) : 'https://ui-avatars.com/api/?name=' . auth()->user()->name . '&color=7F9CF5&background=EBF4FF' }}"
                                        alt="">
                                    <span class='mx-3 font-medium'>
                                        {{ Auth::user()->name }}
                                    </span>
                                </button>
                            </div>
                            <div x-show="open" x-transition:enter="transition ease-out duration-100"
                                x-transition:enter-start="transform opacity-0 scale-95"
                                x-transition:enter-end="transform opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-75"
                                x-transition:leave-start="transform opacity-100 scale-100"
                                x-transition:leave-end="transform opacity-0 scale-95" @click.away="open = false"
                                class="absolute right-0 z-10 mt-2 w-40 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                                role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
                                tabindex="-1">
                                <!-- Active: "bg-gray-100", Not Active: "" -->
                                @if (auth()->user()->is_admin == 'admin')
                                    <a href="{{ route('dashboard') }}"
                                        class="block hover:bg-gray-100 px-4 py-2 text-sm text-gray-700" role="menuitem"
                                        tabindex="-1" id="user-menu-item-0">Admin Dashboard</a>
                                @else
                                    <a href="{{ route('preview') }}"
                                        class="block hover:bg-gray-100 px-4 py-2 text-sm text-gray-700" role="menuitem"
                                        tabindex="-1" id="user-menu-item-0">My Dashboard</a>
                                @endif
                                <a href="{{ route('histories') }}"
                                    class="block hover:bg-gray-100 px-4 py-2 text-sm text-gray-700" role="menuitem"
                                    tabindex="-1" id="user-menu-item-0">History Camps</a>

                                <a href="{{ route('update-profile') }}"
                                    class="block hover:bg-gray-100 px-4 py-2 text-sm text-gray-700" role="menuitem"
                                    tabindex="-1" id="user-menu-item-0">Your Profile</a>

                                <a href="#" class="block hover:bg-gray-100 px-4 py-2 text-sm text-gray-700"
                                    role="menuitem" tabindex="-1" id="user-menu-item-1">Settings</a>

                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <button type="submit"
                                        class="block w-full text-left hover:bg-gray-100 px-4 py-2 text-sm text-gray-700">Sign
                                        out</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endguest
        </nav>
        <!-- Mobile menu, show/hide based on menu open state. -->
        <div x-show="open" @click.away="open = false" class="lg:hidden" role="dialog" aria-modal="true">
            <div class="fixed inset-y-0 right-0 z-10 w-full overflow-y-auto bg-white px-6 py-6 shadow sm:max-w-sm">
                <div class="flex items-center justify-between">
                    <a href="{{ route('home') }}" class="-m-1.5 p-1.5">
                        <span class="sr-only">Your Company</span>
                        <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600"
                            alt="" />
                    </a>
                    <button @click="open = false" type="button" class="-m-2.5 rounded-md p-2.5 text-gray-700">
                        <span class="sr-only">Close menu</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="mt-6 flow-root">
                    <div class="-my-6 divide-y divide-gray-500/10">
                        <div class="space-y-2 py-6">
                            <a href="{{ route('home') }}"
                                class="{{ request()->url() == url('/') ? 'text-blue-500 font-semibold' : 'text-gray-900 font-medium' }} -mx-3 block rounded-lg py-2 px-3 text-base leading-7 hover:bg-gray-50">Program</a>
                            <a href="#"
                                class="-mx-3 block rounded-lg py-2 px-3 text-base font-medium leading-7 text-gray-900 hover:bg-gray-50">Mentor</a>
                            <a @click="open = false" href="#pricing"
                                class="-mx-3 block rounded-lg py-2 px-3 text-base font-medium leading-7 text-gray-900 hover:bg-gray-50">Pricing</a>
                            <div x-data="{ open: false }" class="-mx-3">
                                <button @click="open = !open" type="button"
                                    class="flex w-full items-center justify-between rounded-lg py-2 pl-3 pr-3.5 text-base font-medium leading-7 hover:bg-gray-50"
                                    aria-controls="disclosure-1" aria-expanded="false">
                                    Business
                                    <!--
                                                          Expand/collapse icon, toggle classes based on menu open state.

                                                          Open: "rotate-180", Closed: ""
                                                        -->
                                    <svg :class="{ 'rotate-180': open }" class="h-5 w-5 flex-none" viewBox="0 0 20 20"
                                        fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>
                                <!-- 'Product' sub-menu, show/hide based on menu state. -->
                                <div x-show="open" class="mt-2 space-y-2" id="disclosure-1">
                                    <a href="#"
                                        class="block rounded-lg py-2 pl-6 pr-3 text-sm font-semibold leading-7 text-gray-900 hover:bg-gray-50">Analytics</a>

                                    <a href="#"
                                        class="block rounded-lg py-2 pl-6 pr-3 text-sm font-semibold leading-7 text-gray-900 hover:bg-gray-50">Engagement</a>

                                    <a href="#"
                                        class="block rounded-lg py-2 pl-6 pr-3 text-sm font-semibold leading-7 text-gray-900 hover:bg-gray-50">Security</a>

                                    <a href="#"
                                        class="block rounded-lg py-2 pl-6 pr-3 text-sm font-semibold leading-7 text-gray-900 hover:bg-gray-50">Integrations</a>

                                    <a href="#"
                                        class="block rounded-lg py-2 pl-6 pr-3 text-sm font-semibold leading-7 text-gray-900 hover:bg-gray-50">Automations</a>

                                    <a href="#"
                                        class="block rounded-lg py-2 pl-6 pr-3 text-sm font-semibold leading-7 text-gray-900 hover:bg-gray-50">Watch
                                        demo</a>

                                    <a href="#"
                                        class="block rounded-lg py-2 pl-6 pr-3 text-sm font-semibold leading-7 text-gray-900 hover:bg-gray-50">Contact
                                        sales</a>
                                </div>
                            </div>
                        </div>
                        <div class="py-6">
                            @guest
                                <a href="{{ route('login') }}"
                                    class="-mx-3 block rounded-lg py-2.5 px-3 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Log
                                    in</a>
                            @else
                                <div class="flex items-center">
                                    <button type="button"
                                        class="relative rounded-full bg-blue-500 p-1 text-white hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-blue-500">
                                        <span class="sr-only">View notifications</span>
                                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                            stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                                        </svg>
                                        <div
                                            class="absolute inline-flex items-center justify-center w-5 h-5 text-xs font-bold text-white bg-red-500 border-2 border-white rounded-full -top-2 -right-2">
                                            3</div>
                                    </button>
                                    <!-- Profile dropdown -->
                                    <div x-data="{ open: false }" class="relative ml-3">
                                        <div>
                                            <button @click="open = !open" type="button"
                                                class="flex max-w-xs items-center rounded-full bg-transparent text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-blue-600"
                                                id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                                <span class="sr-only">Open user menu</span>
                                                <img class="h-7 w-7 rounded-full"
                                                    src="{{ auth()->user()->avatar !== null ? asset('storage/' . auth()->user()->avatar) : 'https://ui-avatars.com/api/?name=' . auth()->user()->name . '&color=7F9CF5&background=EBF4FF' }}"
                                                    alt="">
                                                <span class='mx-3 font-medium'>
                                                    {{ Auth::user()->name }}
                                                </span>
                                            </button>
                                        </div>
                                        <div x-show="open" x-transition:enter="transition ease-out duration-100"
                                            x-transition:enter-start="transform opacity-0 scale-95"
                                            x-transition:enter-end="transform opacity-100 scale-100"
                                            x-transition:leave="transition ease-in duration-75"
                                            x-transition:leave-start="transform opacity-100 scale-100"
                                            x-transition:leave-end="transform opacity-0 scale-95"
                                            @click.away="open = false"
                                            class="absolute left-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                                            role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
                                            tabindex="-1">
                                            <!-- Active: "bg-gray-100", Not Active: "" -->
                                            @if (auth()->user()->is_admin == 'admin')
                                                <a href="{{ route('dashboard') }}"
                                                    class="block hover:bg-gray-100 px-4 py-2 text-sm text-gray-700"
                                                    role="menuitem" tabindex="-1" id="user-menu-item-0">Admin
                                                    Dashboard</a>
                                            @else
                                                <a href="{{ route('preview') }}"
                                                    class="block hover:bg-gray-100 px-4 py-2 text-sm text-gray-700"
                                                    role="menuitem" tabindex="-1" id="user-menu-item-0">My Dashboard</a>
                                            @endif
                                            <a href="{{ route('histories') }}"
                                                class="block hover:bg-gray-100 px-4 py-2 text-sm text-gray-700"
                                                role="menuitem" tabindex="-1" id="user-menu-item-0">History Camps</a>

                                            <a href="{{ route('update-profile') }}"
                                                class="block hover:bg-gray-100 px-4 py-2 text-sm text-gray-700"
                                                role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>

                                            <a href="#"
                                                class="block hover:bg-gray-100 px-4 py-2 text-sm text-gray-700"
                                                role="menuitem" tabindex="-1" id="user-menu-item-1">Settings</a>
                                            <form action="{{ route('logout') }}" method="post">
                                                @csrf
                                                <button type="submit"
                                                    class="block w-full text-left hover:bg-gray-100 px-4 py-2 text-sm text-gray-700">Sign
                                                    out</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endguest
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
