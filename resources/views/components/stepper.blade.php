<ol class="space-y-4 w-auto">
    <li>
        <div @if (request()->routeIs('pendaftaran')) class="w-full p-4 text-blue-700 text-sm bg-blue-100 border border-blue-300 rounded-lg dark:bg-gray-800 dark:border-blue-800 dark:text-blue-400" 
            @else 
                class="w-full p-4 text-white text-sm border border-green-400 rounded-lg bg-green-500 dark:bg-gray-800 dark:border-green-800 dark:text-green-400" @endif
            role="alert">
            <div class="flex items-center justify-between">
                <span class="sr-only">Data Diri</span>
                <h3 class="font-semibold">1. Isi Data Diri</h3>
                @if (request()->routeIs('pendaftaran'))
                    <svg class="rtl:rotate-180 w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                @else
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 16 12">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5.917 5.724 10.5 15 1.5" />
                    </svg>
                @endif
            </div>
        </div>
    </li>
    <li>
        <div @if (request()->routeIs('pendaftaran')) class="w-full p-4 text-gray-900 text-sm bg-gray-100 border border-gray-300 rounded-lg dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400" @elseif(request()->routeIs('formPilihDivisi'))
            class="w-full p-4 text-blue-700 text-sm bg-blue-100 border border-blue-300 rounded-lg dark:bg-gray-800 dark:border-blue-800 dark:text-blue-400" 
            @else
            class="w-full p-4 text-white text-sm border border-green-400 rounded-lg bg-green-500 dark:bg-gray-800 dark:border-green-800 dark:text-green-400" @endif
            role="alert">
            <div class="flex items-center justify-between">
                <span class="sr-only">Pilih Posisi Magang</span>
                <h3 class="font-semibold">2. Pilih Posisi Magang</h3>
                @if (request()->routeIs('pendaftaran'))
                @elseif(request()->routeIs('formPilihDivisi'))
                    <svg class="rtl:rotate-180 w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                @else
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 16 12">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5.917 5.724 10.5 15 1.5" />
                    </svg>
                @endif
            </div>
        </div>
    </li>
    <li>
        <div @if (request()->routeIs('pendaftaran')) class="w-full p-4 text-gray-900 text-sm bg-gray-100 border border-gray-300 rounded-lg dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400" @elseif(request()->routeIs('formPilihDivisi')) class="w-full p-4 text-gray-900 text-sm bg-gray-100 border border-gray-300 rounded-lg dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400" @elseif(request()->routeIs('formCekUlang')) 
            class="w-full p-4 text-blue-700 text-sm bg-blue-100 border border-blue-300 rounded-lg dark:bg-gray-800 dark:border-blue-800 dark:text-blue-400" 
            @else
            class="w-full p-4 text-white text-sm border border-green-400 rounded-lg bg-green-500 dark:bg-gray-800 dark:border-green-800 dark:text-green-400" @endif
            role="alert">
            <div class="flex items-center justify-between">
                <span class="sr-only">Cek Ulang</span>
                <h3 class="font-semibold">3. Cek Ulang</h3>
                @if (request()->routeIs('pendaftaran'))
                @elseif(request()->routeIs('formPilihDivisi'))

                @elseif(request()->routeIs('formCekUlang'))
                    <svg class="rtl:rotate-180 w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                @else
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 16 12">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5.917 5.724 10.5 15 1.5" />
                    </svg>
                @endif
            </div>
        </div>
    </li>
    <li>
        <div @if (request()->routeIs('pendaftaran')) class="w-full p-4 text-gray-900 text-sm bg-gray-100 border border-gray-300 rounded-lg dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400" @elseif(request()->routeIs('formPilihDivisi')) class="w-full p-4 text-gray-900 text-sm bg-gray-100 border border-gray-300 rounded-lg dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400" @elseif(request()->routeIs('formCekUlang')) class="w-full p-4 text-gray-900 text-sm bg-gray-100 border border-gray-300 rounded-lg dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400" 
            @elseif(request()->routeIs('cekStatus')) class="w-full p-4 text-blue-700 text-sm bg-blue-100 border border-blue-300 rounded-lg dark:bg-gray-800 dark:border-blue-800 dark:text-blue-400" 
            @else
            class="w-full p-4 text-white text-sm border border-green-400 rounded-lg bg-green-500 dark:bg-gray-800 dark:border-green-800 dark:text-green-400" @endif
            role="alert">
            <div class="flex items-center justify-between">
                <span class="sr-only">Cek Status</span>
                <h3 class="font-semibold">4. Cek Status</h3>
                @if (request()->routeIs('pendaftaran'))
                @elseif(request()->routeIs('formPilihDivisi'))

                @elseif(request()->routeIs('formCekUlang'))
                @else
                    <svg class="rtl:rotate-180 w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                @endif
            </div>
        </div>
    </li>
</ol>
