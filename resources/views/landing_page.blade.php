@extends('main')

@section('body')
    <section
        class="bg-center bg-cover bg-no-repeat bg-[url('https://i.ytimg.com/vi/HQRrZXaqhVE/maxresdefault.jpg')] bg-gray-700 bg-blend-multiply">
        <div class="px-4 mx-auto max-w-screen-xl text-center py-24 lg:py-48">
            <div class="justify-center flex items-center">
                @if ($status == 0)
                    <p class="bg-red-600 text-white font-medium rounded-lg text-base px-5 py-2 me-2 mb-4">
                        Kuota Pendaftaran Habis!
                    </p>
                @elseif($status == 1)
                    <p class="bg-green-500 text-white font-medium rounded-lg text-base px-5 py-2 me-2 mb-4">
                        Pendaftaran Dibuka!
                        <br>
                        Tutup: {{ date('d/m/Y - H:i ', strtotime($tutup)) }}
                    </p>
                @elseif($status == 4)
                    <p class="bg-red-600 text-white font-medium rounded-lg text-base px-5 py-2 me-2 mb-4">
                        Pendaftaran Hampir Tutup!
                        <br>
                        Tutup: {{ date('d/m/Y - H:i ', strtotime($tutup)) }}
                    </p>
                @else
                    <p class="bg-red-600 text-white font-medium rounded-lg text-base px-5 py-2 me-2 mb-4">
                        Pendaftaran Ditutup!
                        <br>
                        Tutup: {{ date('d/m/Y - H:i ', strtotime($tutup)) }}
                    </p>
                @endif
            </div>
            @auth
                <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-white md:text-5xl lg:text-6xl">Welcome
                    Back {{ auth()->user()->name }}</h1>
            @else
                <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-white md:text-5xl lg:text-6xl">We
                    invest in the world’s potential </h1>
            @endauth
            <p class="mb-8 text-lg font-normal text-gray-300 lg:text-xl sm:px-16 lg:px-48">Here at Flowbite we focus on
                markets where technology, innovation, and capital can unlock long-term value and drive economic growth.</p>
            <div class="flex flex-col space-x-4 sm:flex-row sm:justify-center sm:space-y-0">
                <a href="/login"
                    class="inline-flex justify-center hover:text-gray-900 items-center py-3 px-5 sm:ms-4 text-base font-medium text-center text-white rounded-lg border border-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-400">
                    Log In
                </a>
                <a href="/register"
                    class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                    Register
                    <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </a>
            </div>
        </div>
    </section>
@endsection
