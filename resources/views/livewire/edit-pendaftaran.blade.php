<div class="px-4 py-4 relative w-full max-h-[36rem] overflow-y-auto bg-white shadow-md sm:rounded-lg">
    <div class="flex items-center mb-6">
        <button type="button"
            class="px-2 py-2 text-white bg-gray-600 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm me-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700 flex-shrink-0"
            wire:click="$dispatch('openModal', { component: 'detail-pendaftaran', arguments: { pendaftaranId: {{ $pendaftaran->id_pendaftaran }} }})">
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M13 5H1m0 0 4 4M1 5l4-4" />
            </svg>
        </button>
        <h4 class="ml-2 text-lg font-semibold text-gray-600 dark:text-gray-300 flex-shrink-0">
            Edit Pendaftaran
        </h4>
    </div>
    <div class="grid gap-4 mb-4 sm:grid-cols-2">
        <div>
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                Lengkap <span class="text-red-500">*</span>
            </label>
            <input type="text" name="name" id="name"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                value='{{ $pendaftaran->name }}' wire:model="name" required="">
            @error('name')
                <p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
                    {{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="nim" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIM/NISN
                <span class="text-red-500">*</span></label>
            <input type="text" name="nim" id="nim"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                value='{{ $pendaftaran->nim }}' wire:model="nim" required="">
            @error('nim')
                <p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
                    {{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="grid gap-4 mb-4 sm:grid-cols-2">
        <div>
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email
                <span class="text-red-500">*</span></label>
            <input type="email" name="email" id="email"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                value='{{ $pendaftaran->email }}' wire:model="email" required="">
            @error('email')
                <p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
                    {{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="no_telp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No.
                Telp <span class="text-red-500">*</span></label>
            <input type="text" name="no_telp" id="no_telp"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="08123456790" wire:model="no_telp" value='{{ $pendaftaran->email }}' required="">
            @error('no_telp')
                <p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
                    {{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="mb-4">
        <div>
            <label for="jenjang" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Jenjang {{ $jenjangUser }} <span class="text-red-500">*</span></label>
            <select id="jenjang" name="jenjang" wire:model='jenjang'
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option disabled>Pilih jenjang</option>
                @foreach ($bidang as $key => $value)
                    <option value="{{ $key }}" wire:key="{{ $key + 129 }}"{{ $jenjangUser == $key ? 'selected' : '' }}>
                        {{ $value }}</option>
                @endforeach

            </select>
            @error('jenjang')
                <p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
                    {{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="grid gap-4 mb-4 sm:grid-cols-2">
        <div>
            <label for="universitas" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Asal
                Instansi <span class="text-red-500">*</span> </label>
            <input type="text" name="universitas" id="universitas" wire:model="universitas"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Universitas X" value="{{ $pendaftaran->universitas }}" required="">
            @error('universitas')
                <p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
                    {{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="program_studi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Program
                Studi <span class="text-red-500">*</span> </label>
            <input type="text" name="program_studi" id="program_studi" wire:model="program_studi"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="IPA" value="{{ $pendaftaran->program_studi }}" required="">
            @error('program_studi')
                <p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
                    {{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="mb-4">
        <label for="alamat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat
            <span class="text-red-500">*</span></label>
        <input type="text" name="alamat" id="alamat" wire:model="alamat"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            value="{{ $pendaftaran->alamat }}" placeholder="Jl. Contoh, Semarang" required="">
        @error('alamat')
            <p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
                {{ $message }}</p>
        @enderror
    </div>
    <div class="grid gap-4 mb-4 sm:grid-cols-2">
        <div>
            <label for="tanggal_mulai" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                Mulai Magang</label>
            <input type="date" name="tanggal_mulai" id="tanggal_mulai" wire:model="tanggal_mulai"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                value="{{ $pendaftaran->tanggal_mulai }}" required="">
            @error('tanggal_mulai')
                <p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
                    {{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="tanggal_akhir" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                Akhir Magang</label>
            <input type="date" name="tanggal_akhir" id="tanggal_akhir" wire:model="tanggal_akhir"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                value="{{ $pendaftaran->tanggal_akhir }}" required="">
            @error('tanggal_akhir')
                <p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
                    {{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="mb-4">
        <label for="motivasi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Motivasi
            Magang <span class="text-red-500">*</span></label>
        <textarea id="motivasi" name="motivasi" rows="3" wire:model="motivasi"
            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Tuliskan motivasi magang disini...">{{ $pendaftaran->motivasi }}</textarea>
        @error('motivasi')
            <p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
                {{ $message }}</p>
        @enderror
    </div>
    <div class="mb-4">
        <label for="rencana_kegiatan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rencana
            Kegiatan Magang <span class="text-red-500">*</span>
        </label>
        <textarea id="rencana_kegiatan" name="rencana_kegiatan" rows="4" wire:model="rencana_kegiatan"
            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Tuliskan rencana kegiatan magang disini...">{{ $pendaftaran->rencana_kegiatan }}</textarea>
        @error('rencana_kegiatan')
            <p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
                {{ $message }}</p>
        @enderror
    </div>
    <div class="mb-4">
        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="scan_ktm">Scan KTM </label>
        <input
            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
            aria-describedby="scan_ktm" name="scan_ktm" id="scan_ktm" type="file" wire:model="scan_ktm">
        <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">
            PNG,
            JPG, atau PDF (Max. 4MB).</p>
        @error('scan_ktm')
            <p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
                {{ $message }}</p>
        @enderror
    </div>
    <div class="mb-4">
        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="surat_pengantar">Surat
            Pengantar </label>
        <input
            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
            aria-describedby="surat_pengantar" name="surat_pengantar" id="surat_pengantar" type="file"
            wire:model="surat_pengantar">
        <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">
            PNG,
            JPG, atau PDF (Max. 4MB).</p>
        @error('surat_pengantar')
            <p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
                {{ $message }}</p>
        @enderror
    </div>
    <p class="mx-auto  mt-8 mb-2 text-sm italic font-normal text-red-500 dark:text-red-300" id="file_input_help">
        Formulir
        dengan tanda (*) wajib untuk diisi</p>
    <hr class="mb-4" />
    <button type="submit" wire:click='editPendaftaran'
        class="ml-auto text-white justify-end bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        Edit Pendaftaran
    </button>
</div>
