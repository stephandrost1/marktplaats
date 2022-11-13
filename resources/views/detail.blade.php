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

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="w-11/12 lg:w-4/5 m-auto flex items-center shadow p-4 rounded-lg bg-white">
                <div class="w-full flex flex-col lg:justify-between lg:space-x-10 lg:flex-row items-center">
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
                        <h4 class="text-xl font-semibold">Shirts</h4>
                        <h1 class="text-3xl font-bold">Men's Shirts</h1>
                        <h2 class="text-xl font-bold">$43</h2>
                        <p class="text-sm">description</p>
                        <p class="text-sm">
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Enim quaerat accusantium, sed maiores deleniti, tenetur, dolores assumenda quibusdam quos ducimus est rerum eligendi?
                        </p>
                        <div class="space-y-5">
                            <input class="w-24 h-8 px-3 border border-gray-600" type="number" id="amount">
                            <div>
                                <button class="w-8 h-8 bg-red-500 rounded-full shadow-xl"></button>
                                <button class="w-8 h-8 bg-red-500 rounded-full shadow-xl"></button>
                                <button class="w-8 h-8 bg-red-500 rounded-full shadow-xl"></button>
                                <button class="w-8 h-8 bg-red-500 rounded-full shadow-xl"></button>
                            </div>
                            <div class="space-x-5 flex items-center">
                                <button class="flex items-center space-x-2 border border-rose-400 px-5 py-2 rounded-md hover:bg-rose-400 hover:text-white">
                                    <i class="fa-regular fa-heart text-xl"></i>
                                    <span>Favorites</span>
                                </button>
                                <button class="bg-rose-400 px-5 py-2 rounded-md text-white hover:bg-white hover;Border hover:border-gray-600  hover:text-black">
                                    <i class="fa-solid fa-cart-shopping"></i>
                                    <span>Add To Cart</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
