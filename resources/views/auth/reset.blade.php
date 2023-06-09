@extends('layouts.guest')
@section('content')
    <div class='flex justify-center h-screen lg:h-auto items-center'>
        <section class="lg:w-1/3 w-11/12">
            <div class="flex w-full flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
                <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 ">
                    <img class="md:w-16 w-12 mr-2" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600"
                        alt="logo">
                </a>
                <div class="w-full bg-white border border-slate-50 rounded-lg shadow md:mt-0 sm:max-w-md xl:p-0 ">
                    <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                        <h1 class="text-xl font-semibold leading-tight tracking-tight text-gray-900 md:text-2xl ">
                            Reset Password
                        </h1>
                        <form action="{{ route('password.update') }}" method="post" class="space-y-4 md:space-y-6">
                            @csrf
                            <input type="hidden" name="token" value="{{ request()->route('token') }}">
                            <div>
                                <label for="email"
                                    class="@error('email') is-invalid-field @enderror block mb-2 text-sm font-medium text-gray-900 ">Email</label>
                                <input type="email" autocomplete="off" name="email" id="email"
                                    value="{{ old('email', request()->query('email')) }}"
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
                                <input type="password" name="password" id="password" placeholder="••••••••"
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
                                <input type="password" name="password_confirmation" id="password" placeholder="••••••••"
                                    class="@error('password_confirmation') is-invalid-input @enderror bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 ">
                                @error('password_confirmation')
                                    <div class="text-red-500 text-sm mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <button type="submit"
                                class="w-full text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Reset
                                Password</button>
                            <p class="text-sm font-light text-gray-500">
                                Don’t have an account yet? <a href="{{ route('register') }}"
                                    class="font-medium text-blue-600 hover:underline ">Sign up</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
