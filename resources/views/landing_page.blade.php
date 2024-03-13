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

                <div class="hidden sm:flex sm:justify-center">
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
                    {{-- <div
                        class="relative rounded-full font-medium px-3 py-1 text-sm leading-6 text-gray-600 ring-1 ring-gray-900/10 hover:ring-gray-900/20">
                        Daftar Magang Sekarang!!. <a href="#" class="font-semibold text-blue-600"><span
                                class="absolute inset-0" aria-hidden="true"></span>Read more <span
                                aria-hidden="true">&rarr;</span></a>
                    </div> --}}
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
        <div class="bg-white py-16 sm:py-20">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="mx-auto max-w-2xl lg:text-center">
                    <h2 class="text-base font-semibold leading-7 text-blue-600">Manfaat Magang</h2>
                    <p class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Bangun Karirmu Melalui
                        Magang!</p>
                    <p class="mt-6 text-lg leading-8 text-gray-600">Magang adalah kunci yang tepat untuk membuka
                        peluang-peluang baru! Bersiaplah untuk mengeksplorasi dunia pekerjaan melalui pengalaman praktis
                        yang tak tertandingi
                        .</p>
                </div>
                <div class="mx-auto mt-16 max-w-2xl sm:mt-20 lg:mt-24 lg:max-w-4xl">
                    <dl class="grid max-w-xl grid-cols-1 gap-x-8 gap-y-10 lg:max-w-none lg:grid-cols-2 lg:gap-y-16">
                        <div class="relative pl-16">
                            <dt class="text-base font-semibold leading-7 text-gray-900">
                                <div
                                    class="absolute left-0 top-0 flex h-10 w-10 items-center justify-center rounded-lg bg-blue-600">
                                    <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 0 0 .75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 0 0-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0 1 12 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 0 1-.673-.38m0 0A2.18 2.18 0 0 1 3 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 0 1 3.413-.387m7.5 0V5.25A2.25 2.25 0 0 0 13.5 3h-3a2.25 2.25 0 0 0-2.25 2.25v.894m7.5 0a48.667 48.667 0 0 0-7.5 0M12 12.75h.008v.008H12v-.008Z" />
                                    </svg>

                                </div>
                                Pengalaman Kerja
                            </dt>
                            <dd class="mt-2 text-base leading-7 text-gray-600">Dengan melakukan magang, kalian bisa
                                mempraktekan cara-cara atau pelajaran yang pernah kalian dapatkan saat perkuliahan.
                            </dd>
                        </div>
                        <div class="relative pl-16">
                            <dt class="text-base font-semibold leading-7 text-gray-900">
                                <div
                                    class="absolute left-0 top-0 flex h-10 w-10 items-center justify-center rounded-lg bg-blue-600">
                                    <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.25 18 9 11.25l4.306 4.306a11.95 11.95 0 0 1 5.814-5.518l2.74-1.22m0 0-5.94-2.281m5.94 2.28-2.28 5.941" />
                                    </svg>
                                </div>
                                Meningkatkan Keterampilan
                            </dt>
                            <dd class="mt-2 text-base leading-7 text-gray-600">Kalian bisa mendapatkan
                                pengetahuan-pengetahuan terkait bidang studi yang digeluti atau pengetahuan baru di dunia
                                kerja.</dd>
                        </div>
                        <div class="relative pl-16">
                            <dt class="text-base font-semibold leading-7 text-gray-900">
                                <div
                                    class="absolute left-0 top-0 flex h-10 w-10 items-center justify-center rounded-lg bg-blue-600">
                                    <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12.75 3.03v.568c0 .334.148.65.405.864l1.068.89c.442.369.535 1.01.216 1.49l-.51.766a2.25 2.25 0 0 1-1.161.886l-.143.048a1.107 1.107 0 0 0-.57 1.664c.369.555.169 1.307-.427 1.605L9 13.125l.423 1.059a.956.956 0 0 1-1.652.928l-.679-.906a1.125 1.125 0 0 0-1.906.172L4.5 15.75l-.612.153M12.75 3.031a9 9 0 0 0-8.862 12.872M12.75 3.031a9 9 0 0 1 6.69 14.036m0 0-.177-.529A2.25 2.25 0 0 0 17.128 15H16.5l-.324-.324a1.453 1.453 0 0 0-2.328.377l-.036.073a1.586 1.586 0 0 1-.982.816l-.99.282c-.55.157-.894.702-.8 1.267l.073.438c.08.474.49.821.97.821.846 0 1.598.542 1.865 1.345l.215.643m5.276-3.67a9.012 9.012 0 0 1-5.276 3.67m0 0a9 9 0 0 1-10.275-4.835M15.75 9c0 .896-.393 1.7-1.016 2.25" />
                                    </svg>
                                </div>
                                Membangun Relasi (Networking)
                            </dt>
                            <dd class="mt-2 text-base leading-7 text-gray-600">Kalian bisa mengenal orang-orang yang memang
                                ahli di bidangnya dan menjadikan itu sebagai modal relasi.</dd>
                        </div>
                        <div class="relative pl-16">
                            <dt class="text-base font-semibold leading-7 text-gray-900">
                                <div
                                    class="absolute left-0 top-0 flex h-10 w-10 items-center justify-center rounded-lg bg-blue-600">
                                    <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                                    </svg>

                                </div>
                                Melatih Kepercayaan Diri
                            </dt>
                            <dd class="mt-2 text-base leading-7 text-gray-600">Dengan melakukan magang, kalian secara tidak
                                langsung melatih kepercayaan diri yang kalian miliki.</dd>
                        </div>
                    </dl>
                </div>
            </div>
        </div>
    </section>
    <section class="text-gray-600 ">
        <div class="container px-56 py-20 mx-auto">
            <div class="mx-auto max-w-2xl lg:text-center">
                <h2 class="text-base font-semibold leading-7 text-blue-600">Bidang Magang</h2>
                <p class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Pilih Bidang Magang yang
                    Sesuai!</p>
                <p class="mt-6 text-lg leading-8 text-gray-600">Magang adalah kunci yang tepat untuk membuka
                    peluang-peluang baru! Bersiaplah untuk mengeksplorasi dunia pekerjaan melalui pengalaman praktis
                    yang tak tertandingi
                    .</p>
            </div>
            <div class="mt-8 flex flex-wrap -m-4">
                <div class="xl:w-1/3 md:w-1/2 p-4">
                    <div class="border border-gray-200 p-6 rounded-lg">
                        <div
                            class="w-10 h-10 inline-flex items-center justify-center rounded-full bg-blue-100 text-blue-500 mb-4">
                            <svg fill="none" fill="currentColor" class="w-6 h-6" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" fill="currentColor"
                                    d="M4 3a1 1 0 0 0-1 1v8c0 .6.4 1 1 1h1v2a1 1 0 0 0 1.7.7L9.4 13H15c.6 0 1-.4 1-1V4c0-.6-.4-1-1-1H4Z"
                                    clip-rule="evenodd" />
                                <path fill-rule="evenodd" fill="currentColor"
                                    d="M8 17.2h.1l2.1-2.2H15a3 3 0 0 0 3-3V8h2c.6 0 1 .4 1 1v8c0 .6-.4 1-1 1h-1v2a1 1 0 0 1-1.7.7L14.6 18H9a1 1 0 0 1-1-.8Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <h2 class="text-lg text-gray-900 font-medium title-font mb-2">Bidang Komunikasi</h2>
                        <p class="leading-relaxed text-base">Hubungan masyarakat dan aspirasi publik.</p>
                    </div>
                </div>
                <div class="xl:w-1/3 md:w-1/2 p-4">
                    <div class="border border-gray-200 p-6 rounded-lg">
                        <div
                            class="w-10 h-10 inline-flex items-center justify-center rounded-full bg-blue-100 text-blue-500 mb-4">
                            <svg fill="none" class="w-6 h-6" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" fill="currentColor"
                                    d="M3 4a1 1 0 0 0-1 1v14c0 .6.4 1 1 1h18c.6 0 1-.4 1-1V5c0-.6-.4-1-1-1H3Zm4.3 5.7a1 1 0 0 1 1.4-1.4l3 3c.4.4.4 1 0 1.4l-3 3a1 1 0 0 1-1.4-1.4L9.6 12 7.3 9.7ZM13 14a1 1 0 1 0 0 2h3a1 1 0 1 0 0-2h-3Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <h2 class="text-lg text-gray-900 font-medium title-font mb-2">Bidang Informatika</h2>
                        <p class="leading-relaxed text-base">Pembuatan website atau aplikasi mobile.</p>
                    </div>
                </div>
                <div class="xl:w-1/3 md:w-1/2 p-4">
                    <div class="border border-gray-200 p-6 rounded-lg">
                        <div
                            class="w-10 h-10 inline-flex items-center justify-center rounded-full bg-blue-100 text-blue-500 mb-4">
                            <svg fill="none" class="w-6 h-6" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" fill="currentColor"
                                    d="M14 7a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v10c0 1.1.9 2 2 2h8a2 2 0 0 0 2-2V7Zm2 9.4 4.7 1.5A1 1 0 0 0 22 17V7a1 1 0 0 0-1.3-1L16 7.7v8.8Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <h2 class="text-lg text-gray-900 font-medium title-font mb-2">Bidang Media</h2>
                        <p class="leading-relaxed text-base">Pengelolaan media sosial dan pembuatan konten.</p>
                    </div>
                </div>
                <div class="xl:w-1/3 md:w-1/2 p-4">
                    <div class="border border-gray-200 p-6 rounded-lg">
                        <div
                            class="w-10 h-10 inline-flex items-center justify-center rounded-full bg-blue-100 text-blue-500 mb-4">
                            <svg fill="none" class="w-6 h-6" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" fill="currentColor"
                                    d="M8 3c0-.6.4-1 1-1h6c.6 0 1 .4 1 1h2a2 2 0 0 1 2 2v15a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V5c0-1.1.9-2 2-2h2Zm6 1h-4v2H9a1 1 0 0 0 0 2h6a1 1 0 1 0 0-2h-1V4Zm-3 8c0-.6.4-1 1-1h3a1 1 0 1 1 0 2h-3a1 1 0 0 1-1-1Zm-2-1a1 1 0 1 0 0 2 1 1 0 1 0 0-2Zm2 5c0-.6.4-1 1-1h3a1 1 0 1 1 0 2h-3a1 1 0 0 1-1-1Zm-2-1a1 1 0 1 0 0 2 1 1 0 1 0 0-2Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <h2 class="text-lg text-gray-900 font-medium title-font mb-2">Bidang Infrastruktur</h2>
                        <p class="leading-relaxed text-base">Mengelola infrastruktur internet dan intranet.</p>
                    </div>
                </div>
                <div class="xl:w-1/3 md:w-1/2 p-4">
                    <div class="border border-gray-200 p-6 rounded-lg">
                        <div
                            class="w-10 h-10 inline-flex items-center justify-center rounded-full bg-blue-100 text-blue-500 mb-4">
                            <svg fill="none" class="w-6 h-6" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M4 4.5V19c0 .6.4 1 1 1h15M7 14l4-4 4 4 5-5m0 0h-3.2M20 9v3.2" />
                            </svg>
                        </div>
                        <h2 class="text-lg text-gray-900 font-medium title-font mb-2">Bidang Statistik</h2>
                        <p class="leading-relaxed text-base">Analisis terhadap data-data statistik.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="panduan" class="bg-white text-gray-600 body-font">
        <div class="px-40 py-20">
            <div class="mb-8 mx-auto max-w-2xl lg:text-center">
                <h2 class="text-base font-semibold leading-7 text-blue-600">Panduan</h2>
                <p class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Tertarik Magang? Ini Stepnya!
                </p>
                <p class="mt-6 text-lg leading-8 text-gray-600">Simple kok!</p>
            </div>
            <div class="container pb-24 mx-auto flex flex-wrap">
                <div class="lg:w-1/2 w-full mb-10 lg:mb-0 rounded-lg overflow-hidden">
                    <img alt="feature" class="object-cover object-center h-full w-full"
                        src="https://images.unsplash.com/photo-1552664730-d307ca884978?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D">
                </div>
                <div class="flex flex-col flex-wrap lg:py-6 -mb-10 lg:w-1/2 lg:pl-12 lg:text-left text-center">
                    <div class="flex flex-col mb-10 lg:items-start items-center">
                        <div
                            class="w-12 h-12 inline-flex items-center justify-center rounded-full bg-blue-100 text-blue-500 mb-5">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" class="w-6 h-6" viewBox="0 0 24 24">
                                <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                            </svg>
                        </div>
                        <div class="flex-grow">
                            <h2 class="text-gray-900 text-lg title-font font-medium mb-3">Pendaftaran</h2>
                            <p class="leading-relaxed text-base">Lakukan pendaftaran sebagai langkah pertama.</p>
                            <a href="/pendaftaran"class="mt-3 text-blue-500 inline-flex items-center">Mulai Daftar
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="flex flex-col mb-10 lg:items-start items-center">
                        <div
                            class="w-12 h-12 inline-flex items-center justify-center rounded-full bg-blue-100 text-blue-500 mb-5">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" class="w-6 h-6" viewBox="0 0 24 24">
                                <circle cx="6" cy="6" r="3"></circle>
                                <circle cx="6" cy="18" r="3"></circle>
                                <path d="M20 4L8.12 15.88M14.47 14.48L20 20M8.12 8.12L12 12"></path>
                            </svg>
                        </div>
                        <div class="flex-grow">
                            <h2 class="text-gray-900 text-lg title-font font-medium mb-3">Seleksi</h2>
                            <p class="leading-relaxed text-base">Cek status pendaftaran dan tunggu email dari kami.</p>
                        </div>
                    </div>
                    <div class="flex flex-col mb-10 lg:items-start items-center">
                        <div
                            class="w-12 h-12 inline-flex items-center justify-center rounded-full bg-blue-100 text-blue-500 mb-5">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" class="w-6 h-6" viewBox="0 0 24 24">
                                <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                        </div>
                        <div class="flex-grow">
                            <h2 class="text-gray-900 text-lg title-font font-medium mb-3">Mulai Magang</h2>
                            <p class="leading-relaxed text-base">Selamat datang di dunia kerja! Kami antusias untuk
                                berkolaborasi dengan anda.</p>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
        </div>
    </section>
@endsection
