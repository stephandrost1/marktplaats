<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Advertenties') }}
        </h2>
    </x-slot>

    <form action="{{ route('advertenties') }}" method="POST">
        @csrf

        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex justify-center">
                <div class="flex flex-wrap items-center justify-center gap-1 sm:gap-5">            
                    <x-text-input placeholder="Trefwoord" id="term" class="block w-52" type="text" name="term" :value="old('term')" />
                    <select id="categorie" name="categorie" class="block w-52 rounded-md shadow-sm border-gray-300 focus:border-[#EEA766] focus:ring focus:ring-[#EEA766] focus:ring-opacity-50">
                        <option selected="true" disabled="disabled">Kies een categorie</option>    
                        @foreach ($categories as $categorie)
                            <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="h-10 !bg-[#EEA766] hover:!bg-[#f0b27b] focus:!bg-[#f0b27b] focus:!border-[#f0b27b] active:!bg-[#f0b27b] focus:ring-0 text-white w-52 sm:w-auto sm:px-10 rounded-md shadow-sm font-bold">Zoek</button>
                </div>
            </div>
        </header>
    </form>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h4 class="mb-4 font-bold text-3xl">Alle advertenties</h4>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 w-full">

                @foreach ($advertisements as $advertisement) 
                    <x-card :advertisement="$advertisement"></x-card>
                @endforeach

              </div>
        </div>
    </div>
</x-app-layout>
