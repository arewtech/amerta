@extends('layouts.success')
@section('content')
    <!-- section hero content -->
    <div class='container w-full mt-10 flex justify-center px-10 pb-14'>
        <div class='lg:w-4/6 md:w-[55%] w-full'>
            @if (session('finished'))
                <!-- alert -->
                <div x-data="{ open: true }" :class="{ 'hidden': !open }"
                    class="bg-green-100 mb-4 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                    role="alert">
                    <strong class="font-bold">{{ auth()->user()->name }},</strong>
                    <span class="block sm:inline">{{ session('finished') }}</span>
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
            <div
                class="w-full p-4 bg-white/60 hover:bg-white/90 transition ease-in-out duration-200 border border-gray-200 rounded-lg sm:p-6 md:p-8">
                <h5 class="text-xl font-medium text-gray-900">Timeline Kegiatan</h5>
                <p class="text-sm mt-1 mb-5 text-gray-500">Timeline kegiatan bootcamp yang sudah pernah diikuti selama
                    ini.</p>
                <ol class="relative border-l border-gray-200">
                    @forelse ($camps as $item)
                        <li class="mb-10 ml-4">
                            <div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -left-1.5 border border-white">
                            </div>
                            <time
                                class="mb-1 text-sm font-normal leading-none text-gray-400">{{ $item->created_at->format('D, Y-m') }}</time>
                            <h3 class="text-lg font-semibold text-gray-900">{{ $item->camp->title }}
                                <span class='bg-green-500  text-slate-50 px-2.5 text-xs py-1 rounded-xl'>
                                    finished
                                </span>
                            </h3>
                            <p class="mb-4 text-base font-normal text-gray-500">
                                {{ $item->camp->tagline }}</p>
                            <a href="{{ route('preview') }}"
                                class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:outline-none focus:ring-gray-200 focus:text-blue-700">
                                Detail <svg class="w-3 h-3 ml-2" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg></a>
                        </li>
                    @empty
                        <li class="mb-10 ml-4">
                            <div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -left-1.5 border border-white">
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
    <!-- end hero section -->
@endsection
