<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Advertenties') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h4 class="mb-4 font-bold text-3xl">Favorieten advertenties</h4>
            @if (count($favorites) <= 0)
                <div class="text-center">
                    Je hebt nog geen favorieten advertenties! Like een advertentie om ze hier op te slaan!
                </div>
            @endif

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 w-full">

                @foreach ($favorites as $favorite) 
                    <x-favorite-card :favorite="$favorite"></x-favorite-card>
                @endforeach

              </div>
        </div>
    </div>
</x-app-layout>
