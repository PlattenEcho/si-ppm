<div class="px-4 py-4 relative w-full max-h-[36rem] overflow-y-auto bg-white shadow-md sm:rounded-lg">
    <div class="flex flex-row divide-x gap-4">
        <div class="basis-4/12 sticky px-2 py-2">
            <div class="mb-4">
                <div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ID</label>
                        <p class="font-semibold mb-2 text-lg text-gray-800 dark:text-gray-400">
                            {{ $pendaftaran->id_pendaftaran }} 
                        </p>
                    </div>
                    <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Edit</button>
                    <button wire:click="$dispatch('openModal', { component: 'surat-penerimaan', arguments: { pendaftaranId: {{ $pendaftaran->id_pendaftaran }} }})" type="button" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Surat Penerimaan</button>
                    <hr class="mb-4 h-2">
                    <label class="block mt-4 text-sm font-medium text-gray-900 dark:text-white">Ubah Status</label>
                    {{-- <select wire:model="selectedStatus"
                        class="block mb-4 font-normal py-2.5 px-0 w-full text-sm bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                        <option value="" selected disabled>Edit Status Pendaftaran</option>
                        <option value="1">Menunggu Verifikasi</option>
                        <option value="2">Verifikasi Berhasil</option>
                        <option value="3">Verifikasi Gagal</option>
                        <option value="4">Proses Seleksi</option>
                        <option value="5">Diterima</option>
                        <option value="6">Ditolak</option>
                        <option value="7">Dalam Proses Magang</option>
                        <option value="8">Magang Selesai</option>
                        <option value="9">Batal</option>
                    </select> --}}
                    <select wire:model="selectedStatus"
                        class="block mb-4 font-normal py-2.5 px-0 w-full text-sm bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                        <option value="" selected disabled>Edit Status Pendaftaran</option>
                        @foreach ($statusOptions as $option)
                            <option value="{{ $option['status_pendaftaran'] }}">{{ $option['label'] }}</option>
                        @endforeach
                    </select>
                    @error('selectedStatus')
                        <p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
                            {{ $message }}</p>
                    @enderror

                    <label for="catatan"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Catatan</label>
                    <textarea wire:model="catatan" rows="4"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Write your thoughts here..."></textarea>
                    @error('catatan')
                        <p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
                            {{ $message }}</p>
                    @enderror
                    <button wire:click="updateStatus"
                        class="mx-auto mt-4 text-white justify-end bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Submit
                    </button>
                </div>
            </div>
        </div>
        <div class="basis-8/12 overflow-y-auto pl-4 py-2 ">
            <div class="w-fit overflow-y-auto">
                <div class="grid gap-4 mb-4 sm:grid-cols-2">
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                            Lengkap</label>
                        <p class="font-base text-gray-700 dark:text-gray-400">
                            {{ $pendaftaran->name }}
                        </p>
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIM/NISN</label>
                        <p class="font-base text-gray-700 dark:text-gray-400">{{ $pendaftaran->nim }}</p>
                    </div>
                </div>
                <hr class="mb-4">
                <div class="grid gap-4 mb-4 sm:grid-cols-2">
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                        <p class="font-base text-gray-700 dark:text-gray-400">{{ $pendaftaran->email }}</p>
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No. Telp</label>
                        <p class="font-base text-gray-700 dark:text-gray-400">{{ $pendaftaran->no_telp }}</p>
                    </div>
                </div>
                <hr class="mb-4">
                <div class="grid gap-4 mb-4 sm:grid-cols-2">
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenjang</label>
                        <p class="font-base text-gray-700 dark:text-gray-400">{{ $pendaftaran->jenjang }}</p>
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Universitas</label>
                        <p class="font-base text-gray-700 dark:text-gray-400">{{ $pendaftaran->universitas }}</p>
                    </div>
                </div>
                <hr class="mb-4">
                <div class="mb-4">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                    <p class="font-base text-gray-700 dark:text-gray-400">{{ $pendaftaran->alamat }}</p>
                </div>
                <hr class="mb-4">
                <div class="mb-4">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Motivasi</label>
                    <p class="break-words break-all font-base text-gray-700 dark:text-gray-400">
                        {{ $pendaftaran->motivasi }}</p>
                </div>
                <hr class="mb-4">
                <div class="mb-4">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rencana Kegiatan</label>
                    <p class="break-words break-all font-base text-gray-700 dark:text-gray-400">
                        {{ $pendaftaran->rencana_kegiatan }}</p>
                </div>
                <hr class="mb-4">
                <div class="mb-4">
                    <h4 class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Scan KTM</h4>
                    @if (pathinfo($pendaftaran->scan_ktm, PATHINFO_EXTENSION) == 'pdf')
                        <embed src="{{ asset('storage/' . $pendaftaran->scan_ktm) }}" width="600" height="400"
                            type="application/pdf">
                    @else
                        <img src="{{ asset('storage/' . $pendaftaran->scan_ktm) }}" alt="Scan KTM image"
                            class="h-auto max-h-72">
                    @endif
                </div>

                <div class="mb-4">
                    <h4 class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Surat Pengantar</h4>
                    @if (pathinfo($pendaftaran->surat_pengantar, PATHINFO_EXTENSION) == 'pdf')
                        <embed src="{{ asset('storage/' . $pendaftaran->surat_pengantar) }}" width="400"
                            height="600" type="application/pdf">
                    @else
                        <img src="{{ asset('storage/' . $pendaftaran->surat_pengantar) }}" alt="Surat Pengantar image"
                            class="h-auto max-w-xl">
                    @endif
                </div>
                <hr class="mb-4">
            </div>
        </div>
    </div>
</div>
