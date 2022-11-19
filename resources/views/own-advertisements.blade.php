<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Eigen advertenties') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h4 class="mb-4 font-bold text-3xl">Jouw advertenties</h4>
            @if (count($advertisements) <= 0)
                <div class="text-center">
                    Je hebt nog geen advertenties! 
                    <a href="{{ route('plaats-advertentie') }}" class="underline cursor-pointer">Plaats een advertentie.</a>
                </div>
            @endif

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 w-full">
                @foreach ($advertisements as $advertisement) 
                    <x-card :advertisement="$advertisement"></x-card>
                @endforeach

              </div>
        </div>
    </div>
</x-app-layout>
