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
        <div class='flex flex-wrap lg:flex-nowrap md:justify-center items-start gap-4'>
            <div class='lg:basis-1/3 md:basis-2/5 basis-full'>
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
                            class="z-10 hidden absolute top-16 md:-right-14 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow w-40">
                            <ul class="py-2" aria-labelledby="dropdownButton">
                                <li>
                                    <button type="submit"
                                        class="relative w-full block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Change
                                        picture
                                        {{-- <form action="{{ route('user-profile-information.update') }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT') --}}
                                        <input class='absolute inset-0 opacity-0' type="file" name="avatar">
                                        {{-- </form> --}}
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="flex flex-col items-center pb-10 px-10">
                        <img id='img-live-preview' class="lg:h-20 lg:w-20 h-16 w-16 object-cover rounded-full"
                            src="{{ auth()->user()->avatar !== null ? asset('storage/' . auth()->user()->avatar) : 'https://ui-avatars.com/api/?name=' . auth()->user()->name . '&color=7F9CF5&background=EBF4FF' }}"
                            alt="Current profile photo" />
                        <h5 class="mb-1 text-xl font-medium text-gray-900">{{ auth()->user()->name }}</h5>
                        <span class="mb-2 text-sm text-gray-500">{{ auth()->user()->occupation ?? 'Developer' }}</span>
                        <p class="text-sm text-center text-gray-500">
                            {{ auth()->user()->bio ?? 'belum menuliskan bio' }}</p>
                    </div>
                </div>

                <!-- update password -->
                <div class="w-full p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8">
                    <h5 class="text-xl mb-5 font-medium text-gray-900">Password information</h5>
                    @if (session('status') == 'password-updated')
                        <!-- alert -->
                        <div x-data="{ open: true }" :class="{ 'hidden': !open }"
                            class="bg-green-100 mt-4 text-sm border border-green-400 text-green-700 px-4 py-3 rounded relative"
                            role="alert">
                            <strong class="font-semibold">Password, </strong>
                            <span class="block sm:inline">berhasil di ubah!</span>
                            <button @click="open = false" class="absolute top-0 bottom-0 right-0 px-4 py-3">
                                <svg class="fill-current h-6 w-6 text-green-500" role="button"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <title>Close</title>
                                    <path
                                        d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                                </svg>
                            </button>
                        </div>
                    @endif
                    <form class="space-y-5" action="{{ route('user-password.update') }}" method="post">
                        @csrf
                        @method('put')
                        <div>
                            <label for="current_password"
                                class="@error('current_password', 'updatePassword') is-invalid-field @enderror block mb-2 text-sm font-medium text-gray-900">
                                Current Password</label>
                            <input type="password" name="current_password" id="current_password"
                                class="@error('current_password', 'updatePassword') is-invalid-input @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Current Password">
                            @error('current_password', 'updatePassword')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="password"
                                class="@error('password', 'updatePassword') is-invalid-field @enderror block mb-2 text-sm font-medium text-gray-900">New
                                Password</label>
                            <input type="password" name="password" id="password" placeholder="Min. 8 characters"
                                class="@error('current_password', 'updatePassword') is-invalid-input @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            @error('password', 'updatePassword')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900">Password
                                Confirmation</label>
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                placeholder="Min. 8 characters"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            @error('password_confirmation', 'updatePassword')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit"
                            class="inline-block text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Save
                        </button>
                    </form>
                </div>
            </div>
            <!-- update profile -->
            <div class='lg:basis-4/6 md:basis-[55%] basis-full'>
                <div class="w-full mb-4 p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8">
                    <h5 class="text-xl font-medium text-gray-900">General information</h5>
                    <p class="text-sm mt-1 mb-5 text-gray-500">Use a permanent address where you can receive mail.</p>
                    @if (session('status') == 'profile-information-updated')
                        <!-- alert -->
                        <div x-data="{ open: true }" :class="{ 'hidden': !open }"
                            class="bg-green-100 text-sm border border-green-400 text-green-700 px-4 py-3 rounded relative"
                            role="alert">
                            <strong class="font-semibold">Profile, </strong>
                            <span class="block sm:inline">berhasil di ubah!</span>
                            <button @click="open = false" class="absolute top-0 bottom-0 right-0 px-4 py-3">
                                <svg class="fill-current h-6 w-6 text-green-500" role="button"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <title>Close</title>
                                    <path
                                        d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                                </svg>
                            </button>
                        </div>
                    @endif
                    <form class="space-y-5" action="{{ route('user-profile-information.update') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="flex gap-4 flex-wrap lg:flex-nowrap">
                            <div class='w-full'>
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">
                                    Name</label>
                                <input type="text" name="name" id="name" value="{{ auth()->user()->name }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="Your Name">
                            </div>

                            <div class='w-full'>
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900">
                                    Email</label>
                                <input type="email" name="email" id="email" value="{{ auth()->user()->email }}"
                                    placeholder="amerta@gmail.com"
                                    class="border bg-slate-200/70 pointer-events-none border-gray-300 text-gray-500 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            </div>
                        </div>
                        <div class="flex gap-4 flex-wrap lg:flex-nowrap">
                            <div class='w-full'>
                                <label for="occupation"
                                    class="block mb-2 text-sm font-medium text-gray-900">Occupation</label>
                                <select id="countries" name="occupation"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                    <option selected disabled>Select Position</option>
                                    <option {{ auth()->user()->occupation == 'CEO' ? 'selected' : '' }} value="CEO">CEO
                                    </option>
                                    <option {{ auth()->user()->occupation == 'Founder' ? 'selected' : '' }}
                                        value="Founder">Founder</option>
                                    <option {{ auth()->user()->occupation == 'Staf' ? 'selected' : '' }} value="Staf">
                                        Staf</option>
                                    <option {{ auth()->user()->occupation == 'Product Manager' ? 'selected' : '' }}
                                        value="Product Manager">Product Manager</option>
                                </select>
                            </div>
                            <div class='w-full'>
                                @if (auth()->user()->email_verified_at == null)
                                    <label for="email_verified_at"
                                        class="block mb-2 text-sm font-medium text-gray-900">Email
                                        Verified</label>
                                    <input type="email" name="email_verified_at" id="email_verified_at"
                                        class="border bg-slate-200/70 placeholder:text-gray-900 pointer-events-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        placeholder="not verified">
                                @else
                                    <label for="email_verified_at"
                                        class="block mb-2 text-sm font-medium text-green-700">Email
                                        Verified</label>
                                    <input type="email" id="email_verified_at"
                                        class="bg-green-50 border pointer-events-none border-green-500 text-green-900 placeholder-green-700 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5"
                                        placeholder="verified">
                                @endif
                            </div>
                        </div>
                        <div class="flex gap-4 flex-wrap lg:flex-nowrap">
                            <div class='w-full'>
                                <label for="message" class="block mb-2 text-sm font-medium text-gray-900">Your
                                    Bio</label>
                                <textarea id="message" rows="4" name="bio"
                                    class="block p-2.5 w-full text-sm text-left text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Write your thoughts here...">
                                    {{ auth()->user()->bio ?? 'artinya apa bang messi?' }}
                                </textarea>
                            </div>
                            <div class='w-full order-first lg:order-none'>
                                <label for="status" class="block mb-2 text-sm font-medium text-gray-900">
                                    Change Image</label>
                                <label class="block">
                                    <span class="sr-only">Choose profile photo</span>
                                    <input type="file" name="avatar" onchange="previewImage(this)"
                                        class="block w-full text-sm text-slate-500
                                                file:mr-4 file:py-2 file:px-4
                                                file:rounded-full file:border-0
                                                file:text-sm file:font-semibold
                                                file:bg-blue-50 file:text-blue-700
                                                hover:file:bg-blue-100
                                                " />
                                </label>
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
                    <h5 class="text-xl font-medium text-gray-900">Timeline Kegiatan</h5>
                    <p class="text-sm mt-1 mb-5 text-gray-500">Timeline kegiatan bootcamp yang sudah pernah diikuti selama
                        ini.</p>
                    <ol class="relative border-l border-gray-200">
                        @forelse ($camp as $item)
                            <li class="mb-10 ml-4">
                                <div
                                    class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -left-1.5 border border-white">
                                </div>
                                <time
                                    class="mb-1 text-sm font-normal leading-none text-gray-400">{{ $item->expired }}</time>
                                <h3 class="text-lg font-semibold text-gray-900">{{ $item->camp->title }}
                                    <span class='bg-green-500  text-slate-50 px-2.5 text-xs py-1 rounded-xl'>
                                        finished
                                    </span>
                                </h3>
                                <p class="mb-4 text-base font-normal text-gray-500">
                                    {{ $item->camp->tagline }}</p>
                                <a href="{{ route('preview') }}"
                                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:outline-none focus:ring-gray-200 focus:text-blue-700">Learn
                                    more <svg class="w-3 h-3 ml-2" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg></a>
                            </li>
                        @empty
                            <li class="mb-10 ml-4">
                                <div
                                    class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -left-1.5 border border-white">
                                </div>
                                <time class="mb-1 text-sm font-normal leading-none text-gray-400">-</time>
                                <h3 class="text-lg font-semibold text-gray-900">Belum ada kegiatan yang pernah diikuti.
                                </h3>
                            </li>
                        @endforelse
                    </ol>
                </div>
            </div>
        </div>

    </div>
    <!-- end hero section -->
@endsection
@push('image-preview')
    <script>
        // preview object URL
        function previewImage(input) {
            if (input.files && input.files[0]) {
                var url = URL.createObjectURL(input.files[0]);
                document.getElementById('img-live-preview').src = url;
            }
        }
    </script>
@endpush
