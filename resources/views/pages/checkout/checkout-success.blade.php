@extends('layouts.success')
@section('content')
    <!-- section hero content -->
    <div class="container mx-auto flex w-full items-center justify-center px-10 md:h-[70vh] lg:px-12">
        <!-- title -->
        <div class="text-center">
            <img class="m-auto max-w-xs" src="{{ asset('frontend') }}/assets/images/success.svg" alt="" />
            <p class="mt-3 text-sm font-semibold uppercase tracking-wide text-blue-600 md:mt-6">
                What a day!
            </p>
            <h1
                class="mb-4 mt-3 text-2xl font-extrabold leading-tight tracking-tight text-gray-900 md:text-2xl lg:leading-none">
                Berhasil
                <mark class="rounded bg-blue-600 px-2 text-white">Checkout</mark>
                Brader 🤙🏻
            </h1>
            <!-- create button -->
            <div class="m-auto mt-4 max-w-sm">
                Terima kasih telah checkout di Loka.com, silahkan cek email kamu untuk
                mendapatkan informasi lebih lanjut, kembali ke
                <a href="{{ route('preview') }}" class="text-sm font-medium underline hover:no-underline">Dashboard
                    🤙🏻</a>
            </div>
        </div>
    </div>
    <!-- end hero section -->
@endsection
