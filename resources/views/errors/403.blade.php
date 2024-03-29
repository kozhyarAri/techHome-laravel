<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-screen w-screen justify-center items-center flex">
    <div class="flex flex-col">
        <a class="text-5xl mx-auto hover:scale-105 bg-slate-400 rounded-xl p-2" href="{{ route('index') }}">-->Home<--</a>
        <img class="w-96" src="https://www.svgrepo.com/show/503021/error.svg" alt="">
    </div>
</body>
</html>