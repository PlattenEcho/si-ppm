@extends('admin.template.template')

@section('content')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <div class="overflow-x-hidden overflow-y-hidden">
        <div class="container px-6 mx-auto grid">
            <h2 class="my-6 mb-2 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Dashboard
            </h2>
            <!-- Cards -->
            <div class="grid gap-6 mt-2 mb-4 md:grid-cols-2 xl:grid-cols-5">
                <!-- Card -->
                <div class="flex items-center shadow-md p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                    <div
                        class="p-3 mr-4   {{ ($status) == '2' ?  'text-red-600 bg-red-100' : 'text-green-500 bg-green-100' }}
                     rounded-full dark:text-orange-100 dark:bg-orange-500">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                        </svg>
                    </div>
                    <div>
                        <p class=" text-sm font-medium text-gray-600 dark:text-gray-400">
                            Status Pendaftaran
                        </p>
                        <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                            @if (!$pengaturan)
                                -
                            @else
                            {{ $status == 2 ? 'Tutup' : 'Buka' }} - Per. {{ $periode }}
                            @endif
                        </p>
                    </div>
                </div>
                <!-- Card -->
                <div class="flex items-center shadow-md p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                    <div class="p-3 mr-4 text-red-500 bg-red-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <p class=" text-sm font-medium text-gray-600 dark:text-gray-400">
                            Pendaftar Belum Terverifikasi
                        </p>
                        <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                            {{ $belumVerifikasi }}
                        </p>
                    </div>
                </div>
                <!-- Card -->
                <div class="flex items-center shadow-md p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                    <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400">
                            Pendaftar Terverifikasi
                        </p>
                        <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                            {{ $sudahVerifikasi }}
                        </p>
                    </div>
                </div>
                <!-- Card -->
                <div class="flex items-center shadow-md p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                    <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <p class=" text-sm font-medium text-gray-600 dark:text-gray-400">
                            Seleksi
                        </p>
                        <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                            {{ $seleksi }}
                        </p>
                    </div>
                </div>
                <!-- Card -->
                <div class="flex items-center shadow-md p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                    <div class="p-3 mr-4 text-teal-500 bg-teal-100 rounded-full dark:text-teal-100 dark:bg-teal-500">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <div>
                        <p class=" text-sm font-medium text-gray-600 dark:text-gray-400">
                           Sisa Kuota
                        </p>
                        <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                            {{ $sisaKuota }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- Charts -->
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Charts
            </h2>
            <div class="grid gap-6 mb-8 md:grid-cols-2">
                <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                    <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
                        Data Pendaftaran
                    </h4>
                    <canvas id="pie"></canvas>
                    <div class="flex justify-center mt-4 space-x-6 text-sm text-gray-600 dark:text-gray-400">
                        <!-- Chart legend -->
                        <div class="flex items-center">
                            <span class="inline-block w-3 h-3 mr-1 bg-blue-200 rounded-full"></span>
                            <span class="text-sm">Diverifikasi</span>
                        </div>
                        <div class="flex items-center">
                            <span class="inline-block w-3 h-3 mr-1 bg-red-200 rounded-full"></span>
                            <span class="text-sm">Belum Diverifikasi</span>
                        </div>
                        <div class="flex items-center">
                            <span class="inline-block w-3 h-3 mr-1 bg-yellow-200 rounded-full"></span>
                            <span class="text-sm">Seleksi</span>
                        </div>
                        <div class="flex items-center">
                            <span class="inline-block w-3 h-3 mr-1 bg-green-200 rounded-full"></span>
                            <span class="text-sm">Diterima</span>
                        </div>
                        <div class="flex items-center">
                            <span class="inline-block w-3 h-3 mr-1 bg-orange-200 rounded-full"></span>
                            <span class="text-sm">Ditolak</span>
                        </div>
                    </div>
                </div>
                <script>
                    var ctx = document.getElementById('pie').getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: @json($data['labels']),
                            datasets: [{
                                label: 'Data',
                                data: @json($data['data']),
                                backgroundColor: [
                                    'rgba(54, 162, 235, 0.2)', // Warna untuk Sudah Verifikasi
                                    'rgba(255, 99, 132, 0.2)', // Warna untuk Belum Verifikasi
                                    'rgba(255, 206, 86, 0.2)', // Warna untuk Seleksi
                                    'rgba(75, 192, 192, 0.2)', // Warna untuk Diterima
                                    'rgba(255, 159, 64, 0.2)' // Warna untuk Ditolak
                                ],
                                borderColor: [
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(255, 99, 132, 1)',
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(255, 159, 64, 1)'
                                ],
                                borderWidth: 1
                            }]
                        },
                        options: {
                            plugins: {
                                legend: {
                                    display: false,
                                }
                            },
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                </script>


                <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                    <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
                        Data Bulanan
                    </h4>
                    <canvas id="bar_bulanan"></canvas>
                    <div class="flex justify-center mt-4 space-x-3 text-sm text-gray-600 dark:text-gray-400">
                        <!-- Chart legend -->
                        <div class="flex items-center">
                            <span class="inline-block w-3 h-3 mr-1 bg-teal-200 rounded-full"></span>
                            <span>Data Bulanan per-Periode</span>
                        </div>
                    </div>
                    <script>
                        var ctx = document.getElementById('bar_bulanan').getContext('2d');
                        var myChart = new Chart(ctx, {
                            type: 'line',
                            data: {
                                labels: @json(array_keys($sortedMonthlyData)),
                                datasets: [{
                                    label: 'Data',
                                    data: @json(array_map('count', $sortedMonthlyData)),
                                    backgroundColor: [
                                        'rgba(75, 192, 192, 0.2)'
                                    ],
                                    borderColor: [
                                        'rgba(75, 192, 192, 1)'
                                    ],
                                    borderWidth: 2
                                }]
                            },
                            options: {
                                plugins: {
                                    legend: {
                                        display: false,
                                    }
                                },
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                }
                            }
                        });
                    </script>

                </div>
            </div>
        </div>
    </div>
@endsection
