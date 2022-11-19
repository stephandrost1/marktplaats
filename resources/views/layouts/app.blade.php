<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }} - {{ str_replace('-', ' ', ucfirst(Route::currentRouteName())); }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-[#F7F7F6]">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (Request::is('advertenties'))
                <form action="{{ route('advertenties') }}" method="POST">
                    @csrf

                    <header class="bg-white shadow">
                        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex justify-center">
                            <div class="flex flex-wrap items-center justify-center gap-1 sm:gap-5">            
                                <x-text-input placeholder="Trefwoord" id="term" class="block w-52" type="text" name="term" :value="old('term')" />
                                <select class="block w-52 rounded-md shadow-sm border-gray-300 focus:border-[#EEA766] focus:ring focus:ring-[#EEA766] focus:ring-opacity-50">
                                    <option selected="true" disabled="disabled">Kies een categorie</option>    
                                    <option>Lego</option>
                                    <option>Schoenen</option>
                                    <option>Truien</option>
                                </select>
                                <button type="submit" class="h-10 !bg-[#EEA766] hover:!bg-[#f0b27b] focus:!bg-[#f0b27b] focus:!border-[#f0b27b] active:!bg-[#f0b27b] focus:ring-0 text-white w-52 sm:w-auto sm:px-10 rounded-md shadow-sm font-bold">Zoek</button>
                            </div>
                        </div>
                    </header>
                </form>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
