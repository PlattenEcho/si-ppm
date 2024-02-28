<div class="px-4 py-4 relative w-full max-h-[36rem] overflow-y-auto bg-white shadow-md sm:rounded-lg">
    @if ($loading)
        <div class="absolute inset-0 flex items-center justify-center">
            <div class="absolute w-full h-full bg-gray-300 opacity-50"></div>
            <div class="relative items-center block">
                <div class="mx-auto text-center">
                    <div role="status">
                        <svg aria-hidden="true"
                            class="inline w-16 h-16 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600"
                            viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                fill="currentColor" />
                            <path
                                d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                fill="currentFill" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="flex items-center mb-6">
        <button type="button"
            class="px-2 py-2 text-white bg-gray-600 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm me-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700 flex-shrink-0"
            wire:click="$dispatch('openModal', { component: 'detail-pendaftaran', arguments: { pendaftaranId: {{ $pendaftaran->id_pendaftaran }} }})">
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M13 5H1m0 0 4 4M1 5l4-4" />
            </svg>
        </button>
        <h4 class="ml-2 text-lg font-semibold text-gray-600 dark:text-gray-300 flex-shrink-0">
            Surat Penerimaan
        </h4>
    </div>
    @if (!$suratPenerimaan)
        <div>
            <div class="grid gap-4 mb-4 sm:grid-cols-2">
                <div>
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                        Lengkap <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="name" id="name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value='{{ $pendaftaran->name }}' disabled>
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
                        value='{{ $pendaftaran->nim }}' disabled>
                    @error('nim')
                        <p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
                            {{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="grid gap-4 mb-4 sm:grid-cols-2">
                <div>
                    <label for="universitas"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Instansi
                        <span class="text-red-500">*</span></label>
                    <input type="text" name="universitas" id="universitas"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value='{{ $pendaftaran->universitas }}' disabled>
                    @error('universitas')
                        <p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
                            {{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="program_studi"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Program
                        Studi<span class="text-red-500">*</span></label>
                    <input type="text" name="program_studi" id="program_studi"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value='{{ $pendaftaran->program_studi }}' disabled>
                    @error('program_studi')
                        <p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
                            {{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="grid gap-4 mb-4 sm:grid-cols-2">
                <div>
                    <label for="tanggal_mulai"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                        Mulai<span class="text-red-500">*</span></label>
                    <input type="text" name="tanggal_mulai" id="tanggal_mulai"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value='{{ $pendaftaran->tanggal_mulai }}' disabled>
                    @error('tanggal_mulai')
                        <p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
                            {{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="tanggal_akhir"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                        Akhir<span class="text-red-500">*</span></label>
                    <input type="text" name="tanggal_akhir" id="tanggal_akhir"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value='{{ $pendaftaran->tanggal_akhir }}' disabled>
                    @error('tanggal_akhir')
                        <p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
                            {{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="mb-4">
                <label for="no_surat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor Surat
                    Penerimaan <span class="text-red-500">*</span></label>
                <input type="text" name="no_surat" id="no_surat" wire:model="no_surat"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    value="{{ old('no_surat') }}" placeholder="01/XX/XXXX/2024" required="">
                @error('no_surat')
                    <p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
                        {{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="kepada" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kepada
                    <span class="text-red-500">*</span></label>
                <input type="text" name="kepada" id="kepada" wire:model="kepada"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    value="{{ old('kepada') }}" placeholder="..." required="">
                @error('kepada')
                    <p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
                        {{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="fakultas_instansi"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fakultas - Instansi
                    <input type="text" name="fakultas_instansi" id="fakultas_instansi"
                        wire:model="fakultas_instansi"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ old('fakultas_instansi') }}" placeholder="..." required="">
                    @error('fakultas_instansi')
                        <p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
                            {{ $message }}</p>
                    @enderror
            </div>
            <div class="mb-4">
                <label for="no_surat_magang"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor
                    Surat Magang <span class="text-red-500">*</span></label>
                <input type="text" name="no_surat_magang" id="no_surat_magang" wire:model="no_surat_magang"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    value="{{ old('no_surat_magang') }}" placeholder="..." required="">
                @error('no_surat_magang')
                    <p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
                        {{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="tanggal_surat_magang"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Surat Magang <span
                        class="text-red-500">*</span></label>
                <input type="date" name="tanggal_surat_magang" id="tanggal_surat_magang"
                    wire:model="tanggal_surat_magang"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    value="{{ old('tanggal_surat_magang') }}" placeholder="..." required="">
                @error('tanggal_surat_magang')
                    <p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
                        {{ $message }}</p>
                @enderror
            </div>
            <p class="mx-auto  mt-8 mb-2 text-sm italic font-normal text-red-500 dark:text-red-300"
                id="file_input_help">
                Formulir
                dengan tanda (*) wajib untuk diisi</p>
            <hr class="mb-4" />
            <button type="submit" wire:click='createSuratPenerimaan'
                class="ml-auto text-white justify-end bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Buat Surat Penerimaan
            </button>
        </div>
    @else
        <div class="flex flex-row divide-x gap-4">
            <div class="basis-5/12 overflow-y-auto  px-2 py-2">
                <div>
                    <div class="grid gap-4 mb-4 sm:grid-cols-2">
                        <div>
                            <label for="name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                Lengkap <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="name" id="name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                value='{{ $pendaftaran->name }}' disabled>
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
                                value='{{ $pendaftaran->nim }}' disabled>
                            @error('nim')
                                <p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
                                    {{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="grid gap-4 mb-4 sm:grid-cols-2">
                        <div>
                            <label for="universitas"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Instansi
                                <span class="text-red-500">*</span></label>
                            <input type="text" name="universitas" id="universitas"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                value='{{ $pendaftaran->universitas }}' disabled>
                            @error('universitas')
                                <p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
                                    {{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="program_studi"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Program
                                Studi<span class="text-red-500">*</span></label>
                            <input type="text" name="program_studi" id="program_studi"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                value='{{ $pendaftaran->program_studi }}' disabled>
                            @error('program_studi')
                                <p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
                                    {{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="grid gap-4 mb-4 sm:grid-cols-2">
                        <div>
                            <label for="tanggal_mulai"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                Mulai<span class="text-red-500">*</span></label>
                            <input type="text" name="tanggal_mulai" id="tanggal_mulai"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                value='{{ $pendaftaran->tanggal_mulai }}' disabled>
                            @error('tanggal_mulai')
                                <p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
                                    {{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="tanggal_akhir"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                Akhir<span class="text-red-500">*</span></label>
                            <input type="text" name="tanggal_akhir" id="tanggal_akhir"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                value='{{ $pendaftaran->tanggal_akhir }}' disabled>
                            @error('tanggal_akhir')
                                <p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
                                    {{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="no_surat"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor Surat
                            Penerimaan <span class="text-red-500">*</span></label>
                        <input type="text" name="no_surat" id="no_surat" wire:model="no_surat"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required="">
                        @error('no_surat')
                            <p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
                                {{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="kepada"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kepada <span
                                class="text-red-500">*</span></label>
                        <input type="text" name="kepada" id="kepada" wire:model="kepada"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required="">
                        @error('kepada')
                            <p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
                                {{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="fakultas_instansi"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fakultas - Instansi
                            <input type="text" name="fakultas_instansi" id="fakultas_instansi"
                                wire:model="fakultas_instansi"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required="">
                            @error('fakultas_instansi')
                                <p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
                                    {{ $message }}</p>
                            @enderror
                    </div>
                    <div class="mb-4">
                        <label for="no_surat_magang"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor
                            Surat Magang <span class="text-red-500">*</span></label>
                        <input type="text" name="no_surat_magang" id="no_surat_magang"
                            wire:model="no_surat_magang"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required="">
                        @error('no_surat_magang')
                            <p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
                                {{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="tanggal_surat_magang"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Surat Magang
                            <span class="text-red-500">*</span></label>
                        <input type="date" name="tanggal_surat_magang" id="tanggal_surat_magang"
                            wire:model="tanggal_surat_magang"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required="">
                        @error('tanggal_surat_magang')
                            <p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
                                {{ $message }}</p>
                        @enderror
                    </div>
                    <p class="mx-auto  mt-8 mb-2 text-sm italic font-normal text-red-500 dark:text-red-300"
                        id="file_input_help">
                        Formulir
                        dengan tanda (*) wajib untuk diisi</p>
                    <hr class="mb-4" />
                    <button type="submit" wire:click='editSuratPenerimaan'
                        class="ml-auto text-white justify-end bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Edit Surat
                    </button>
                    <button type="submit" wire:click='download'
                        class="ml-auto text-white justify-end bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Download
                    </button>
                </div>
            </div>
            <div class="basis-7/12 sticky pl-4 py-2 ">
                <embed src="{{ asset('storage/' . $suratPenerimaan->file) }}" width="600" height="700"
                    type="application/pdf">
            </div>
        </div>
    @endif
</div>
