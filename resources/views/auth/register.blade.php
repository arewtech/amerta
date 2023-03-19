@extends('layouts.guest')
@section('content')
    <div class='flex justify-center md:h-screen lg:mt-5 lg:h-auto items-center'>
        <section class="lg:w-1/3 w-11/12">
            <div class="flex w-full flex-col items-center justify-center px-6 py-8 mx-auto  lg:py-0">
                <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 ">
                    <img class="md:w-14 w-12 mr-2" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600"
                        alt="logo">
                </a>
                <div class="w-full bg-white border border-slate-50 rounded-lg shadow md:mt-0 sm:max-w-md xl:p-0 ">
                    <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                        <h1 class="text-xl font-semibold leading-tight tracking-tight text-gray-900 md:text-2xl ">
                            Sign up to Amerta
                        </h1>
                        <form action="{{ route('register') }}" method="post" class="space-y-4 md:space-y-6" action="#">
                            @csrf
                            <div>
                                <label for="name"
                                    class="@error('name') is-invalid-field @enderror block mb-2 text-sm font-medium text-gray-900 ">
                                    Name</label>
                                <input type="text" name="name" id="name"
                                    class="@error('name') is-invalid-input @enderror bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 "
                                    placeholder="Your Name">
                                @error('name')
                                    <div class="text-red-500 text-sm mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div>
                                <label for="email"
                                    class="@error('email') is-invalid-field @enderror block mb-2 text-sm font-medium text-gray-900 ">
                                    Email</label>
                                <input type="email" name="email" id="email"
                                    class="@error('email') is-invalid-input @enderror bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 "
                                    placeholder="nomads@company.com">
                                @error('email')
                                    <div class="text-red-500 text-sm mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div>
                                <label for="password"
                                    class="@error('password') is-invalid-field @enderror block mb-2 text-sm font-medium text-gray-900 ">Password</label>
                                <input type="password" name="password" id="password" placeholder="Min. 8 Characters"
                                    class="@error('password') is-invalid-input @enderror bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 ">
                                @error('password')
                                    <div class="text-red-500 text-sm mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div>
                                <label for="password_confirmation"
                                    class="@error('password_confirmation') is-invalid-field @enderror block mb-2 text-sm font-medium text-gray-900 ">Password
                                    Confirmation</label>
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    placeholder="Min. 8 Characters"
                                    class="@error('password_confirmation') is-invalid-input @enderror bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 ">
                                @error('password_confirmation')
                                    <div class="text-red-500 text-sm mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                    <input id="remember" aria-describedby="remember" type="checkbox"
                                        class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300">
                                </div>
                                <div class="ml-3 text-sm">
                                    <label for="remember" class="text-gray-500 ">Creating an account means you’re okay with
                                        our
                                        <span class='font-semibold text-blue-500 cursor-pointer hover:text-blue-600'>Terms
                                            of
                                            Service</span>, <span
                                            class='font-semibold text-blue-500 cursor-pointer hover:text-blue-600'>Privacy
                                            Policy</span>, </label>
                                </div>
                            </div>
                            <button type="submit"
                                class="w-full text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Sign
                                up</button>
                            <p class="text-xs font-light text-gray-500">
                                This site is protected by reCAPTCHA and the Google <span
                                    class='font-semibold text-blue-500 cursor-pointer hover:text-blue-600'>Privacy
                                    Policy</span>
                                and <span class='font-semibold text-blue-500 cursor-pointer hover:text-blue-600'>Terms of
                                    Service</span> apply.
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
