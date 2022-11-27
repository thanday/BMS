<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }} | Error 403</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/6.5.95/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>

<body>
    <!-- Page Container -->
    <!-- component -->
    <!-- component -->
    <main class="h-screen w-full flex flex-col justify-center items-center bg-[#1A2238]">
        <h1 class="text-9xl font-extrabold text-white tracking-widest">403</h1>
        <div class="bg-blue-500 px-2 text-sm rounded rotate-12 absolute">
            Page forbidden
        </div>
       
        <button class="mt-5">
            <a href="/"
                class="relative inline-block text-sm font-medium text-white group active:text-orange-500 focus:outline-none focus:ring">
                <span
                    class="absolute inset-0 transition-transform translate-x-0.5 translate-y-0.5 bg-blue-800 group-hover:translate-y-0 group-hover:translate-x-0"></span>

                <span class="relative block px-8 py-3 bg-blue-600 border border-current">
                    Go Home
                </span>
            </a>
        </button>
    </main>
</body>

</html>
