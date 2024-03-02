@extends('main')

@section('body')
    <section>
        <div class="overflow-y-auto flex min-h-[40rem] h-auto dark:bg-gray-900">
            <div class="container px-6 pb-6 mx-auto">
                <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                    Pendaftaran
                </h2>
                <div class="flex flex-row space-x-">
                    <div class="basis-1/4 pr-8">{{-- Stepper --}}
                        @include('components.stepper')
                    </div>
                    <div class="basis-3/4"> {{-- Form --}}
                        <!-- General elements -->
                        <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
                            Cek Status
                        </h4>
                        @if (!$diterima->isEmpty())
                            <div id="alert-additional-content-3"
                                class="p-4 mb-4 text-white border border-green-300 rounded-lg bg-green-500 dark:bg-gray-800 dark:text-green-400 dark:border-green-800"
                                role="alert">
                                <img class="mb-4 object-cover rounded-md w-full max-h-[16rem]"
                                    src=" {{ asset('storage/' . $pengumuman->image) }}" alt="">
                                <div class="flex items-center">
                                    <span class="sr-only">Info</span>
                                    <h3 class="text-xl font-bold">{{ $pengumuman->title }}</h3>
                                </div>
                                <div class="mt-2 mb-4 text-sm">
                                    Silahkan kontak nomor untuk konfirmasi lebih lanjut <p class="font-semibold">
                                        {{ $pengumuman->no_telp }}
                                        ({{ $pengumuman->nama_kontak }})</p>
                                    Atau kunjungi Kantor Dinas Komunikasi, Informatika, Statistik dan Persandian Kota
                                    Semarang
                                </div>
                                <div class="flex">
                                    <a href="http://{{ $pengumuman->link }}">
                                        <button type="button"
                                            class="text-green-800 bg-white hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-3 py-1.5 me-2 text-center inline-flex items-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                            <svg class="me-2 h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="currentColor" viewBox="0 0 24 24">
                                                <path fill-rule="evenodd"
                                                    d="M3 6c0-1.1.9-2 2-2h14a2 2 0 0 1 2 2v9a2 2 0 0 1-2 1.9h-6.6l-2.9 2.7c-1 .9-2.5.2-2.5-1v-1.7H5a2 2 0 0 1-2-2V6Zm5.7 3.8a1 1 0 1 0-1.4 1.4 1 1 0 1 0 1.4-1.4Zm2.6 0a1 1 0 1 1 0 1.4 1 1 0 0 1 0-1.4Zm5.4 0a1 1 0 1 0-1.4 1.4 1 1 0 1 0 1.4-1.4Z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            WhatsApp
                                        </button>
                                    </a>
                                    {{--                              
                                <a href="">
                                    <button type="button"
                                        class="text-green-800 bg-transparent border border-green-800 hover:bg-green-900 hover:text-white focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-xs px-3 py-1.5 text-center dark:hover:bg-green-600 dark:border-green-600 dark:text-green-400 dark:hover:text-white dark:focus:ring-green-800"
                                        data-dismiss-target="#alert-additional-content-3" aria-label="Close">
                                        Dismiss
                                    </button>
                                </a> --}}
                                </div>
                            </div>
                        @endif

                        @if (!$ditolak->isEmpty())
                            <div id="alert-additional-content-3"
                                class="p-4 mb-4 text-white border border-green-300 rounded-lg bg-green-500 dark:bg-gray-800 dark:text-green-400 dark:border-green-800"
                                role="alert">
                                <img class="mb-4 object-cover rounded-md w-full max-h-[16rem]"
                                    src="https://i.pinimg.com/originals/39/87/be/3987beb4289cf7a45b94e2e2a73aaeb9.jpg"
                                    alt="">
                                <div class="flex items-center">
                                    <span class="sr-only">Info</span>
                                    <h3 class="text-xl font-bold">Selamat anda ditolak!</h3>
                                </div>
                                <div class="mt-2 mb-4 text-sm">
                                    Silahkan kontak nomor untuk konfirmasi lebih lanjut <p class="font-semibold">
                                        0821-6999-2772
                                        (Hanry Sugihastomo)</p>
                                    Atau kunjungi Kantor Dinas Komunikasi, Informatika, Statistik dan Persandian Kota
                                    Semarang
                                </div>
                                <div class="flex">
                                    <a href="">
                                        <button type="button"
                                            class="text-green-800 bg-white hover:bg-green-900 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-xs px-3 py-1.5 me-2 text-center inline-flex items-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                            <svg class="me-2 h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="currentColor" viewBox="0 0 20 14">
                                                <path
                                                    d="M10 0C4.612 0 0 5.336 0 7c0 1.742 3.546 7 10 7 6.454 0 10-5.258 10-7 0-1.664-4.612-7-10-7Zm0 10a3 3 0 1 1 0-6 3 3 0 0 1 0 6Z" />
                                            </svg>
                                            WhatsApp
                                        </button>
                                    </a>
                                    {{--                              
                            <a href="">
                                <button type="button"
                                    class="text-green-800 bg-transparent border border-green-800 hover:bg-green-900 hover:text-white focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-xs px-3 py-1.5 text-center dark:hover:bg-green-600 dark:border-green-600 dark:text-green-400 dark:hover:text-white dark:focus:ring-green-800"
                                    data-dismiss-target="#alert-additional-content-3" aria-label="Close">
                                    Dismiss
                                </button>
                            </a> --}}
                                </div>
                            </div>
                        @endif

                        <div class=" justify-between px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                            <ol
                                class="relative text-gray-500 ml-4 mt-4 mb-4 mr-4 border-s border-gray-200 dark:border-gray-700 dark:text-gray-400">
                                @foreach ($riwayatPendaftaran as $riwayat)
                                    <li class="mb-10 ms-6">
                                        @if ($riwayat->status_pendaftaran != 'Verifikasi Gagal')
                                            <span
                                                class="absolute flex items-center justify-center w-8 h-8 bg-green-200 rounded-full -start-4 ring-4 ring-white dark:ring-gray-900 dark:bg-green-900">
                                                <svg class="w-3.5 h-3.5 text-green-500 dark:text-green-400"
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 16 12">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="M1 5.917 5.724 10.5 15 1.5" />
                                                </svg>
                                            @else
                                                <span
                                                    class="absolute flex items-center justify-center w-8 h-8 bg-red-200 rounded-full -start-4 ring-4 ring-white dark:ring-gray-900 dark:bg-red-900">
                                                    <svg class="w-3.5 h-3.5  text-red-800 dark:text-red-400"
                                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                    </svg>
                                        @endif
                                        </span>
                                        <h3 class="text-gray-700 font-semibold leading-tight">
                                            {{ $riwayat->status_pendaftaran }}</h3>
                                        <p class="text-sm"> {{ $riwayat->created_at->format('d/m/Y - H:i') }}
                                        <p class="text-sm"> {{ $riwayat->catatan }}
                                        </p>
                                    </li>
                                @endforeach
                                <li class="mb-10 ms-6">
                                    @if ($lastRiwayatPendaftaran->status_pendaftaran != 'Verifikasi Gagal')
                                        @if ($lastRiwayatPendaftaran->status_pendaftaran != 'Diterima')
                                            <span
                                                class="absolute flex items-center justify-center w-8 h-8 bg-gray-100 rounded-full -start-4 ring-4 ring-white dark:ring-gray-900 dark:bg-gray-700">
                                                <svg class="w-3.5 h-3.5 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                    viewBox="0 0 20 16">
                                                    <path
                                                        d="M16 1h-3.278A1.992 1.992 0 0 0 11 0H7a1.993 1.993 0 0 0-1.722 1H2a2 2 0 0 0-2 2v15a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2Zm-3 14H5a1 1 0 0 1 0-2h8a1 1 0 0 1 0 2Zm0-4H5a1 1 0 0 1 0-2h8a1 1 0 1 1 0 2Zm0-5H5a1 1 0 0 1 0-2h2V2h4v2h2a1 1 0 1 1 0 2Z" />

                                                </svg>
                                            </span>
                                        @else
                                            <span
                                                class="absolute flex items-center justify-center w-8 h-8 bg-green-200 rounded-full -start-4 ring-4 ring-white dark:ring-gray-900 dark:bg-green-900">
                                                <svg class="w-3.5 h-3.5 text-green-500 dark:text-green-400"
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 16 12">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="M1 5.917 5.724 10.5 15 1.5" />
                                                </svg>
                                            </span>
                                        @endif
                                    @else
                                        <span
                                            class="absolute flex items-center justify-center w-8 h-8 bg-red-200 rounded-full -start-4 ring-4 ring-white dark:ring-gray-900 dark:bg-red-900">
                                            <svg class="w-3.5 h-3.5  text-red-800 dark:text-red-400" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                            </svg>
                                        </span>
                                    @endif


                                    <h3 class="text-gray-700 font-semibold leading-tight">
                                        {{ $lastRiwayatPendaftaran->status_pendaftaran }}
                                    </h3>
                                    <p class="text-sm"> {{ $lastRiwayatPendaftaran->created_at->format('d/m/Y - H:i') }}
                                    </p>
                                    <p class="text-sm"> {{ $lastRiwayatPendaftaran->catatan }} </p>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
