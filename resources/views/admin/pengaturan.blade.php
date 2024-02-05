@extends('admin.template.template')

@section('content')
    <script src="../path/to/flowbite/dist/datepicker.js"></script>

    <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Pengaturan
        </h2>
        <div class="px-6 py-6 relative overflow-x-auto bg-white shadow-md sm:rounded-lg">
            <div class="">
                <h4 class="mb-6 text-base font-semibold text-gray-700 dark:text-gray-200">
                    Pengaturan Pendaftaran
                </h4>
                <form action="{{ route('admin.savePengaturan') }}" method="POST">
                    @csrf
                    <div class="grid gap-4 mb-4 sm:grid-cols-2">
                        <div>
                            <label for="buka"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Buka/Tidak</label>
                            <div class="grid gap-4 sm:grid-cols-2">
                                <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                                    <input id="buka" type="radio" value="1" name="buka_tidak"
                                        {{ optional($pengaturan)->buka_tidak == 1 ? 'checked' : '' }}
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="buka"
                                        class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Buka</label>
                                </div>
                                <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                                    <input id="tidak" type="radio" value="0" name="buka_tidak"
                                        {{ optional($pengaturan)->buka_tidak == 1 ? '' : 'checked' }}
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="tidak"
                                        class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tidak</label>
                                </div>
                            </div>
                            @error('buka_tidak')
                                <p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div>
                            <label for="kuota"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kuota</label>
                            <input type="number" name="kuota" id="kuota"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                value="{{ optional($pengaturan)->kuota }}" required="">
                            @error('kuota')
                                <p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
                                    {{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="grid gap-4 mb-4 sm:grid-cols-2">
                        <div>
                            <label for="tanggal_buka"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Buka</label>
                            <input type="datetime-local" name="tanggal_buka" id="tanggal_buka"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                value="{{ optional($pengaturan)->tanggal_buka }}" required="">
                            @error('tanggal_buka')
                                <p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
                                    {{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="tanggal_tutup"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Tutup</label>
                            <input type="datetime-local" name="tanggal_tutup" id="tanggal_tutup"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                value="{{ optional($pengaturan)->tanggal_tutup }}" required="">
                            @error('tanggal_tutup')
                                <p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
                                    {{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <hr class="my-4" />
                    <button type="submit"
                        class="ml-auto text-white mx-auto bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Save
                    </button>
                </form>
            </div>
        </div>
        <div class="px-6 py-6 my-6 relative overflow-x-auto bg-white shadow-md sm:rounded-lg">
            <div class="">
                <h4 class="mb-6 text-base font-semibold text-gray-700 dark:text-gray-200">
                    Pengaturan Pengumuman </h4>
                <div id="alert-additional-content-3"
                    class="p-4 mb-4 text-white border max-w-5xl border-green-300 rounded-lg bg-green-500 dark:bg-gray-800 dark:text-green-400 dark:border-green-800"
                    role="alert">
                    <img class="mb-4 object-cover rounded-md w-full max-h-[16rem]" src="{{ asset('storage/' . $pengumuman->image) }}"
                        alt="fghfghfgh">
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
                <form action="{{ route('admin.updatePengumuman') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid gap-4 mb-4 sm:grid-cols-2">
                        <div>
                            <label for="title"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul</label>
                            <input type="text" name="title" id="title"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                value="{{ optional($pengumuman)->title }}" required="">
                            @error('title')
                                <p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
                                    {{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="no_telp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No.
                                Telp</label>
                            <input type="text" name="no_telp" id="no_telp"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                value="{{ optional($pengumuman)->no_telp }}" required="">
                            @error('no_telp')
                                <p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
                                    {{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="grid gap-4 mb-4 sm:grid-cols-2">
                        <div>
                            <label for="nama_kontak"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Kontak</label>
                            <input type="text" name="nama_kontak" id="nama_kontak"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                value="{{ optional($pengumuman)->nama_kontak }}" required="">
                            @error('nama_kontak')
                                <p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
                                    {{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="link"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Link</label>
                            <input type="text" name="link" id="link"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                value="{{ optional($pengumuman)->link }}" required="">
                            @error('link')
                                <p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
                                    {{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            for="image">Image</span></label>
                        <input
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            aria-describedby="image" name="image" id="image" type="file">
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">
                            PNG atau
                            JPG (Max. 5MB).</p>
                        @error('image')
                            <p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
                                {{ $message }}</p>
                        @enderror
                    </div>
                    <hr class="my-4" />
                    <button type="submit"
                        class="ml-auto text-white mx-auto bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Save
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
