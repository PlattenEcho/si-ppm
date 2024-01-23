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
                        src="https://i.pinimg.com/originals/39/87/be/3987beb4289cf7a45b94e2e2a73aaeb9.jpg"
                        alt="Office" />
                    <img aria-hidden="true" class="hidden object-cover w-full h-full dark:block"
                        src="https://i.pinimg.com/originals/39/87/be/3987beb4289cf7a45b94e2e2a73aaeb9.jpg"
                        alt="Office" />
                </div>
                <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
                    <div class="w-full">
                        <h1 class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200">
                            Login
                        </h1>
                        <form class="space-y-4 md:space-y-6" action="/login" method="POST">
                            @csrf
                            <div class="relative z-0">
                                <input type="email" name="email" id="email"
                                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                    placeholder=" " autofocus />
                                <label for="email"
                                    class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">
                                    Email</label>
                                @error('email')
                                    <p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
                                        {{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <div class="relative z-0">
                                    <input type="password" name="password" id="password"
                                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                        placeholder=" " />
                                    <label for="password"
                                        class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">
                                        Password</label>
                                    <button type="button" id="togglePassword"
                                        class="absolute inset-y-0 right-0 px-2 py-1.5 text-sm text-gray-500 dark:text-gray-300 focus:outline-none">
                                        Show
                                    </button>
                                    @error('password')
                                        <p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
                                            {{ $message }}</p>
                                    @enderror
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
                                <p class="mt-2 text-right">
                                    <a class="text-sm font-medium text-primary-600 dark:text-primary-400 hover:underline"
                                        href="#">
                                        Forgot your password?
                                    </a>
                                </p>
                            </div>
                            <button type="submit"
                                class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Log
                                in</button>
                            <hr class="my-8" />

                        </form>

                        <p class="mt-2 text-sm font-light text-gray-500 dark:text-gray-400">
                            Belum punya akun? <a href="/register"
                                class="font-medium text-primary-600 hover:underline dark:text-primary-500">Register</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
