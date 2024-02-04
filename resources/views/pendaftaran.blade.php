@extends('main')

@section('body')
    <section>
        <div class=" overflow-y-auto flex h-auto dark:bg-gray-900">
            @auth
                <div class="max-w-5xl container px-6 pb-6 mx-auto">
                    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                        Pendaftaran
                        {{ $status }}
                    </h2>
                    <div class="flex flex-row space-x-">
                        <div class="basis-1/4 pr-8">{{-- Stepper --}}
                            @include('components.stepper')
                        </div>
                        <div class="basis-3/4"> {{-- Form --}}
                            <!-- General elements -->
                            <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
                                Data Diri
                            </h4>
                            @if ($status == 0)
                                <div id="alert-additional-content-3"
                                    class="p-4 mb-4 text-white border border-green-300 rounded-lg bg-red-600" role="alert">
                                    <div class="flex items-center">
                                        <span class="sr-only">Info</span>
                                        <h3 class="text-xl font-bold">Kuota hampir habis!</h3>
                                    </div>
                                    <div class="mt-2 mb-4 text-sm">
                                        Silahkan segera melakukan pendaftaran sebelum kuota habis.
                                    </div>
                                    <div class="flex">
                                        <button type="button"
                                            class="border-gray-200 text-gray-800 bg-white border hover:bg-gray-100 hover:text-black focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-xs px-3 py-1.5 text-center dark:hover:bg-green-600 dark:border-green-600 dark:text-green-400 dark:hover:text-white dark:focus:ring-green-800"
                                            data-dismiss-target="#alert-additional-content-3" aria-label="Close">
                                            Sembunyikan
                                        </button>
                                    </div>
                                </div>
                            @elseif($status == 4)
                                <div id="alert-additional-content-3"
                                    class="p-4 mb-4 text-white border border-green-300 rounded-lg bg-red-600" role="alert">
                                    <div class="flex items-center">
                                        <span class="sr-only">Info</span>
                                        <h3 class="text-xl font-bold">Pendaftaran hampir tutup!</h3>
                                    </div>
                                    <div class="mt-2 mb-4 text-sm">
                                        Silahkan segera melakukan pendaftaran sebelum pendaftaran ditutup.
                                    </div>
                                    <div class="flex">
                                        <button type="button"
                                            class="border-gray-200 text-gray-800 bg-white border hover:bg-gray-100 hover:text-black focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-xs px-3 py-1.5 text-center dark:hover:bg-green-600 dark:border-green-600 dark:text-green-400 dark:hover:text-white dark:focus:ring-green-800"
                                            data-dismiss-target="#alert-additional-content-3" aria-label="Close">
                                            Sembunyikan
                                        </button>
                                    </div>
                                </div>
                            @endif
                            <div class=" justify-between px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                                <form action="/pendaftaran" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="grid gap-4 mb-4 sm:grid-cols-2">
                                        <div>
                                            <label for="name"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                                Lengkap <span class="text-red-500">*</span>
                                            </label>
                                            <input type="text" name="name" id="name"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                value="{{ old('name') }}" required="">
                                            @error('name')
                                                <p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
                                                    {{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div>
                                            <label for="nim"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIM/NISN
                                                <span class="text-red-500">*</span></label>
                                            <input type="text" name="nim" id="nim"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                value="{{ old('nim') }}" required="">
                                            @error('nim')
                                                <p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
                                                    {{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="grid gap-4 mb-4 sm:grid-cols-2">
                                        <div>
                                            <label for="email"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email <span
                                                    class="text-red-500">*</span></label>
                                            <input type="email" name="email" id="email"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                value="{{ old('email') }}" required="">
                                            @error('email')
                                                <p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
                                                    {{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div>
                                            <label for="no_telp"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No.
                                                Telp <span class="text-red-500">*</span></label>
                                            <input type="text" name="no_telp" id="no_telp"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="08123456790" value="{{ old('no_telp') }}" required="">
                                            @error('no_telp')
                                                <p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
                                                    {{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="grid gap-4 mb-4 sm:grid-cols-2">
                                        <div>
                                            <label for="jenjang"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                Jenjang <span class="text-red-500">*</span></label>
                                            <select id="jenjang" name="jenjang" value="{{ old('jenjang') }}"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                <option>Pilih jenjang</option>
                                                <option {{ old('jenjang') == 1 ? 'selected' : '' }} value="1">SMK</option>
                                                <option {{ old('jenjang') == 2 ? 'selected' : '' }} value="2">S1</option>
                                                <option {{ old('jenjang') == 3 ? 'selected' : '' }} value="3">Lainnya
                                                </option>
                                            </select>
                                            @error('jenjang')
                                                <p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
                                                    {{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div>
                                            <label for="universitas"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Asal
                                                Instansi <span class="text-red-500">*</span> </label>
                                            <input type="text" name="universitas" id="universitas"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Universitas X" value="{{ old('universitas') }}" required="">
                                            @error('universitas')
                                                <p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
                                                    {{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <label for="alamat"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat <span
                                                class="text-red-500">*</span></label>
                                        <input type="text" name="alamat" id="alamat"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            value="{{ old('alamat') }}" placeholder="Jl. Contoh, Semarang" required="">
                                        @error('alamat')
                                            <p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
                                                {{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label for="motivasi"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Motivasi
                                            Magang <span class="text-red-500">*</span></label>
                                        <textarea id="motivasi" name="motivasi" rows="3"
                                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Tuliskan motivasi magang disini...">{{ old('motivasi') }}</textarea>
                                        @error('motivasi')
                                            <p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
                                                {{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label for="rencana_kegiatan"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rencana
                                            Kegiatan Magang <span class="text-red-500">*</span>
                                        </label>
                                        <textarea id="rencana_kegiatan" name="rencana_kegiatan" rows="4"
                                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Tuliskan rencana kegiatan magang disini...">{{ old('rencana_kegiatan') }}</textarea>
                                        @error('rencana_kegiatan')
                                            <p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
                                                {{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                            for="scan_ktm">Scan KTM <span class="text-red-500">*</span></label>
                                        <input
                                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                            aria-describedby="scan_ktm" name="scan_ktm" id="scan_ktm" type="file">
                                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG,
                                            PNG,
                                            JPG, atau PDF (Max. 5MB).</p>
                                        @error('scan_ktm')
                                            <p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
                                                {{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                            for="surat_pengantar">Surat Pengantar <span class="text-red-500">
                                                *</span></label>
                                        <input
                                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                            aria-describedby="surat_pengantar" name="surat_pengantar" id="surat_pengantar"
                                            type="file">
                                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG,
                                            PNG,
                                            JPG, atau PDF (Max. 5MB).</p>
                                        @error('surat_pengantar')
                                            <p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
                                                {{ $message }}</p>
                                        @enderror
                                    </div>
                                    <p class="mx-auto  mt-8 mb-2 text-sm italic font-normal text-red-500 dark:text-red-300"
                                        id="file_input_help">Formulir
                                        dengan tanda (*) wajib untuk diisi</p>
                                    <hr class="mb-4" />
                                    <button type="submit"
                                        class="ml-auto text-white justify-end bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        Next
                                    </button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            @else
                <div class="container mx-auto flex items-center justify-center min-h-[40rem]">
                    <div
                        class="w-full max-w-xl p-6 my-6 bg-red-600 text-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <h5 class="mb-2 text-2xl font-bold text-center tracking-tight dark:text-white">Belum Terdaftar!</h5>
                        <p class="mb-3 text-center font-normal dark:text-gray-400">Untuk melanjutkan, silakan login atau daftar
                            sekarang.</p>
                        <a href="/login"
                            class="block w-full px-3 py-2 text-sm font-semibold text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Login Sekarang
                        </a>
                        <a href="/register"
                            class="mt-2 block w-full px-3 py-2 text-sm font-semibold text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Daftar Sekarang
                        </a>
                    </div>
                </div>

            @endauth
        </div>
    </section>
@endsection
