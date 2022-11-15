<style>
    img{
    width: 100%;
    display: block;
    }
    .img-display{
        overflow: hidden;
    }
    .img-showcase{
        display: flex;
        width: 100%;
        transition: all 0.5s ease;
    }
    .img-showcase img{
        min-width: 100%;
    }
    .img-select{
        display: flex;
    }
    .img-item{
        margin: 0.3rem;
    }
    .img-item:nth-child(1),
    .img-item:nth-child(2),
    .img-item:nth-child(3){
        margin-right: 0;
    }
    .img-item:hover{
        opacity: 0.8;
    }
</style>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Eigen advertenties') }}
        </h2>
    </x-slot>

    <div class="py-12 items-center flex flex-col gap-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="w-11/12 lg:w-4/5 m-auto flex flex-col sm:flex-row gap-2">
                <div class="flex flex-col gap-3 basis-10/12">
                    <div class="basis-9/12 w-full flex flex-col lg:justify-between lg:space-x-10 lg:flex-row bg-white shadow p-4 rounded-lg items-center">
                        <div class="relative basis-11/12 flex flex-col gap-2">
                            <div class="img-display">
                                <div class="img-showcase">
                                  <img src="images/advertisements/2/1.jpg">
                                  <img src="images/advertisements/2/2.jpg">
                                  <img src="images/advertisements/2/3.jpg">
                                </div>
                              </div>
                              <div class="img-select">
                                <div class="img-item">
                                  <a href="#" data-id="1">
                                    <img src="images/advertisements/2/1.jpg">
                                  </a>
                                </div>
                                <div class="img-item">
                                  <a href="#" data-id="2">
                                    <img src = "images/advertisements/2/2.jpg">
                                  </a>
                                </div>
                                <div class="img-item">
                                  <a href="#" data-id="3">
                                    <img src="images/advertisements/2/3.jpg">
                                  </a>
                                </div>
                              </div>
                        </div>
    
                        <div class="space-y-5 p-5">
                            <div class="flex items-center justify-between">
                                <h4 class="text-xl font-semibold">Game Consoles</h4>
                                <button class=" border border-white rounded-full hover:bg-white hover:text-red-600">
                                    <i class="py-2 px-3 rounded-full shadow fa-regular fa-heart text-xl"></i>
                                </button>
                            </div>
                            <h1 class="text-3xl font-bold">Xbox One S</h1>
                            <h2 class="text-xl font-bold">€75,-</h2>
                            <p class="text-sm font-semibold">Beschrijving</p>
                            <p class="text-sm">
                                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Enim quaerat accusantium, sed maiores deleniti, tenetur, dolores assumenda quibusdam quos ducimus est rerum eligendi?
                            </p>
                        </div>
                    </div>
                    <div class="w-full flex items-center shadow p-4 rounded-lg bg-white">
                        <div class="w-full flex flex-col">
                            <div class="relative basis-11/12 flex flex-col sm:flex-row items-center justify-between gap-4">
                                <div class="flex gap-4">
                                    <div>
                                        <img src="images/users/john-doe.jpg" class="w-16 h-16 rounded-full"/>
                                    </div>
                                    <div class="flex flex-col justify-center gap-1">
                                        <h4 class="font-bold">Daan van Hell</h4>
                                        <h4 class="font-semibold text-sm">Woudenberg, 3902GX</h4>
                                    </div>
                                </div>
        
                                <div>
                                    <x-primary-button class="!bg-[#EEA766] hover:!bg-[#f0b27b] focus:!bg-[#f0b27b] focus:!border-[#f0b27b] active:!bg-[#f0b27b] focus:ring-0">
                                        <i class="far fa-comments"></i>&nbsp;{{ __('Stuur een bericht') }}
                                    </x-primary-button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex basis-2/12">
                    Test
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
