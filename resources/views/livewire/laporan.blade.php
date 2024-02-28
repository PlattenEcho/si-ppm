<div>
    {{-- loading --}}
    <div wire:loading.delay>
        <div class="absolute inset-0 flex items-center justify-center">
            <div class="absolute w-full h-full bg-gray-300 opacity-50"></div>
            <div class="relative items-center block">
                <div class="mx-auto text-center">
                    <div role="status">
                        <svg aria-hidden="true" class="inline w-16 h-16 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                            <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="grid max-w-lg grid-cols-2 gap-4">
        <div class="col-span-1">
            <label for="jangka_waktu" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih
                Jangka Waktu</label>
            <select id="jangka_waktu" name="jangka_waktu" wire:model.live="jangka_waktu"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="-" class="mx-2 my-2">-</option>
                <option value="bulanan" class="mx-2 my-2">Bulanan</option>
                <option value="periodik" class="mx-2 my-2">Periode</option>
                <option value="tahunan" class="mx-2 my-2">Tahunan</option>
            </select>
        </div>
        <div class="col-span-1">
            @if ($jangka_waktu == 'bulanan')
                <label for="bulan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih
                    Bulan</label>
                <select id="bulan" name="bulan" wire:model.live="bulan"
                    class=" bg-gray-50 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @foreach ($bulanList as $bulanItem)
                        <option value="{{ $bulanItem['bulan'] }}" wire:key="{{ $bulanItem['uuid'] }}">
                            {{ date('F', mktime(0, 0, 0, $bulanItem['bulan'], 1)) }}
                        </option>
                    @endforeach
                </select>
            @elseif($jangka_waktu == 'periodik')
                <label for="periode" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih
                    Periode</label>
                <select id="periode" name="periode" wire:model.live="periode"
                    class=" bg-gray-50 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @foreach ($periodeList as $periodeItem)
                        <option value="{{ $periodeItem['periode'] }}" wire:key="{{ $periodeItem['uuid'] }}">
                            {{ $periodeItem['periode'] }}</option>
                    @endforeach
                </select>
            @elseif($jangka_waktu == 'tahunan')
                <label for="tahun" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih
                    Tahun</label>
                <select id="tahun" name="tahun" wire:model.live="tahun"
                    class=" bg-gray-50 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @foreach ($tahunList as $tahunItem)
                        <option value="{{ $tahunItem['tahun'] }}" wire:key="{{ $tahunItem['uuid'] }}">
                            {{ $tahunItem['tahun'] }}</option>
                    @endforeach
                </select>
            @else
            @endif
        </div>
    </div>
    <div class="grid h-24 gap-6 mt-4 mb-4 md:grid-cols-2 xl:grid-cols-3">
        <div class="flex items-center shadow-md p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <div class="flex-1">
                <p class="text-sm font-medium text-gray-600 dark:text-gray-400">
                    Pendaftar Diterima
                </p>
                <div class="flex justify-end">
                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                        {{ $diterima }} </p>
                </div>
            </div>
        </div>
        <div class="flex items-center shadow-md p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <div class="flex-1">
                <p class="text-sm font-medium text-gray-600 dark:text-gray-400">
                    Pendaftar Ditolak
                </p>
                <div class="flex justify-end">
                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                        {{ $ditolak }} </p>
                </div>
            </div>
        </div>
        <div class="flex items-center shadow-md p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <div class="flex-1">
                <p class="text-sm font-medium text-gray-600 dark:text-gray-400">
                    Pendaftar Total
                </p>
                <div class="flex justify-end">
                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                        {{ $total }} </p>
                </div>
            </div>
        </div>
    </div>
    <label for="Button" class="block mt-4 mb-2 text-sm font-medium text-gray-900 dark:text-white">
        Download</label>
    <button wire:click="exportPDF" type="button" class=" text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">PDF</button>
    <button wire:click="exportExcel" type="button" class="focus:outline-none text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Excel</button>
</div>
