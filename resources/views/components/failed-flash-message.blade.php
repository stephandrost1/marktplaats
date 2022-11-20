<div 
    x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)"
    class="flex absolute top-20 left-5 bg-white flex-row shadow-md border border-gray-100 rounded-lg overflow-hidden md:w-2/12"
>
    <div class="flex w-5 bg-gradient-to-t from-red-700 to-red-600"></div>
    <div class="flex-1 p-3">
        <h1 class="md:text-xl text-gray-600">Er is iets misgegaan</h1>
        <p class="text-gray-400 text-xs md:text-sm font-light">{{ session('failedMsg') }}!</p>
    </div>
</div>