@extends('main')

@section('body')
<section class="mt-16 bg-white">
    <div class=" overflow-y-auto flex h-full dark:bg-gray-900">
            <div class="min-h-[32rem] max-w-5xl container px-6 pb-6 mx-auto">
                <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                    Pendaftaran
                </h2>
                <div class="flex flex-row space-x-">
                    <div class="basis-1/4 pr-8">{{-- Stepper --}}
                        @include('components.stepper')
                    </div>
                    <div class="basis-3/4"> {{-- Form --}}
                        <!-- General elements -->
                        <div class="flex items-center mb-4">
                            <button type="button"
                                class="px-2 py-2 text-white bg-gray-600 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm me-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700 flex-shrink-0"
                                onclick="goBack()">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 14 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4" />
                                </svg>
                            </button>
                            <h4 class="text-lg font-semibold text-gray-600 dark:text-gray-300 flex-shrink-0">
                                Pilih Bidang
                            </h4>
                        </div>
                        <script>
                            function goBack() {
                                window.history.back();
                            }
                        </script>
                        <div class=" justify-between px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                            <h4 class="mb-4 text-md font-semibold text-gray-600 dark:text-gray-300 flex-shrink-0">
                                Pilih salah satu: <span class="text-red-500">*</span>
                            </h4>
                            <form action="/pendaftaran/pilih-bidang" method="POST">
                                @csrf
                                <ul class="grid w-full gap-6 md:grid-cols-3">
                                    <li>
                                        <input type="radio" id="komunikasi" name="bidang" value="1"
                                            class="hidden peer" required>
                                        <label for="komunikasi"
                                            class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                            <div class="block">
                                                <svg class="w-8 h-8 mb-2" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path fill-rule="evenodd"
                                                        d="M4 3a1 1 0 0 0-1 1v8c0 .6.4 1 1 1h1v2a1 1 0 0 0 1.7.7L9.4 13H15c.6 0 1-.4 1-1V4c0-.6-.4-1-1-1H4Z"
                                                        clip-rule="evenodd" />
                                                    <path fill-rule="evenodd"
                                                        d="M8 17.2h.1l2.1-2.2H15a3 3 0 0 0 3-3V8h2c.6 0 1 .4 1 1v8c0 .6-.4 1-1 1h-1v2a1 1 0 0 1-1.7.7L14.6 18H9a1 1 0 0 1-1-.8Z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                                <div class="w-full text-lg font-semibold">Bidang Komunikasi</div>
                                                <div class="w-full text-sm">Hubungan masyarakat dan aspirasi publik.</div>
                                            </div>

                                        </label>

                                    </li>
                                    <li>
                                        <input type="radio" id="informatika" name="bidang" value="2"
                                            class="hidden peer">
                                        <label for="informatika"
                                            class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                            <div class="block">
                                                <svg class="w-8 h-8 mb-2" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path fill-rule="evenodd"
                                                        d="M3 4a1 1 0 0 0-1 1v14c0 .6.4 1 1 1h18c.6 0 1-.4 1-1V5c0-.6-.4-1-1-1H3Zm4.3 5.7a1 1 0 0 1 1.4-1.4l3 3c.4.4.4 1 0 1.4l-3 3a1 1 0 0 1-1.4-1.4L9.6 12 7.3 9.7ZM13 14a1 1 0 1 0 0 2h3a1 1 0 1 0 0-2h-3Z"
                                                        clip-rule="evenodd" />
                                                </svg>

                                                <div class="w-full text-lg font-semibold">Bidang Informatika</div>
                                                <div class="w-full text-sm">Pembuatan website atau aplikasi mobile.</div>
                                            </div>
                                        </label>

                                    </li>
                                    <li>
                                        <input type="radio" id="media" name="bidang" value="3"
                                            class="hidden peer" required>
                                        <label for="media"
                                            class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                            <div class="block">
                                                <svg class="w-8 h-8 mb-2" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path fill-rule="evenodd"
                                                        d="M14 7a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v10c0 1.1.9 2 2 2h8a2 2 0 0 0 2-2V7Zm2 9.4 4.7 1.5A1 1 0 0 0 22 17V7a1 1 0 0 0-1.3-1L16 7.7v8.8Z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                                <div class="w-full text-lg font-semibold">Bidang Media</div>
                                                <div class="w-full text-sm">Pengelolaan media sosial dan pembuatan konten.
                                                </div>
                                            </div>
                                        </label>
                                    </li>
                                    <li>
                                        <input type="radio" id="infrastruktur" name="bidang" value="4"
                                            class="hidden peer">
                                        <label for="infrastruktur"
                                            class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">

                                            <div class="block">
                                                <svg class="w-8 h-8 mb-2" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path fill-rule="evenodd"
                                                        d="M8 3c0-.6.4-1 1-1h6c.6 0 1 .4 1 1h2a2 2 0 0 1 2 2v15a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V5c0-1.1.9-2 2-2h2Zm6 1h-4v2H9a1 1 0 0 0 0 2h6a1 1 0 1 0 0-2h-1V4Zm-3 8c0-.6.4-1 1-1h3a1 1 0 1 1 0 2h-3a1 1 0 0 1-1-1Zm-2-1a1 1 0 1 0 0 2 1 1 0 1 0 0-2Zm2 5c0-.6.4-1 1-1h3a1 1 0 1 1 0 2h-3a1 1 0 0 1-1-1Zm-2-1a1 1 0 1 0 0 2 1 1 0 1 0 0-2Z"
                                                        clip-rule="evenodd" />
                                                </svg>

                                                <div class="w-full text-lg font-semibold">Bidang Infrastruktur</div>
                                                <div class="w-full text-sm">Mengelola infrastruktur internet dan intranet.
                                                </div>
                                            </div>
                                        </label>
                                    </li>
                                    <li>
                                        <input type="radio" id="statistika" name="bidang" value="5"
                                            class="hidden peer" required>
                                        <label for="statistika"
                                            class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                            <div class="block">
                                                <svg class="w-8 h-8" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="M4 4.5V19c0 .6.4 1 1 1h15M7 14l4-4 4 4 5-5m0 0h-3.2M20 9v3.2" />
                                                </svg>
                                                <div class="w-full text-lg font-semibold">Bidang Statistik</div>
                                                <div class="w-full text-sm">Analisis terhadap data-data statistik.</div>
                                            </div>
                                        </label>

                                    </li>

                                </ul>
                                @error('bidang')
                                    <p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
                                        {{ $message }}</p>
                                @enderror
                                <hr class="my-4" />
                                <button type="submit"
                                    class="ml-auto text-white justify-end bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    Next
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
