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
                    <div class="p-6 space-y-2 md:space-y-2 sm:p-8">
                        <h1 class="text-xl font-semibold leading-tight tracking-tight text-gray-900 ">
                            Verify your email address
                        </h1>
                        @if (session('status') == 'verification-link-sent')
                            <div class="mb-4 font-medium text-sm text-green-600">
                                {{ __('A new email verification link has been emailed to you!.') }}
                            </div>
                        @endif
                        <form action="{{ route('verification.send') }}" method="post" class="space-y-2 md:space-y-3"
                            action="#">
                            @csrf
                            <button type="submit"
                                class="w-full text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                Send Email Verification</button>
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
