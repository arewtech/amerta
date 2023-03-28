@extends('layouts.success')
@section('content')
    <!-- section hero content -->
    <div x-data="{ open: false }" class="container mx-auto w-full max-w-7xl px-10">

        @if (session('success'))
            <!-- alert -->
            <div x-data="{ open: true }" :class="{ 'hidden': !open }"
                class="bg-green-100 mt-4 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">{{ auth()->user()->name }},</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
                <button @click="open = false" class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20">
                        <title>Close</title>
                        <path
                            d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                    </svg>
                </button>
            </div>
        @endif

        <!-- title -->
        <div class="title">
            <p class=" text-sm font-semibold uppercase tracking-wide text-blue-600 md:mt-6">
                Dashboard
            </p>
            <h1
                class="mb-4 mt-3 text-2xl font-extrabold leading-tight tracking-tight text-gray-900 md:text-2xl lg:leading-none">
                My
                <mark class="rounded bg-blue-600 px-2 text-white">Dashboard</mark>
                Brader 🤙🏻
            </h1>
        </div>

        <div class="relative overflow-x-auto shadow sm:rounded-lg">
            <div class="flex items-center justify-between gap-x-2 border border-slate-100 bg-transparent pb-4">
                <!-- dropdown -->
                <div class="relative inline-block text-left">
                    <div>
                        <button @click="open = !open" type="button"
                            class="inline-flex w-full justify-center gap-x-1.5 rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50"
                            id="menu-button" aria-expanded="true" aria-haspopup="true">
                            Options
                            <svg class="-mr-1 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor"
                                aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                    <!-- item dropdown -->
                    <div x-show="open" @click.away="open = false" x-transition:enter="transition ease-out duration-100"
                        x-transition:enter-start="transform opacity-0 scale-95"
                        x-transition:enter-end="transform opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-75"
                        x-transition:leave-start="transform opacity-100 scale-100"
                        x-transition:leave-end="transform opacity-0 scale-95"
                        class="absolute left-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                        role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                        <div class="py-1" role="none">
                            <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
                                id="menu-item-0">Account settings</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
                                id="menu-item-1">Support</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
                                id="menu-item-2">License</a>
                            <form method="POST" action="#" role="none">
                                <button type="submit" class="block w-full px-4 py-2 text-left text-sm text-gray-700"
                                    role="menuitem" tabindex="-1" id="menu-item-3">
                                    Sign out
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- end dropdown -->
                <label for="table-search" class="sr-only">Search</label>
                <div class="relative">
                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                        <svg class="h-5 w-5 text-gray-500" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    {{-- <form action="{{ route('report.index') }}" method="get"> --}}
                    <input type="search" name="search" id="table-search-users"
                        class="block w-80 rounded-lg border border-gray-300 bg-gray-50 p-2 pl-10 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                        placeholder="Search for users" />
                    {{-- </form> --}}
                </div>
            </div>
            <table class="w-full text-left text-sm text-gray-500">
                <thead class="bg-gray-50 text-xs uppercase text-gray-700">
                    <tr>
                        <th scope="col" class="p-4">No</th>
                        <th scope="col" class="px-6 py-3">Name</th>
                        <th scope="col" class="px-6 py-3">Bootcamp</th>
                        <th scope="col" class="px-6 py-3">Checkout Camp</th>
                        <th scope="col" class="px-6 py-3">Expired</th>
                        <th scope="col" class="px-6 py-3">Price</th>
                        <th scope="col" class="px-6 py-3">Status</th>
                        <th scope="col" class="px-6 py-3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($user as $item)
                        <tr class="border-b bg-white hover:bg-gray-50">
                            <td class="w-4 p-4 text-center">{{ $loop->iteration }}</td>
                            <th scope="row" class="flex items-center whitespace-nowrap px-6 py-4 text-gray-900">
                                <img class="h-10 w-10 rounded-full"
                                    src="{{ auth()->user()->avatar !== null ? asset('storage/' . auth()->user()->avatar) : 'https://ui-avatars.com/api/?name=' . auth()->user()->name . '&color=7F9CF5&background=EBF4FF' }}"
                                    alt="Jese image" />
                                <div class="pl-3">
                                    <div class="text-base font-semibold">{{ $item->user->name }}</div>
                                    <div class="font-normal text-gray-500">
                                        {{ $item->user->email }}
                                    </div>
                                </div>
                            </th>
                            <td class="px-6 py-4">{{ $item->camp->title }}</td>
                            <td class="px-6 py-4">{{ $item->created_at->format('D, Y-m') }}</td>
                            <td class="px-6 py-4">
                                {{ $item->expired }}
                            </td>
                            <td class="px-6 py-4">
                                ${{ $item->camp->price }}
                            </td>
                            <td class="px-6 py-4">
                                @if ($item->is_paid != 1)
                                    <div class="flex items-center">
                                        <div class="mr-2 h-2.5 w-2.5 rounded-full bg-orange-500"></div>
                                        Pending Payment
                                    </div>
                                @else
                                    <div class="flex items-center">
                                        <div class="mr-2 h-2.5 w-2.5 rounded-full bg-green-500"></div>
                                        Success Payment
                                    </div>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                {{-- detail --}}
                                <a href="{{ route('user.show', $item->id) }}"
                                    class="text-blue-500 hover:text-blue-700">Detail</a>
                            </td>
                        </tr>
                    @empty
                        <tr class="border-b bg-white hover:bg-gray-50">
                            <td colspan="7" class="w-4 p-4 text-center">
                                Tidak ada data transaksi yang ditemukan!
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <!-- end hero section -->
@endsection
