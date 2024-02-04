<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Sistem Magang Diskominfo Semarang</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&amp;display=swap"
        rel="stylesheet">
    <link rel = "icon"
        href="https://diskominfo.majalengkakab.go.id/wp-content/uploads/2017/05/cropped-logo-diskominfo.png"
        type = "image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-jaz79EiSdC9nQ7wGRDQI2ulW1iNQhpZswJDNiIuoqqUjMw5VJdftSsU4en47xFW5aVgiqFLBnW4P2QubN9/jCg=="
        crossorigin="anonymous" />
</head>

<body>
    <section class="bg-gray-50 dark:bg-gray-900">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <div
                class="w-full bg-white rounded-lg shadow-lg dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 sm:p-8">
                    <div class="text-center"> <!-- Menambahkan kelas text-center di sini -->
                        <img class="w-12 mx-auto mb-4"
                            src="https://diskominfo.majalengkakab.go.id/wp-content/uploads/2017/05/cropped-logo-diskominfo.png"
                            alt="logo">
                        <div class="border-b border-gray-300"></div>

                    </div>
                    <h1 class="mt-4 text-xl font-semibold text-gray-900 md:text-2xl dark:text-white">
                        Verifikasi Email
                    </h1>
                    <p class="text-xs">
                        Silahkan cek email untuk kode verifikasi. <br>
                        Email: {{ $email }}
                    </p>
                    <form class="space-y-4" action="/email-verification" method="POST">
                        @csrf
                        <div>
                            <label for="kode_verifikasi"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kode
                                Verifikasi</label>
                            <input type="text" name="kode_verifikasi" id="kode_verifikasi"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Masukkan kode verifikasi disini..." required="">
                            @if (session()->has('verifError'))
                                <p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
                                    {{ session('verifError') }}
                                </p>
                            @endif
                        </div>
                        <button type="submit"
                            class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Verifikasi</button>
                    </form>
                </div>
                <form action="/logout" method="POST">
                    @csrf
                    <button type="submit"
                        class="w-full text-center block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                        Log Out
                    </button>
                </form>
            </div>
        </div>
    </section>

    {{-- <script>
        @if (Session::has('pesan'))
            toastr.{{ Session::get('alert') }}("{{ Session::get('message') }}");
        @endif
    </script> --}}
</body>
