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
    <div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900">
        <div class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800">
            <div class="flex flex-col overflow-y-auto md:flex-row">
                <div class="h-32 md:h-auto md:w-1/2">
                    <img aria-hidden="true" class="object-cover w-full h-full dark:hidden"
                        src="https://images.unsplash.com/photo-1604973746130-1876090c8a79?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                        alt="Office" />
                </div>
                <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
                    <div class="w-full">
                        <h1 class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200">
                            Register
                        </h1>
                        <form class="space-y-4 md:space-y-6" action="/register" method="POST">
                            @csrf
                            <div>
                                <label for="name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Masukkan
                                    Nama</label>
                                <input type="text" name="name" id="name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Masukkan Nama" required="">
                                @error('name')
                                    <p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
                                        {{ $message }}</p>
                                @enderror

                            </div>
                            <div>
                                <label for="email"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Masukkan
                                    Email</label>
                                <input type="email" name="email" id="email"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="name@company.com" required="">
                                @error('email')
                                    <p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
                                        {{ $message }}</p>
                                @enderror

                            </div>
                            <div>
                                <label for="password"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                                <div class="relative">
                                    <input type="password" name="password" id="password" placeholder="••••••••"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        required="">
                                    <button type="button" id="togglePassword"
                                        class="absolute inset-y-0 right-0 px-2 py-1.5 text-sm text-gray-500 dark:text-gray-300 focus:outline-none">
                                        Show
                                    </button>
                                </div>
                                <script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                        const passwordInput = document.getElementById('password');
                                        const togglePasswordButton = document.getElementById('togglePassword');

                                        // Toggle password visibility
                                        togglePasswordButton.addEventListener('click', function() {
                                            if (passwordInput.type === 'password') {
                                                passwordInput.type = 'text';
                                                togglePasswordButton.textContent = 'Hide';
                                            } else {
                                                passwordInput.type = 'password';
                                                togglePasswordButton.textContent = 'Show';
                                            }
                                        });
                                    });
                                </script>
                                @error('password')
                                    <p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
                                        {{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="confirmPassword"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Konfirmasi
                                    Password</label>
                                <div class="relative">
                                    <input type="password" name="confirmPassword" id="confirmPassword"
                                        placeholder="••••••••"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        required="">
                                    <button type="button" id="toggleConfirmPassword"
                                        class="absolute inset-y-0 right-0 px-2 py-1.5 text-sm text-gray-500 dark:text-gray-300 focus:outline-none">
                                        Show
                                    </button>
                                </div>
                                <script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                        const passwordInput = document.getElementById('confirmPassword');
                                        const togglePasswordButton = document.getElementById('toggleConfirmPassword');
                                        togglePasswordButton.addEventListener('click', function() {
                                            if (passwordInput.type === 'password') {
                                                passwordInput.type = 'text';
                                                togglePasswordButton.textContent = 'Hide';
                                            } else {
                                                passwordInput.type = 'password';
                                                togglePasswordButton.textContent = 'Show';
                                            }
                                        });
                                    });
                                </script>
                                @error('confirmPassword')
                                    <p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
                                        {{ $message }}</p>
                                @enderror
                                @if (session()->has('passwordFail'))
                                    <p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
                                        {{ session('passwordFail') }}
                                    </p>
                                @endif
                                {{-- <p class="mt-2 text-right">
                                    <a class="text-sm font-medium text-primary-600 dark:text-primary-400 hover:underline"
                                        href="#">
                                        Forgot your password?
                                    </a>
                                </p> --}}
                            </div>
                            <button type="submit"
                                class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Register</button>
                            <hr class="my-8" />

                        </form>
                        <p class="mt-2 text-sm font-light text-gray-500 dark:text-gray-400">
                            Sudah punya akun? <a href="/login"
                                class="font-medium text-primary-600 hover:underline dark:text-primary-500">Login</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
