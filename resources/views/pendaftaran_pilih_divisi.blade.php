@extends('main')

@section('body')
    <section>
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
                                Pilih Posisi
                            </h4>
                        </div>
                        <script>
                            function goBack() {
                                window.history.back();
                            }
                        </script>
                        <div class=" justify-between px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                            <form action="/pendaftaran/pilih-divisi" method="POST">
                                @csrf
                                <ul class="grid w-full gap-6 md:grid-cols-2">
                                    <li>
                                        <input type="radio" id="divisi-if" name="divisi" value="1"
                                            class="hidden peer" required>
                                        <label for="divisi-if"
                                            class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                            <div class="block">
                                                <div class="w-full text-lg font-semibold">Divisi Informatika</div>
                                                <div class="w-full">Pembuatan Website</div>
                                            </div>
                                            <svg class="w-5 h-5 ms-3 rtl:rotate-180" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                            </svg>
                                        </label>
                                        @error('divisi')
                                            <p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
                                                {{ $message }}</p>
                                        @enderror
                                    </li>
                                    <li>
                                        <input type="radio" id="divisi-med" name="divisi" value="2"
                                            class="hidden peer">
                                        <label for="divisi-med"
                                            class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                            <div class="block">
                                                <div class="w-full text-lg font-semibold">Divisi Media</div>
                                                <div class="w-full">Pembuatan Konten</div>
                                            </div>
                                            <svg class="w-5 h-5 ms-3 rtl:rotate-180" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                            </svg>
                                        </label>
                                        @error('divisi')
                                            <p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
                                                {{ $message }}</p>
                                        @enderror
                                    </li>
                                    <li>
                                        <input type="radio" id="divisi-if" name="divisi" value="1"
                                            class="hidden peer" required>
                                        <label for="divisi-if"
                                            class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                            <div class="block">
                                                <div class="w-full text-lg font-semibold">Divisi Informatika</div>
                                                <div class="w-full">Pembuatan Website</div>
                                            </div>
                                            <svg class="w-5 h-5 ms-3 rtl:rotate-180" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                            </svg>
                                        </label>
                                        @error('divisi')
                                            <p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
                                                {{ $message }}</p>
                                        @enderror
                                    </li>
                                    <li>
                                        <input type="radio" id="divisi-med" name="divisi" value="2"
                                            class="hidden peer">
                                        <label for="divisi-med"
                                            class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                            <div class="block">
                                                <div class="w-full text-lg font-semibold">Divisi Media</div>
                                                <div class="w-full">Pembuatan Konten</div>
                                            </div>
                                            <svg class="w-5 h-5 ms-3 rtl:rotate-180" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M1 5h12m0 0L9 1m4 4L9 9" />
                                            </svg>
                                        </label>
                                        @error('divisi')
                                            <p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
                                                {{ $message }}</p>
                                        @enderror
                                    </li>
                                    <li>
                                        <input type="radio" id="divisi-if" name="divisi" value="1"
                                            class="hidden peer" required>
                                        <label for="divisi-if"
                                            class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                            <div class="block">
                                                <div class="w-full text-lg font-semibold">Divisi Informatika</div>
                                                <div class="w-full">Pembuatan Website</div>
                                            </div>
                                            <svg class="w-5 h-5 ms-3 rtl:rotate-180" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M1 5h12m0 0L9 1m4 4L9 9" />
                                            </svg>
                                        </label>
                                        @error('divisi')
                                            <p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
                                                {{ $message }}</p>
                                        @enderror
                                    </li>

                                </ul>
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
