{{-- <div 
    x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)"
    class="flex absolute top-20 left-5 bg-white flex-row shadow-md border border-gray-100 rounded-lg overflow-hidden md:w-2/12"
>
    <div class="flex w-5 bg-gradient-to-t from-green-700 to-green-600"></div>
    <div class="flex-1 p-3">
        <h1 class="md:text-xl text-gray-600">Gelukt</h1>
        <p class="text-gray-400 text-xs md:text-sm font-light">Bod is geplaatst{{ session('succesMsg') }}!</p>
    </div>
</div> --}}

<div class="bg-green-100 rounded-lg py-5 px-6 mb-3 text-base text-green-700 inline-flex items-center w-full" role="alert">
    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check-circle" class="w-4 h-4 mr-2 fill-current" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
      <path fill="currentColor" d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z"></path>
    </svg>
    Bod is geplaatst!
  </div>