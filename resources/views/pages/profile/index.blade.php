@extends('layouts.success')
@section('content')
    <!-- section hero content -->
    <div x-data="{ open: false }" class="container mx-auto w-full max-w-7xl px-10 pb-14">

        <!-- title -->

        <nav class="flex mb-4 mt-4" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('home') }}"
                        class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                            </path>
                        </svg>
                        Home
                    </a>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">Settings</span>
                    </div>
                </li>
            </ol>
        </nav>
        <h2 class="mb-4 text-2xl font-semibold leading-none tracking-tight text-gray-900">User Setting</h2>

        <!-- profile -->
        <div class='flex items-start gap-4'>
            <div class='basis-1/3'>
                <!-- user profile -->
                <div x-data="{ open: false }" class="w-full mb-4 bg-white border border-gray-200 rounded-lg shadow">
                    <div class="flex relative justify-end px-4 pt-4">
                        <button @click="open = !open" id="dropdownButton" data-dropdown-toggle="dropdown"
                            @click.away="open = false" x-transition:enter="transition ease-out duration-100"
                            class="inline-block  text-gray-500 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg text-sm p-1.5"
                            type="button">
                            <span class="sr-only">Open dropdown</span>
                            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z">
                                </path>
                            </svg>
                        </button>
                        <!-- Dropdown menu -->
                        <div id="dropdown" :class="{ 'block': open, 'hidden': !open }"
                            class="z-10 hidden absolute top-16 -right-14 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow w-40">
                            <ul class="py-2" aria-labelledby="dropdownButton">
                                <li>
                                    <button type="submit"
                                        class="relative w-full block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Change
                                        picture
                                        <input class='absolute inset-0 opacity-0' type="file" name=""
                                            id="">
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="flex flex-col items-center pb-10 px-10">
                        <img class="w-24 h-24 mb-3 rounded-full shadow-lg"
                            src="https://flowbite.com/docs/images/people/profile-picture-3.jpg" alt="Bonnie image" />
                        <h5 class="mb-1 text-xl font-medium text-gray-900">Bonnie Green</h5>
                        <span class="mb-2 text-sm text-gray-500">Visual Designer</span>
                        <p class="text-sm text-center text-gray-500">Lorem ipsum dolor sit amet consectetur
                            modi, quis amet ullam numquam labore aliquam illum id. aliquam illum id.</p>
                    </div>
                </div>

                <!-- update password -->
                <div class="w-full p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8">
                    <form class="space-y-6" action="#">
                        <h5 class="text-xl font-medium text-gray-900">Password information</h5>
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Your
                                email</label>
                            <input type="email" name="email" id="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="name@company.com" required>
                        </div>

                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Your
                                password</label>
                            <input type="password" name="password" id="password" placeholder="••••••••"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                required>
                        </div>

                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Your
                                password</label>
                            <input type="password" name="password" id="password" placeholder="••••••••"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                required>
                        </div>
                        <button type="submit"
                            class="inline-block text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Save
                            all
                        </button>
                    </form>
                </div>
            </div>

            <div class='basis-4/6'>
                <div class="w-full mb-4 p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8">
                    <form class="space-y-6" action="#">
                        <h5 class="text-xl font-medium text-gray-900">General information</h5>
                        <div class="flex gap-4">
                            <div class='w-full'>
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Your
                                    email</label>
                                <input type="email" name="email" id="email"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="name@company.com" required>
                            </div>

                            <div class='w-full'>
                                <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Your
                                    password</label>
                                <input type="password" name="password" id="password" placeholder="••••••••"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    required>
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <div class='w-full'>
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Your
                                    email</label>
                                <input type="email" name="email" id="email"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="name@company.com" required>
                            </div>
                            <div class='w-full'>
                                <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Your
                                    password</label>
                                <input type="password" name="password" id="password" placeholder="••••••••"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    required>
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <div class='w-full'>
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Your
                                    email</label>
                                <input type="email" name="email" id="email"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="name@company.com" required>
                            </div>
                            <div class='w-full'>
                                <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Your
                                    password</label>
                                <input type="password" name="password" id="password" placeholder="••••••••"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    required>
                            </div>
                        </div>
                        <button type="submit"
                            class="inline-block text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Save
                            all
                        </button>
                    </form>
                </div>
                <!-- timeline -->
                <div class="w-full p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8">

                    <ol class="relative border-l border-gray-200">
                        <li class="mb-10 ml-4">
                            <div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -left-1.5 border border-white">
                            </div>
                            <time class="mb-1 text-sm font-normal leading-none text-gray-400">February
                                2022</time>
                            <h3 class="text-lg font-semibold text-gray-900">Application UI code in Tailwind
                                CSS</h3>
                            <p class="mb-4 text-base font-normal text-gray-500">Get access to over 20+
                                pages including a dashboard layout, charts, kanban board, calendar, and pre-order E-commerce
                                & Marketing pages.</p>
                            <a href="#"
                                class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:outline-none focus:ring-gray-200 focus:text-blue-700">Learn
                                more <svg class="w-3 h-3 ml-2" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg></a>
                        </li>
                        <li class="mb-10 ml-4">
                            <div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -left-1.5 border border-white">
                            </div>
                            <time class="mb-1 text-sm font-normal leading-none text-gray-400">March
                                2022</time>
                            <h3 class="text-lg font-semibold text-gray-900">Marketing UI design in Figma
                            </h3>
                            <p class="text-base font-normal text-gray-500">All of the pages and
                                components are first designed in Figma and we keep a parity between the two versions even as
                                we update the project.</p>
                        </li>
                        <li class="ml-4">
                            <div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -left-1.5 border border-white">
                            </div>
                            <time class="mb-1 text-sm font-normal leading-none text-gray-400">April
                                2022</time>
                            <h3 class="text-lg font-semibold text-gray-900">E-Commerce UI code in Tailwind
                                CSS</h3>
                            <p class="text-base font-normal text-gray-500">Get started with dozens of
                                web components and interactive elements built on top of Tailwind CSS.</p>
                        </li>
                    </ol>

                </div>
            </div>
        </div>

    </div>
    <!-- end hero section -->
@endsection
