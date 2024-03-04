@extends('main')

@section('body')
    <section id='hero'>
        <div class="relative isolate px-6 lg:px-8">
            <div class="absolute inset-x-0 -top-40 -z-50 transform-gpu overflow-hidden blur-3xl sm:-top-80"
                aria-hidden="true">
                <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#3d247e] to-[#1d4dd9] opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]"
                    style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
                </div>
            </div>
            {{-- Content --}}
            <div class="mx-auto max-w-2xl pb-16 sm:pb-32 lg:pb-40 pt-14 sm:pt-30 lg:pt-48">

                <div class="hidden sm:mb-8 sm:flex sm:justify-center">
                    @if ($status == 0)
                        <p class="bg-red-600 text-white font-medium rounded-lg text-base px-5 py-2 me-2 mb-4">
                            Kuota Pendaftaran Hampir Habis!
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
                    <div
                        class="relative rounded-full font-medium px-3 py-1 text-sm leading-6 text-gray-600 ring-1 ring-gray-900/10 hover:ring-gray-900/20">
                        Daftar Magang Sekarang!!. <a href="#" class="font-semibold text-blue-600"><span
                                class="absolute inset-0" aria-hidden="true"></span>Read more <span
                                aria-hidden="true">&rarr;</span></a>
                    </div>
                </div>
                <div class="text-center">
                    <h1 class="text-2xl font-bold tracking-tight text-gray-900 sm:text-6xl">Jelajahi Dunia Profesionalisme
                        Bersama Kami </h1>
                    <p class="mt-6 text-lg leading-8 text-gray-600">Apakah Anda siap untuk merajut kisah sukses awal karier
                        Anda? <br>Bergabunglah dengan kami di Dinas Komunikasi, Informatika, Statistik, dan Persandian
                        Semarang </p>
                    <div class="mt-10 flex items-center justify-center gap-x-6">
                        <a href="/pendaftaran"
                            class="rounded-md bg-blue-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">Daftar
                            Sekarang</a>
                        <a href="#" class="text-sm font-semibold leading-6 text-gray-900">Learn more <span
                                aria-hidden="true">→</span></a>
                    </div>
                </div>
            </div>
            <div class="absolute inset-x-0 top-[calc(100%-13rem)] -z-50 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]"
                aria-hidden="true">
                <div class="relative left-[calc(50%+3rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 bg-gradient-to-tr from-[#1d4dd9] to-[#3d247e] opacity-30 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]"
                    style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
                </div>
            </div>
        </div>
    </section>
    <section id='quotes' class="relative isolate overflow-hidden bg-white px-6 py-12 sm:py-16 lg:px-4">
        <div
            class="absolute inset-0 -z-10 bg-[radial-gradient(45rem_50rem_at_top,theme(colors.blue.100),white)] opacity-30">
        </div>
        <div
            class="absolute inset-y-0 right-1/2 -z-10 mr-16 w-[200%] origin-bottom-left skew-x-[-30deg] bg-white shadow-xl shadow-blue-600/10 ring-1 ring-blue-50 sm:mr-28 lg:mr-0 xl:mr-16 xl:origin-center">
        </div>
        <div class="mx-auto max-w-2xl lg:max-w-4xl">
            <img class="mx-auto h-12" src="https://www.its.ac.id/wp-content/uploads/2021/10/logo-kominfo-transparent.png"
                alt="">
            <figure class="mt-10">
                <blockquote class="text-center text-xl font-semibold leading-8 text-gray-900 sm:text-2xl sm:leading-9">
                    <p>"Kelilingi diri Anda dengan orang-orang yang akan mengangkat Anda lebih tinggi."</p>
                </blockquote>
                <figcaption class="mt-10">
                    <img class="mx-auto h-10 w-10 rounded-full"
                        src="https://sisdm.semarangkota.go.id/foto/15237_foto_1699252501.png" alt="">
                    <div class="mt-4 flex items-center justify-center space-x-3 text-base">
                        <div class="font-semibold text-gray-900">Hanry Sugihastomo, S.Sos, MM. </div>
                        <br>
                        <svg viewBox="0 0 2 2" width="3" height="3" aria-hidden="true" class="fill-gray-900">
                            <circle cx="1" cy="1" r="1" />
                        </svg>
                        <div class="text-gray-600">Sub Koordinator Pengembangan SDM Komunitas TIK</div>
                    </div>
                </figcaption>
            </figure>
        </div>
    </section>
    <section id="skill">
        <div class="bg-white py-24 sm:py-32">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="mx-auto max-w-2xl lg:text-center">
                    <h2 class="text-base font-semibold leading-7 text-blue-600">Deploy faster</h2>
                    <p class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Everything you need to
                        deploy your app</p>
                    <p class="mt-6 text-lg leading-8 text-gray-600">Quis tellus eget adipiscing convallis sit sit eget
                        aliquet quis. Suspendisse eget egestas a elementum pulvinar et feugiat blandit at. In mi viverra
                        elit nunc.</p>
                </div>
                <div class="mx-auto mt-16 max-w-2xl sm:mt-20 lg:mt-24 lg:max-w-4xl">
                    <dl class="grid max-w-xl grid-cols-1 gap-x-8 gap-y-10 lg:max-w-none lg:grid-cols-2 lg:gap-y-16">
                        <div class="relative pl-16">
                            <dt class="text-base font-semibold leading-7 text-gray-900">
                                <div
                                    class="absolute left-0 top-0 flex h-10 w-10 items-center justify-center rounded-lg bg-blue-600">
                                    <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                        stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 16.5V9.75m0 0l3 3m-3-3l-3 3M6.75 19.5a4.5 4.5 0 01-1.41-8.775 5.25 5.25 0 0110.233-2.33 3 3 0 013.758 3.848A3.752 3.752 0 0118 19.5H6.75z" />
                                    </svg>
                                </div>
                                Push to deploy
                            </dt>
                            <dd class="mt-2 text-base leading-7 text-gray-600">Morbi viverra dui mi arcu sed. Tellus semper
                                adipiscing suspendisse semper morbi. Odio urna massa nunc massa.</dd>
                        </div>
                        <div class="relative pl-16">
                            <dt class="text-base font-semibold leading-7 text-gray-900">
                                <div
                                    class="absolute left-0 top-0 flex h-10 w-10 items-center justify-center rounded-lg bg-blue-600">
                                    <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                        stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                                    </svg>
                                </div>
                                SSL certificates
                            </dt>
                            <dd class="mt-2 text-base leading-7 text-gray-600">Sit quis amet rutrum tellus ullamcorper
                                ultricies libero dolor eget. Sem sodales gravida quam turpis enim lacus amet.</dd>
                        </div>
                        <div class="relative pl-16">
                            <dt class="text-base font-semibold leading-7 text-gray-900">
                                <div
                                    class="absolute left-0 top-0 flex h-10 w-10 items-center justify-center rounded-lg bg-blue-600">
                                    <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                        stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                                    </svg>
                                </div>
                                Simple queues
                            </dt>
                            <dd class="mt-2 text-base leading-7 text-gray-600">Quisque est vel vulputate cursus. Risus proin
                                diam nunc commodo. Lobortis auctor congue commodo diam neque.</dd>
                        </div>
                        <div class="relative pl-16">
                            <dt class="text-base font-semibold leading-7 text-gray-900">
                                <div
                                    class="absolute left-0 top-0 flex h-10 w-10 items-center justify-center rounded-lg bg-blue-600">
                                    <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M7.864 4.243A7.5 7.5 0 0119.5 10.5c0 2.92-.556 5.709-1.568 8.268M5.742 6.364A7.465 7.465 0 004.5 10.5a7.464 7.464 0 01-1.15 3.993m1.989 3.559A11.209 11.209 0 008.25 10.5a3.75 3.75 0 117.5 0c0 .527-.021 1.049-.064 1.565M12 10.5a14.94 14.94 0 01-3.6 9.75m6.633-4.596a18.666 18.666 0 01-2.485 5.33" />
                                    </svg>
                                </div>
                                Advanced security
                            </dt>
                            <dd class="mt-2 text-base leading-7 text-gray-600">Arcu egestas dolor vel iaculis in ipsum
                                mauris. Tincidunt mattis aliquet hac quis. Id hac maecenas ac donec pharetra eget.</dd>
                        </div>
                    </dl>
                </div>
            </div>
        </div>
    </section>
    <section id="divisi">
        <div class="grid grid-cols-2 gap-3 mb-4">
            <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
                <p class="text-2xl text-gray-400 dark:text-gray-500">
                    <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 18 18">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 1v16M1 9h16" />
                    </svg>
                </p>
            </div>
            <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
                <p class="text-2xl text-gray-400 dark:text-gray-500">
                    <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 18 18">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 1v16M1 9h16" />
                    </svg>
                </p>
            </div>
            <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
                <p class="text-2xl text-gray-400 dark:text-gray-500">
                    <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 18 18">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 1v16M1 9h16" />
                    </svg>
                </p>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-3 mb-4">
            <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
                <p class="text-2xl text-gray-400 dark:text-gray-500">
                    <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 18 18">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 1v16M1 9h16" />
                    </svg>
                </p>
            </div>
            <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
                <p class="text-2xl text-gray-400 dark:text-gray-500">
                    <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 18 18">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 1v16M1 9h16" />
                    </svg>
                </p>
            </div>
        </div>
    </section>
    <section
        class="bg-center bg-cover bg-no-repeat bg-[url('https://i.ytimg.com/vi/HQRrZXaqhVE/maxresdefault.jpg')] bg-gray-700 bg-blend-multiply">
        <div class="px-4 mx-auto max-w-screen-xl text-center py-24 lg:py-48">
            <div class="justify-center flex items-center">
                @if ($status == 0)
                    <p class="bg-red-600 text-white font-medium rounded-lg text-base px-5 py-2 me-2 mb-4">
                        Kuota Pendaftaran Hampir Habis!
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
