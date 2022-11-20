<script>
    setTimeout(function() {
        $('#succesMessage').fadeOut('fast');
    }, 3000);
</script>

<style>
    #progressBar {
        animation: fill 3s linear 1;
        --tw-bg-opacity: 1;
        background-color: rgb(220 252 231 / var(--tw-bg-opacity));
    }

    @keyframes fill {
        0% {
            width: 0%;
        }
        100% {
            width: 100%;
        }
    }
</style>

<div id="succesMessage" class="absolute top-20 min-w-[20rem] right-4 z-10 bg-green-100 border-l-4 border-green-500 rounded-r-md text-green-700 rounded-tr-md w-min" role="alert">
    <div class="pt-4 pl-4 pr-4 mb-2">
        <p class="font-bold whitespace-nowrap">Gelukt</p>
        <p class="whitespace-nowrap">{{ session('succesMsg') }}</p>
    </div>

    <div class="bg-green-500 z-10 rounded-br-md h-2 w-full" role="alert">
        <div id="progressBar" class="h-full w-full"></div>
    </div>
</div>

