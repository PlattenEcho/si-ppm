<div class="p-4 md:p-5 text-center max-h-[16rem] max-w-[24rem]">
    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true"
        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
    </svg>
    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
        Apakah anda yakin untuk submit formulir pendaftaran? Jangan lupa untuk cek
        kembali</h3>
    <form action="/pendaftaran/cek-ulang" method="POST">
        @csrf

        <div class="flex justify-center">
            <button data-modal-hide="popup-modal" type="submit" wire:click='delete'
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                Submit
            </button>
            <button type="button" wire:click='cancel'
                class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancel</button>
        </div>
    </form>
</div>

<script>
    window.addEventListener('closeModal', event => {
        $(".modal").modal('hide');
    })
</script>
