@extends('layouts.success')
@section('content')
    <!-- section hero content -->
    <div class="container mx-auto w-full max-w-7xl px-10 mb-5 pt-5">
        <!-- title -->
        <div class="title text-center print:hidden">
            <h1 class="my-4 text-2xl font-extrabold leading-tight tracking-tight text-gray-900 md:text-2xl lg:leading-none">
                <mark class="rounded bg-blue-600 px-2 text-white">{{ $user->camp->title }}</mark>
                👨🏻‍💻
            </h1>
            <p class=" text-sm font-semibold uppercase tracking-wide text-blue-600 md:my-4">
                Kamu sudah menyelesaikan bootcamp ini, selamat <b>{{ auth()->user()->name }}</b> 🎉
            </p>
        </div>

        <div class="overflow-hidden bg-white shadow sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6">
                @if ($user->is_paid == true)
                    <h3 class="text-base font-semibold leading-6 text-gray-900">{{ $user->camp->title }}
                        <span class='bg-green-500 font-bold text-slate-50 px-2.5 text-xs py-1 rounded-xl'>success
                            payment</span>
                    </h3>
                @else
                    <h3 class="text-base font-semibold leading-6 text-gray-900">{{ $user->camp->title }}
                        <span class='bg-yellow-400 font-bold text-slate-50 px-2.5 text-xs py-1 rounded-xl'>pending
                            payment</span>
                    </h3>
                @endif
                <p class="mt-2 max-w-2xl text-sm text-gray-500">Update Terbaru Tanggal :
                    <span class='font-semibold'>{{ $user->updated_at->format('D, Y-m | H:i:s') }}</span>
                </p>
            </div>
            <div class="border-t border-gray-200">
                <dl>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Name</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ $user->user->name }}</dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Occupation</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ $user->user->occupation }}</dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Email address</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ $user->user->email }}</dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Status Program</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                            @if ($user->status == 'on going')
                                <span class='bg-yellow-400 text-slate-50 font-bold px-2.5 text-xs py-1 rounded-xl'>on
                                    going</span>
                            @else
                                <span class='bg-green-500 text-slate-50 font-bold px-2.5 text-xs py-1 rounded-xl'>
                                    finished
                                </span>
                            @endif
                        </dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Card Number</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ $user->card_number }}</dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">CVC</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ $user->cvc }}</dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Bootcamp</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                            {{ $user->camp->title }} ( Rp. @currency($user->camp->price) )
                        </dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Discount</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                            @if ($user->discount == null)
                                <span class='bg-red-500 font-bold text-slate-50 px-2.5 text-xs py-1 rounded-xl'>no
                                    discount</span>
                            @else
                                <span class='bg-green-500 font-bold text-slate-50 px-2.5 text-xs py-1 rounded-xl'>
                                    {{ $user->discount }}%
                                </span>
                            @endif
                        </dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Total</dt>
                        <dd class="mt-1 text-sm text-gray-900 font-bold sm:col-span-2 sm:mt-0">
                            Rp. @currency($user->camp->price)
                        </dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>
    @push('print')
        <script>
            window.print();
        </script>
    @endpush
    <!-- end hero section -->
@endsection
