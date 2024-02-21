@extends('admin.template.template')

@section('content')
    <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Cetak Laporan
        </h2>
        <div class="px-6 py-6 relative overflow-x-auto bg-white shadow-md sm:rounded-lg">
            <div class="overflow-x-hidden overflow-y-hidden">
                <form class="max-w-[16rem]">
                    <label for="jangka_waktu" class="sr-only">Pilih Jangka Waktu</label>
                    <select id="jangka_waktu" name="jangka_waktu" onchange="updateOptions(this)"
                        class="block py-2.5 px-0 w-full text-base font-medium text-gray-800 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                        <option selected>Pilih Jangka Waktu</option>
                        <option value="weekly" class="mx-2 my-2">Mingguan</option>
                        <option value="monthly" class="mx-2 my-2">Bulanan</option>
                        <option value="period" class="mx-2 my-2">Periode</option>
                        <option value="yearly" class="mx-2 my-2">Tahunan</option>
                    </select>

                    <select id="bulan" name="bulan"
                        class="hidden
                        block py-2.5 px-0 w-full text-base font-medium text-gray-800 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                        <option value="1">Januari</option>
                        <option value="2">Februari</option>
                        <option value="12">Desember</option>
                    </select>

                    <select id="periode" name="periode"
                        class="hidden
                        block py-2.5 px-0 w-full text-base font-medium text-gray-800 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                        <option value="1">Januari</option>
                        <option value="2">Februari</option>
                        <option value="12">Desember</option>
                    </select>


                    <select id="tahun" name="tahun"
                        class="hidden block py-2.5 px-0 w-full text-base font-medium text-gray-800 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                        <option value="2022">2022</option>
                        <option value="2023">2023</option>
                        <option value="2030">2030</option>
                    </select>

                    <button type="submit"
                        class="ml-auto mt-4 text-white mx-auto bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Cetak Laporan
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function updateOptions(select) {
            var monthSelect = document.getElementById('month_select');
            var periodSelect = document.getElementById('period_select');
            var yearSelect = document.getElementById('year_select');

            monthSelect.classList.add('hidden');
            periodSelect.classList.add('hidden');
            yearSelect.classList.add('hidden');

            if (select.value === 'monthly') {
                monthSelect.classList.remove('hidden');
            } else if (select.value === 'period') {
                monthSelect.classList.remove('hidden');
            } else if (select.value === 'yearly') {
                yearSelect.classList.remove('hidden');
            }
        }
    </script>
@endsection
