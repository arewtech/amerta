@extends('layouts.app')
@section('content')
    <!-- main content -->
    <!-- section hero content -->
    <div class="xl:w-12/12 mx-auto w-full px-10 lg:px-12 2xl:w-10/12">
        <div class="-mx-8 flex flex-wrap items-center justify-center pt-20 pb-10 lg:pt-16">
            <div class="w-full px-8 text-center lg:w-8/12 xl:w-6/12 xl:text-left">
                <div class="ml-1 font-semibold uppercase tracking-wide text-gray-700 text-opacity-70">
                    Belajar Programming
                </div>
                <h1 class="text-5xl font-light leading-tight text-blue-900 md:text-[3.5rem] lg:text-[3.4rem]">
                    Ayo, Asah Skill 👨🏻‍💻
                    <span class="font-semibold text-blue-500">Programming</span>
                    Kamu.
                </h1>
                <p class="mx-auto mt-4 text-xl leading-relaxed text-gray-600 md:w-3/5 lg:w-10/12 lg:text-lg xl:mx-0">
                    Gabung bersama kita - kita ini biar ngoding lu jago, jangan tutorial
                    ngoding aja terus, kapan jagonya cok!
                </p>
                <div class="mt-8 flex flex-wrap items-center justify-center xl:justify-start">
                    <a class="mb-2 inline-flex w-full justify-center rounded-lg border-2 border-transparent bg-blue-500 px-6 py-3 text-sm font-semibold text-white transition-all hover:bg-blue-600 sm:mb-0 sm:mr-4 sm:w-auto"
                        href="#pricing" rel="noreferrer">Mulai Sekarang</a>
                    <a class="inline-flex w-full items-center justify-center rounded-lg border-2 border-transparent bg-blue-100 px-6 py-3 text-sm font-semibold text-blue-500 transition-all hover:bg-blue-200 sm:w-auto"
                        href="#preview">
                        <svg class="mr-2 w-6 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 256 256">
                            <rect width="256" height="256" fill="none"></rect>
                            <circle cx="128" cy="128" r="96" fill="none" stroke="currentColor"
                                stroke-miterlimit="10" stroke-width="16"></circle>
                            <polygon points="160 128 112 96 112 160 160 128" fill="none" stroke="currentColor"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></polygon>
                        </svg>
                        Preview
                    </a>
                </div>
            </div>
            <div class="mt-16 w-full px-8 xl:mt-0 xl:w-6/12">
                <div><img src="{{ asset('frontend') }}/assets/images/hero.png" alt="" /></div>
            </div>
        </div>
    </div>
    <!-- end hero section -->
    <!-- sponsor -->
    <div class="bg-white py-24 sm:py-32">
        <div class="mx-auto max-w-6xl px-6 lg:px-8">
            <h2 class="text-center text-lg font-semibold leading-8 text-gray-900 md:text-2xl">
                Trusted by the world’s most innovative teams
            </h2>
            <div
                class="mx-auto mt-10 grid max-w-lg grid-cols-4 items-center gap-8 sm:max-w-xl sm:grid-cols-6 sm:gap-x-5 lg:mx-0 lg:max-w-none lg:grid-cols-5">
                <img class="col-span-2 max-h-12 w-full object-contain lg:col-span-1"
                    src="https://tailwindui.com/img/logos/158x48/transistor-logo-gray-900.svg" alt="Transistor"
                    width="158" height="48" />
                <img class="col-span-2 max-h-12 w-full object-contain lg:col-span-1"
                    src="https://tailwindui.com/img/logos/158x48/reform-logo-gray-900.svg" alt="Reform" width="158"
                    height="48" />
                <img class="col-span-2 max-h-12 w-full object-contain lg:col-span-1"
                    src="https://tailwindui.com/img/logos/158x48/tuple-logo-gray-900.svg" alt="Tuple" width="158"
                    height="48" />
                <img class="col-span-2 max-h-12 w-full object-contain sm:col-start-2 lg:col-span-1"
                    src="https://tailwindui.com/img/logos/158x48/savvycal-logo-gray-900.svg" alt="SavvyCal" width="158"
                    height="48" />
                <img class="col-span-2 col-start-2 max-h-12 w-full object-contain sm:col-start-auto lg:col-span-1"
                    src="https://tailwindui.com/img/logos/158x48/statamic-logo-gray-900.svg" alt="Statamic" width="158"
                    height="48" />
            </div>
        </div>
    </div>

    <!-- end sponsor -->
    <!-- benefit -->
    <div class="bg-white py-10 sm:py-20 md:pt-8 md:pb-28 lg:pb-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl lg:text-center">
                <h2 class="text-lg font-semibold leading-8 tracking-tight text-blue-500">
                    Mau jago ga lu?
                </h2>
                <p class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
                    Belajar bersama mentor yang berpengalaman
                </p>
                <p class="mt-6 text-lg leading-8 text-gray-600">
                    Kami memiliki mentor yang berpengalaman dan sudah banyak membantu
                    orang lain untuk menjadi programmer profesional, biar ga kaya lu.
                </p>
            </div>
            <div class="mx-auto mt-16 max-w-2xl sm:mt-20 lg:mt-24 lg:max-w-[60rem]">
                <dl class="grid max-w-xl grid-cols-1 gap-y-10 gap-x-8 lg:max-w-none lg:grid-cols-2 lg:gap-x-14 lg:gap-y-16">
                    <div class="relative pl-16">
                        <dt class="text-base font-semibold leading-7 text-gray-900">
                            <div
                                class="absolute top-0 left-0 flex h-10 w-10 items-center justify-center rounded-lg bg-blue-500">
                                <!-- Heroicon name: outline/cloud-arrow-up -->
                                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 16.5V9.75m0 0l3 3m-3-3l-3 3M6.75 19.5a4.5 4.5 0 01-1.41-8.775 5.25 5.25 0 0110.233-2.33 3 3 0 013.758 3.848A3.752 3.752 0 0118 19.5H6.75z" />
                                </svg>
                            </div>
                            Diversity
                        </dt>
                        <dd class="mt-2 text-base leading-7 text-gray-600">
                            Belajar dimana saja dan kapan saja, karena kami menyediakan
                            video tutorial yang bisa diakses kapan saja.
                        </dd>
                    </div>

                    <div class="relative pl-16">
                        <dt class="text-base font-semibold leading-7 text-gray-900">
                            <div
                                class="absolute top-0 left-0 flex h-10 w-10 items-center justify-center rounded-lg bg-blue-500">
                                <!-- Heroicon name: outline/lock-closed -->
                                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                                </svg>
                            </div>
                            A.I Guideline
                        </dt>
                        <dd class="mt-2 text-base leading-7 text-gray-600">
                            Kami memiliki A.I yang akan membantu kamu untuk memilih mentor
                            yang sesuai dengan kebutuhan kamu.
                        </dd>
                    </div>

                    <div class="relative pl-16">
                        <dt class="text-base font-semibold leading-7 text-gray-900">
                            <div
                                class="absolute top-0 left-0 flex h-10 w-10 items-center justify-center rounded-lg bg-blue-500">
                                <!-- Heroicon name: outline/arrow-path -->
                                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                                </svg>
                            </div>
                            1 on 1 Mentoring
                        </dt>
                        <dd class="mt-2 text-base leading-7 text-gray-600">
                            Kamu bisa bertanya langsung kepada mentor yang kamu pilih,
                            karena kami menyediakan 1 on 1 mentoring.
                        </dd>
                    </div>

                    <div class="relative pl-16">
                        <dt class="text-base font-semibold leading-7 text-gray-900">
                            <div
                                class="absolute top-0 left-0 flex h-10 w-10 items-center justify-center rounded-lg bg-blue-500">
                                <!-- Heroicon name: outline/finger-print -->
                                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M7.864 4.243A7.5 7.5 0 0119.5 10.5c0 2.92-.556 5.709-1.568 8.268M5.742 6.364A7.465 7.465 0 004.5 10.5a7.464 7.464 0 01-1.15 3.993m1.989 3.559A11.209 11.209 0 008.25 10.5a3.75 3.75 0 117.5 0c0 .527-.021 1.049-.064 1.565M12 10.5a14.94 14.94 0 01-3.6 9.75m6.633-4.596a18.666 18.666 0 01-2.485 5.33" />
                                </svg>
                            </div>
                            Future Job
                        </dt>
                        <dd class="mt-2 text-base leading-7 text-gray-600">
                            Kamu bisa mendapatkan pekerjaan sesuai dengan keahlian yang kamu
                            pelajari selama mentoring di Loka.com
                        </dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>
    <!-- career -->
    <div class="py-10 sm:py-20 md:pt-8 md:pb-28 lg:pb-44">
        <div class="flex flex-col gap-y-20 py-20 md:-mt-10 lg:pt-24">
            <!-- card pricing -->
            <!-- 1st card -->
            <div class="lg:gap flex flex-wrap items-center justify-center gap-7 lg:flex-nowrap lg:gap-14">
                <div class="max-w-xs md:max-w-md lg:max-w-sm">
                    <img class="drop-shadow-xl" src="{{ asset('frontend') }}/assets/images/step1.png" class="w-full"
                        alt="step" />
                </div>
                <div class="px-16 md:px-0">
                    <p class="text-base font-medium text-blue-500">BETTER CAREER</p>
                    <h2 class="my-3 text-2xl font-medium">Prepare The Journey</h2>
                    <p class="text-gray-600 lg:max-w-sm">
                        Belajar dari mana saja, guasah lebay nunggu mood balik dan
                        sebagainya, belajar belajar dan belajar awkwakaw canda sholat
                        nomer 1.
                    </p>
                    <p class="mt-5">
                        <a class="inline-flex items-center justify-center rounded-lg border-2 border-transparent bg-blue-100 px-6 py-2.5 text-sm font-bold text-blue-500 transition-all hover:bg-blue-200 sm:w-auto"
                            href="#learnmore">
                            Learn More
                        </a>
                    </p>
                </div>
            </div>
            <!-- 2nd card -->
            <div class="lg:gap flex flex-wrap items-center justify-center gap-7 lg:flex-nowrap lg:gap-14">
                <div class="max-w-xs md:max-w-md lg:max-w-sm">
                    <img class="drop-shadow-xl" src="{{ asset('frontend') }}/assets/images/step2.png" class="w-full"
                        alt="step" />
                </div>
                <div class="px-16 md:px-44 lg:order-first lg:px-0">
                    <p class="text-base font-medium text-blue-500">STUDY HARDER</p>
                    <h2 class="my-3 text-2xl font-medium">Finish The Project</h2>
                    <p class="text-gray-600 lg:max-w-sm">
                        Kalian masing-masing akan bergabung dengan grup pribadi dan juga
                        bekerja sama dengan anggota tim dalam proyek.
                    </p>
                    <p class="mt-5">
                        <a class="inline-flex items-center justify-center rounded-lg border-2 border-transparent bg-blue-100 px-6 py-2.5 text-sm font-bold text-blue-500 transition-all hover:bg-blue-200 sm:w-auto"
                            href="#learnmore">
                            Learn More
                        </a>
                    </p>
                </div>
            </div>
            <!-- 3rd card -->
            <div class="lg:gap flex flex-wrap items-center justify-center gap-7 lg:flex-nowrap lg:gap-14">
                <div class="max-w-xs md:max-w-md lg:max-w-sm">
                    <img class="drop-shadow-xl" src="{{ asset('frontend') }}/assets/images/step3.png" class="w-full"
                        alt="step" />
                </div>
                <div class="px-16 md:px-44 lg:px-0">
                    <p class="text-base font-medium text-blue-500">END GAME</p>
                    <h2 class="my-3 text-2xl font-medium">Big Demo Day</h2>
                    <p class="text-gray-600 lg:max-w-sm">
                        Pelajari cara berbicara di depan umum untuk mendemonstrasikan
                        proyek akhir Anda dan menerima umpan balik penting.
                    </p>
                    <p class="mt-5">
                        <a class="inline-flex items-center justify-center rounded-lg border-2 border-transparent bg-blue-100 px-6 py-2.5 text-sm font-bold text-blue-500 transition-all hover:bg-blue-200 sm:w-auto"
                            href="#learnmore">
                            Learn More
                        </a>
                    </p>
                </div>
            </div>
            <!-- end card pricing -->
        </div>
    </div>
    <!-- end career -->
    <!-- end benefit -->

    <!-- pricing -->
    <section id="pricing" class="xl:w-12/12 relative mx-auto w-full px-10 lg:px-12 2xl:w-10/12">
        <div
            class="custom-banner absolute right-1/2 -z-10 h-[45rem] w-full translate-x-1/2 rounded-t-xl bg-blue-600 lg:w-[95%]">
        </div>
        <!-- title pricing -->
        <div class="pt-36 text-center">
            <h1 class="mb-4 flex items-center justify-center text-4xl font-extralight text-slate-100">
                Loka.com<span
                    class="mr-2 ml-2 rounded bg-blue-100 px-2.5 py-0.5 text-base font-semibold text-blue-800">PRO</span>
            </h1>

            <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-slate-50 md:text-5xl lg:text-6xl">
                Invest duit lu buat ini aja brader 🫶🏻
            </h1>
            <p class="text-lg font-normal text-slate-200 sm:px-16 lg:text-xl xl:px-48">
                Di Loka.com kita udah menyediakan beberapa paket yang bisa kalian
                pilih - pilih dlu eaaa, harga bersahabat dan juga banefit yang di
                dapat lumayan untuk jangka panjang, jadi tunggu apa lagi ayo gabung
                cok!
            </p>
        </div>
        <div class="-mx-8 flex flex-wrap items-center justify-center gap-10 pt-28 pb-10 md:pt-24 lg:pt-16">
            <!-- card pricing -->
            @foreach ($camps as $item)
                <div class="w-full basis-11/12 rounded-3xl bg-white p-2 shadow md:basis-2/5 lg:basis-2/6">
                    <div class="p-8 sm:p-8">
                        <h5 class="mb-4 text-xl font-medium text-blue-500">
                            {{ $item->title }}
                        </h5>
                        <div class="flex items-baseline text-gray-900">
                            <span class="text-3xl font-semibold">$</span>
                            <span class="text-5xl font-extrabold tracking-tight">{{ $item->price }}</span>
                            <span class="ml-1 text-xl font-normal text-gray-500">/month</span>
                        </div>
                        <p class="mt-4 text-sm text-gray-600 md:text-base">
                            {{ $item->tagline }}
                        </p>
                    </div>
                    <!-- List -->
                    <ul role="list" class="my-4 space-y-5 rounded-2xl bg-gray-50/95 p-8">
                        <li class="flex space-x-3">
                            <!-- icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="25" height="25"
                                style="fill: #3b82f6">
                                <path d="m10 15.586-3.293-3.293-1.414 1.414L10 18.414l9.707-9.707-1.414-1.414z"></path>
                            </svg>
                            <span class="text-base font-normal leading-tight text-gray-500">Apa itu Laravel?</span>
                        </li>
                        <li class="flex space-x-3">
                            <!-- Icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="25" height="25"
                                style="fill: #3b82f6">
                                <path d="m10 15.586-3.293-3.293-1.414 1.414L10 18.414l9.707-9.707-1.414-1.414z"></path>
                            </svg>
                            <span class="text-base font-normal leading-tight text-gray-500">Basic Routing (Blade)</span>
                        </li>
                        <li class="flex space-x-3">
                            <!-- Icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="25" height="25"
                                style="fill: #3b82f6">
                                <path d="m10 15.586-3.293-3.293-1.414 1.414L10 18.414l9.707-9.707-1.414-1.414z"></path>
                            </svg>
                            <span class="text-base font-normal leading-tight text-gray-500">Heyy Controller</span>
                        </li>
                        <li class="flex space-x-3 line-through decoration-gray-500">
                            <!-- Icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                style="fill: #9ca3af">
                                <path
                                    d="m16.192 6.344-4.243 4.242-4.242-4.242-1.414 1.414L10.535 12l-4.242 4.242 1.414 1.414 4.242-4.242 4.243 4.242 1.414-1.414L13.364 12l4.242-4.242z">
                                </path>
                            </svg>
                            <span class="text-base font-normal leading-tight text-gray-500">Database (Builder)</span>
                        </li>
                        <li class="flex space-x-3 line-through decoration-gray-500">
                            <!-- Icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                style="fill: #9ca3af">
                                <path
                                    d="m16.192 6.344-4.243 4.242-4.242-4.242-1.414 1.414L10.535 12l-4.242 4.242 1.414 1.414 4.242-4.242 4.243 4.242 1.414-1.414L13.364 12l4.242-4.242z">
                                </path>
                            </svg>
                            <span class="text-base font-normal leading-tight text-gray-500">API Access</span>
                        </li>
                        <li class="flex space-x-3 line-through decoration-gray-500">
                            <!-- Icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                style="fill: #9ca3af">
                                <path
                                    d="m16.192 6.344-4.243 4.242-4.242-4.242-1.414 1.414L10.535 12l-4.242 4.242 1.414 1.414 4.242-4.242 4.243 4.242 1.414-1.414L13.364 12l4.242-4.242z">
                                </path>
                            </svg>
                            <span class="text-base font-normal leading-tight text-gray-500">Complete documentation</span>
                        </li>
                        <li class="flex space-x-3 line-through decoration-gray-500">
                            <!-- Icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                style="fill: #9ca3af">
                                <path
                                    d="m16.192 6.344-4.243 4.242-4.242-4.242-1.414 1.414L10.535 12l-4.242 4.242 1.414 1.414 4.242-4.242 4.243 4.242 1.414-1.414L13.364 12l4.242-4.242z">
                                </path>
                            </svg>
                            <span class="text-base font-normal leading-tight text-gray-500">24×7 phone & email
                                support</span>
                        </li>
                        <a href="{{ route('checkout.create', $item->slug) }}"
                            class="inline-flex w-full justify-center rounded-lg bg-blue-500 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-600 focus:outline-none focus:ring-4 focus:ring-blue-200">
                            Choose plan
                        </a>
                    </ul>
                </div>
            @endforeach

        </div>
    </section>
    <!-- end pricing -->
    <!-- slider rating -->
    <section class="choose py-16 lg:pb-28 lg:pt-36">
        <div class="container mx-auto">
            <div class="rows-choose">
                <h3 class="text-center text-[1.3rem] font-medium text-gray-900 md:text-2xl lg:text-4xl">
                    Satisfied Customers Are Our Best Ads
                </h3>
                <div class="swiper slider mt-7 w-full md:w-2/3 lg:mt-8 lg:w-10/12">
                    <div class="swiper-wrapper py-6 md:py-10">
                        <div class="swiper-slide rounded-xl border border-slate-50 bg-white p-6 shadow-sm lg:max-w-md">
                            <div class="flex items-center gap-3 border-b-[1px] border-slate-200 pb-4">
                                <div class="w-14 overflow-hidden rounded-full lg:w-11">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="48"
                                        height="48" style="fill: rgba(203, 217, 230, 1)">
                                        <path
                                            d="M12 2C6.579 2 2 6.579 2 12s4.579 10 10 10 10-4.579 10-10S17.421 2 12 2zm0 5c1.727 0 3 1.272 3 3s-1.273 3-3 3c-1.726 0-3-1.272-3-3s1.274-3 3-3zm-5.106 9.772c.897-1.32 2.393-2.2 4.106-2.2h2c1.714 0 3.209.88 4.106 2.2C15.828 18.14 14.015 19 12 19s-3.828-.86-5.106-2.228z">
                                        </path>
                                    </svg>
                                </div>
                                <div class="mr-auto">
                                    <h5 class="text-base font-semibold lg:text-sm">Name 0</h5>
                                    <p class="text-sm text-slate-500 lg:text-xs">Job</p>
                                </div>
                                <div class="flex items-center gap-2">
                                    <!-- <div class="text-orange-button text-2xl lg:text-xl"></div> -->
                                    <i class="bx bxs-star text-2xl text-orange-400 lg:text-lg"></i>
                                    <span class="text-base font-medium text-slate-400 lg:text-sm">
                                        4.5
                                    </span>
                                </div>
                            </div>
                            <p class="mt-4 text-sm text-slate-400 lg:text-xs lg:leading-normal">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                Delectus vero tempora accusamus quaerat quod. Quae, possimus
                                aperiam animi tenetur consectetur officia error corrupti.
                            </p>
                        </div>
                        <div class="swiper-slide rounded-xl border border-slate-50 bg-white p-6 shadow-sm lg:max-w-md">
                            <div class="flex items-center gap-3 border-b-[1px] border-slate-200 pb-4">
                                <div class="w-14 overflow-hidden rounded-full lg:w-11">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="48"
                                        height="48" style="fill: rgba(203, 217, 230, 1)">
                                        <path
                                            d="M12 2C6.579 2 2 6.579 2 12s4.579 10 10 10 10-4.579 10-10S17.421 2 12 2zm0 5c1.727 0 3 1.272 3 3s-1.273 3-3 3c-1.726 0-3-1.272-3-3s1.274-3 3-3zm-5.106 9.772c.897-1.32 2.393-2.2 4.106-2.2h2c1.714 0 3.209.88 4.106 2.2C15.828 18.14 14.015 19 12 19s-3.828-.86-5.106-2.228z">
                                        </path>
                                    </svg>
                                </div>
                                <div class="mr-auto">
                                    <h5 class="text-base font-semibold lg:text-sm">Name 1</h5>
                                    <p class="text-sm text-slate-500 lg:text-xs">Job</p>
                                </div>
                                <div class="flex items-center gap-2">
                                    <!-- <div class="text-orange-button text-2xl lg:text-xl"></div> -->
                                    <i class="bx bxs-star text-2xl text-orange-400 lg:text-lg"></i>
                                    <span class="text-base font-medium text-slate-400 lg:text-sm">
                                        4.5
                                    </span>
                                </div>
                            </div>
                            <p class="mt-4 text-sm text-slate-400 lg:text-xs lg:leading-normal">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                Delectus vero tempora accusamus quaerat quod. Quae, possimus
                                aperiam animi tenetur consectetur officia error corrupti.
                            </p>
                        </div>
                        <div
                            class="swiper-slide shadow5border-slate-50 rounded-xl border border-slate-100 bg-white p-6 lg:max-w-md">
                            <div class="flex items-center gap-3 border-b-[1px] border-slate-200 pb-4">
                                <div class="w-14 overflow-hidden rounded-full lg:w-11">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="48"
                                        height="48" style="fill: rgba(203, 217, 230, 1)">
                                        <path
                                            d="M12 2C6.579 2 2 6.579 2 12s4.579 10 10 10 10-4.579 10-10S17.421 2 12 2zm0 5c1.727 0 3 1.272 3 3s-1.273 3-3 3c-1.726 0-3-1.272-3-3s1.274-3 3-3zm-5.106 9.772c.897-1.32 2.393-2.2 4.106-2.2h2c1.714 0 3.209.88 4.106 2.2C15.828 18.14 14.015 19 12 19s-3.828-.86-5.106-2.228z">
                                        </path>
                                    </svg>
                                </div>
                                <div class="mr-auto">
                                    <h5 class="text-base font-semibold lg:text-sm">Name 2</h5>
                                    <p class="text-sm text-slate-500 lg:text-xs">Job</p>
                                </div>
                                <div class="flex items-center gap-2">
                                    <!-- <div class="text-orange-button text-2xl lg:text-xl"></div> -->
                                    <i class="bx bxs-star text-2xl text-orange-400 lg:text-lg"></i>
                                    <span class="text-base font-medium text-slate-400 lg:text-sm">
                                        4.5
                                    </span>
                                </div>
                            </div>
                            <p class="mt-4 text-sm text-slate-400 lg:text-xs lg:leading-normal">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                Delectus vero tempora accusamus quaerat quod. Quae, possimus
                                aperiam animi tenetur consectetur officia error corrupti.
                            </p>
                        </div>
                    </div>
                    <div class="swiper-pagination z-20 translate-y-3"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- end -->
@endsection
