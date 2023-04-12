@extends('layouts.app')
@section('content')
    <!-- section hero content -->
    <div class="container mx-auto w-full px-10 lg:px-12">
        <!-- title -->
        <div class="mt-10 text-center">
            <p class="text-sm font-semibold uppercase tracking-wide text-blue-600">
                Masa depan di tanganmu
            </p>
            <h1
                class="mb-4 mt-3 text-4xl font-extrabold leading-tight tracking-tight text-gray-900 md:mt-6 md:text-5xl lg:text-5xl lg:leading-none">
                Gasskuy
                <mark class="rounded bg-blue-600 px-2 text-white">Checkout</mark>
                Bootcamp Brader 🤙🏻
            </h1>
            <p class="m-auto text-base font-normal text-gray-500 md:text-lg lg:w-1/2">
                Belajar dari mentor yang sudah berpengalaman di bidangnya, sudah
                banyak yang sukses dengan bootcamp ini, tapi boong.
            </p>
        </div>

        <!-- content checkout -->
        <div class="mt-14">
            <div class="my-10 sm:mt-0">
                <div class="md:grid md:grid-cols-4 md:gap-6">
                    <div class="flex items-center md:col-span-2">
                        <div class="px-4 text-center sm:px-0">
                            <img class="m-auto w-3/4 drop-shadow-md md:w-8/12 lg:w-7/12"
                                src="{{ asset('frontend') }}/assets/images/lara.svg" alt="laravel" />
                            <h3 class="mt-6 text-xl font-semibold leading-6 text-gray-900 md:mt-8 md:text-lg lg:text-xl">
                                {{ $camp->title }}
                            </h3>
                            <p class="mt-2 text-sm text-gray-400">
                                {{ $camp->description }}
                            </p>
                        </div>
                    </div>
                    <div class="mt-10 md:col-span-2 md:mt-0">
                        @foreach ($errors->all() as $error)
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"
                                role="alert">
                                <strong class="font-bold">Error!</strong>
                                <span class="block sm:inline">{{ $error }}</span>
                            </div>
                        @endforeach
                        <form action="{{ route('checkout.store', $camp->slug) }}" method="POST">
                            @csrf
                            <div class="overflow-hidden shadow sm:rounded-md">
                                <div class="bg-white px-4 py-5 sm:p-6">
                                    <div class="grid grid-cols-6 gap-6">
                                        <div class="col-span-6 sm:col-span-4 md:col-span-6 lg:col-span-4">
                                            <label for="full-name"
                                                class="block text-sm font-medium leading-6 text-green-900">Name</label>
                                            <input type="text" name="name" value="{{ auth()->user()->name }}"
                                                id="full-name" autocomplete="given-name" placeholder="Your Name"
                                                class="mt-2 block w-full bg-green-50 pointer-events-none rounded-md border border-green-500 py-1.5 text-green-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-sm placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-500 sm:text-sm sm:leading-6" />
                                            <span class="text-green-600 text-xs italic">Nama sudah terintegrasi dari
                                                login, secara otomatis.</span>
                                        </div>

                                        <div class="col-span-6 sm:col-span-4 md:col-span-6 lg:col-span-4">
                                            <label for="email-address"
                                                class="block text-sm font-medium leading-6 text-green-900">Email
                                                address</label>
                                            <input type="text" name="email" value="{{ auth()->user()->email }}"
                                                id="email-address" autocomplete="email" placeholder="Your Email"
                                                class="mt-2 block bg-green-50 pointer-events-none w-full rounded-md border border-green-500 py-1.5 text-green-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-sm placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-500 sm:text-sm sm:leading-6" />
                                            <span class="text-green-600 text-xs italic">Email sudah terintegrasi dari login,
                                                secara otomatis.</span>
                                        </div>

                                        <div class="col-span-6 sm:col-span-4 md:col-span-6 lg:col-span-4">
                                            <label for="occupation"
                                                class="@error('occupation') is-invalid-field @enderror block text-sm font-medium leading-6 text-gray-900">Occupation</label>
                                            <select id="occupation" name="occupation" autocomplete="country-name"
                                                class="@error('occupation') is-invalid-input @enderror mt-2 block w-full rounded-md border-0 bg-white py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-sm focus:ring-2 focus:ring-inset focus:ring-blue-500 sm:text-sm sm:leading-6">
                                                <option selected disabled>Select Position</option>
                                                <option {{ auth()->user()->occupation == 'CEO' ? 'selected' : '' }}
                                                    value="CEO">CEO</option>
                                                <option {{ auth()->user()->occupation == 'Founder' ? 'selected' : '' }}
                                                    value="Founder">Founder</option>
                                                <option {{ auth()->user()->occupation == 'Staf' ? 'selected' : '' }}
                                                    value="Staf">Staf</option>
                                                <option
                                                    {{ auth()->user()->occupation == 'Product Manager' ? 'selected' : '' }}
                                                    value="Product Manager">Product Manager</option>
                                            </select>
                                            @error('occupation')
                                                <span class="text-red-500 text-xs italic">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="col-span-6 sm:col-span-4 md:col-span-6 lg:col-span-4">
                                            <label for="card-number"
                                                class="@error('card_number') is-invalid-field @enderror block text-sm font-medium leading-6 text-gray-900">Card
                                                Number</label>
                                            <input type="number" name="card_number" value="{{ old('card_number') }}"
                                                id="card-number" placeholder="Your Card Number"
                                                class="@error('card_number') is-invalid-input @enderror mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-sm placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-500 sm:text-sm sm:leading-6" />
                                            @error('card_number')
                                                <span class="text-red-500 text-xs italic">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="col-span-6 sm:col-span-3 lg:col-span-4">
                                            <label for="date"
                                                class="@error('expired') is-invalid-field @enderror block text-sm font-medium leading-6 text-gray-900">Expired</label>
                                            <input type="month" name="expired" id="date"
                                                value="{{ old('expired') }}"
                                                class="@error('expired') is-invalid-input @enderror mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-sm placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-500 sm:text-sm sm:leading-6" />
                                            @error('expired')
                                                <span class="text-red-500 text-xs italic">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="col-span-6 sm:col-span-3 lg:col-span-3">
                                            <label for="cvc"
                                                class="@error('cvc') is-invalid-field @enderror block text-sm font-medium leading-6 text-gray-900">Postal
                                                code /
                                                CVC</label>
                                            <input type="number" name="cvc" id="cvc" value="{{ old('cvc') }}"
                                                placeholder="Your CVC"
                                                class="@error('cvc') is-invalid-input @enderror mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-sm placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-500 sm:text-sm sm:leading-6" />
                                            @error('cvc')
                                                <span class="text-red-500 text-xs italic">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="col-span-6 sm:col-span-3 lg:col-span-3">
                                            <label for="cvc"
                                                class="@error('cvc') is-invalid-field @enderror block text-sm font-medium leading-6 text-gray-900">
                                                Code Discount
                                            </label>
                                            <input type="text" name="discount" id="discount"
                                                value="{{ old('discount') }}" placeholder="Code"
                                                class="@error('discount') is-invalid-input @enderror mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-sm placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-500 sm:text-sm sm:leading-6" />
                                            @error('discount')
                                                <span class="text-red-500 text-xs italic">{{ $message }}</span>
                                            @enderror
                                            @if ($discount)
                                                <div class="text-gray-400 mt-0.5 text-xs italic">Gunakan code discount
                                                    <span
                                                        class='text-green-500 font-semibold'>{{ $discount->code }}</span>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                                    <button type="submit"
                                        class="inline-flex justify-center rounded-md bg-blue-500 py-2 px-3 text-sm font-semibold text-white shadow-sm hover:bg-blue-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">
                                        Pay Now
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end hero section -->
@endsection
