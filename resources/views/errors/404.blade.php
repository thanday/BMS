<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }} | Error 404</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/6.5.95/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body>
    <!-- Page Container -->
<!-- component -->
<div class="lg:px-24 lg:py-24 md:py-20 md:px-44 px-4 py-24 items-center flex justify-center flex-col-reverse lg:flex-row md:gap-28 gap-16">
    <div class="xl:pt-24 w-full xl:w-1/2 relative pb-12 lg:pb-0">
        <div class="relative">
            <div class="absolute">
                <div class="">
                    <h1 class="my-2 text-gray-800 font-bold text-2xl">
                        Looks like you've found the
                        doorway to the great nothing
                    </h1>
                    <p class="my-2 text-gray-800">Sorry about that! Please visit our dashboard to get where you need to go.</p>
                    <button class="sm:w-full mt-6 lg:w-auto my-2 border rounded md py-4 px-8 text-center bg-blue-600 text-white hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-indigo-700 focus:ring-opacity-50">
                        <a href="/"
                    class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white">
                    <span
                        class="pb-1 md:pb-0 text-xs md:text-base no-underline">Take me to Home</span>
                </a>
                    </button>
                </div>
            </div>
            <div>
                
                <img src="https://i.ibb.co/G9DC8S0/404-2.png" />
            </div>
        </div>
    </div>
    <div class="mt-6">
        <h1 class="text-5xl mr-8 text-blue-200"><span class="text-7xl text-blue-800">O</span><span class="text-6xl text-blue-600">o</span><span class="text-5xl text-blue-500">o</span><span class="text-4xl text-blue-400">p</span><span class="text-3xl text-blue-300">s</span>...</h1>
        <img class="w-32 md:w-6/12 lg:w-6/12" src="{{ asset('images/404.jpeg') }}" />
    </div>
</div>
</body>
</html>