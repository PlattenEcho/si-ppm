@extends('main')

@section('body')
    <section>
        <div class=" overflow-y-auto flex h-auto dark:bg-gray-900">
            <div class="max-w-5xl min-w-[64rem] container px-6 pb-6 mx-auto">
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
                                Cek Ulang
                            </h4>
                        </div>
                        <script>
                            function goBack() {
                                window.history.back();
                            }
                        </script>
                        <div class=" justify-between px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    <tbody>
                                        <tr
                                            class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                Nama
                                            </th>
                                            <td class="px-6 py-4">
                                                :
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $mergedData['name'] }}
                                            </td>
                                        </tr>
                                        <tr
                                            class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                NIM
                                            </th>
                                            <td class="px-6 py-4">
                                                :
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $mergedData['nim'] }}
                                            </td>
                                        </tr>
                                        <tr
                                            class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                Alamat
                                            </th>
                                            <td class="px-6 py-4">
                                                :
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $mergedData['alamat'] }}
                                            </td>
                                        </tr>
                                        <tr
                                            class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                Email
                                            </th>
                                            <td class="px-6 py-4">
                                                :
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $mergedData['email'] }}
                                            </td>
                                        </tr>
                                        <tr
                                            class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                No. Telp
                                            </th>
                                            <td class="px-6 py-4">
                                                :
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $mergedData['no_telp'] }}
                                            </td>
                                        </tr>
                                        <tr
                                            class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                Jenjang
                                            </th>
                                            <td class="px-6 py-4">
                                                :
                                            </td>
                                            <td class="px-6 py-4">
                                                @if ($mergedData['jenjang'] == 1)
                                                    SMK
                                                @elseif ($mergedData['jenjang'] == 2)
                                                    S1
                                                @elseif ($mergedData['jenjang'] == 3)
                                                    Lainnya
                                                @endif
                                            </td>
                                        </tr>
                                        <tr
                                            class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                Universitas
                                            </th>
                                            <td class="px-6 py-4">
                                                :
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $mergedData['universitas'] }}
                                            </td>
                                        </tr>
                                        <tr
                                            class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                Program Studi
                                            </th>
                                            <td class="px-6 py-4">
                                                :
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $mergedData['program_studi'] }}
                                            </td>
                                        </tr>
                                        <tr
                                            class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                Tanggal Mulai Magang
                                            </th>
                                            <td class="px-6 py-4">
                                                :
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $mergedData['tanggal_mulai'] }}
                                            </td>
                                        </tr>
                                        <tr
                                            class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                Tanggal Akhir Magang
                                            </th>
                                            <td class="px-6 py-4">
                                                :
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $mergedData['tanggal_akhir'] }}
                                            </td>
                                        </tr>
                                        <tr
                                            class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                Motivasi Magang
                                            </th>
                                            <td class="px-6 py-4">
                                                :
                                            </td>
                                            <td class="break-words break-all px-6 py-4">
                                                {{ $mergedData['motivasi'] }}
                                            </td>
                                        </tr>
                                        <tr
                                            class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                Rencana Kegiatan
                                            </th>
                                            <td class="px-6 py-4">
                                                :
                                            </td>
                                            <td class="break-words break-all px-6 py-4">
                                                {{ $mergedData['motivasi'] }}
                                            </td>
                                        </tr>
                                        <tr
                                            class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                Bidang
                                            </th>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                :
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                @if ($mergedData['bidang'] == 1)
                                                    Bidang Komunikasi
                                                @elseif ($mergedData['bidang'] == 2)
                                                    Bidang Informatika
                                                @elseif ($mergedData['bidang'] == 3)
                                                    Bidang Media
                                                @elseif ($mergedData['bidang'] == 4)
                                                    Bidang Infrastruktur
                                                @else
                                                    Bidang Statistik
                                                @endif
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <hr class="my-4" />
                            <button data-modal-target="popup-modal" data-modal-toggle="popup-modal"
                                class="ml-auto mt-4 text-white justify-end bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Submit
                            </button>

                            <div id="popup-modal" tabindex="-1"
                                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative p-4 w-full max-w-md max-h-full">
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                        <button type="button"
                                            class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                            data-modal-hide="popup-modal">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                        <div class="p-4 md:p-5 text-center">
                                            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 20 20">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                            </svg>
                                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                                                Apakah anda yakin untuk submit formulir pendaftaran? Jangan lupa untuk cek
                                                kembali</h3>
                                            <form action="/pendaftaran/cek-ulang" method="POST">
                                                @csrf

                                                <div class="flex justify-center">
                                                    <button data-modal-hide="popup-modal" type="submit"
                                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                                                        Submit
                                                    </button>
                                                    <button data-modal-hide="popup-modal" type="button"
                                                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancel</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
