<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Sistem Pendukung Keputusan Menentukan Kepuasan Pasien - CSI</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans bg-green-700 text-gray-900">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-green-700">
            <div>
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current bg-green-400 text-gray-500" />
                </a>
            </div>

            <div>
                <h1>
                    Sistem Pendukung Keputusan Menentukan Kepuasan Pasien Terhadap Pelayanan Pasien BPJS RS PIM Menggunakan Metode CSI
                </h1>
            </div>
            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-green-700 shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
