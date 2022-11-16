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

<script>
    // var images = JSON.parse("json_encode($advertisement->images)");
    // {} om advertisement heen
</script>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Eigen advertenties') }}
        </h2>
    </x-slot>

    <div class="py-12 items-center flex flex-col gap-2">
        <div class="max-w-full xl:max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="w-11/12 lg:w-5/5 m-auto flex flex-col lg:flex-row gap-2">
                <div class="flex flex-col gap-3 basis-9/12">
                    <div class="w-full flex flex-col lg:justify-between lg:space-x-10 lg:flex-row bg-white shadow p-4 rounded-lg items-center">
                        <div class="relative basis-full flex flex-col gap-2">
                            <div class="flex items-center gap-5 mb-2">
                                <div><i class="fa-solid fa-eye text-gray-600 opacity-50"></i>&nbsp; {{ $advertisement[0]->page_views }}</div>
                                <div><i class="fa-solid fa-heart text-gray-600 opacity-50"></i>&nbsp; 3</div>
                            </div>
                            <div class="img-display">
                                <div class="img-showcase">
                                  <img src="../images/advertisements/2/1.jpg">
                                  <img src="../images/advertisements/2/2.jpg">
                                  <img src="../images/advertisements/2/3.jpg">
                                </div>
                              </div>
                              <div class="img-select">
                                <div class="img-item">
                                  <a href="#" data-id="1">
                                    <img src="../images/advertisements/2/1.jpg">
                                  </a>
                                </div>
                                <div class="img-item">
                                  <a href="#" data-id="2">
                                    <img src = "../images/advertisements/2/2.jpg">
                                  </a>
                                </div>
                                <div class="img-item">
                                  <a href="#" data-id="3">
                                    <img src="../images/advertisements/2/3.jpg">
                                  </a>
                                </div>
                              </div>
                        </div>
    
                        <div class="space-y-5 p-5">
                            <div class="flex items-center justify-between">
                                <h4 class="text-xl font-semibold">Game Consoles</h4>
                                <div class="flex gap-1">
                                    <button class=" border border-white rounded-full hover:bg-white hover:text-red-600">
                                        <i class="py-2 px-3 rounded-full shadow fa-regular fa-heart text-xl"></i>
                                    </button>
                                    <button class=" border border-white rounded-full hover:bg-white text-red-600 hover:text-black">
                                        <i class="py-2 px-3 rounded-full shadow fa-solid fa-heart text-xl"></i>
                                    </button>
                                </div>
                            </div>
                            <h1 class="text-3xl font-bold">{{ $advertisement[0]->name }}</h1>
                            <h2 class="text-xl font-bold flex gap-3 items-center">
                                €75,- 
                                <span class="bg-[#F7F7F6] text-xs rounded-md p-1">Ophalen of verzenden</span>
                            </h2>
                            <div class="flex flex-col gap-1">
                                <p class="text-sm font-bold">Beschrijving</p>
                                <p class="text-sm">
                                    {{ $advertisement[0]->description }}
                                </p>
                            </div>

                            <div class="flex flex-col gap-1">
                                <p class="text-sm font-bold">Kenmerken</p>
                                <div class="text-sm">
                                    
                                    <table class="table-fixed">
                                        <tbody>
                                            @foreach($advertisement[0]->specifications as $specification )
                                                <tr>
                                                    <td class="w-14">{{$specification->specification_name}}</td>
                                                    <td class="w-7 text-[#EEA7AA] font-bold">:</td>
                                                    <td>{{$specification->specification_value}}</td>
                                                </tr>
                                            @endforeach                                          
                                        </tbody>
                                      </table>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full flex items-center shadow p-4 rounded-lg bg-white">
                        <div class="w-full flex flex-col">
                            <div class="relative flex flex-col sm:flex-row items-center justify-between gap-4">
                                <div class="flex gap-4">
                                    <div>
                                        <img src="/images/users/{{ $advertisement[0]->user->first_name }}-{{ $advertisement[0]->user->last_name}}.jpg" class="w-16 h-16 rounded-full"/>
                                    </div>
                                    <div class="flex flex-col justify-center gap-1">
                                        <h4 class="font-bold">{{ $advertisement[0]->user->first_name }} {{ $advertisement[0]->user->prefix_name}} {{ $advertisement[0]->user->last_name}}</h4>
                                        <h4 class="font-semibold text-sm">{{ $advertisement[0]->user->city }}, {{ $advertisement[0]->user->postal_code }}</h4>
                                    </div>
                                </div>
        
                                <div>
                                    <x-primary-button class="!bg-[#EEA766] hover:!bg-[#f0b27b] focus:!bg-[#f0b27b] focus:!border-[#f0b27b] active:!bg-[#f0b27b] focus:ring-0">
                                        <i class="fas fa-comments"></i>&nbsp;{{ __('Stuur een bericht') }}
                                    </x-primary-button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col basis-3/12 bg-white shadow p-4 rounded-lg">
                    <div>
                        <h4 class="font-bold text-xl">Biedingen</h4>
                    </div>
                    <div class="mt-2">
                        <div class="mb-2 relative">        
                            <x-text-input id="bidding_amount" name="bidding_amount" class="block pl-7 mt-1 w-full" type="text" required />
                            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                <span class="text-gray-500 sm:text-sm">€</span>
                            </div>
                        </div>
                        <x-primary-button class="w-full whitespace-nowrap justify-center !bg-[#EEA766] hover:!bg-[#f0b27b] focus:!bg-[#f0b27b] focus:!border-[#f0b27b] active:!bg-[#f0b27b] focus:ring-0">
                            <i class="fas fa-gavel"></i>&nbsp;{{ __('Plaats bod') }}
                        </x-primary-button>
                    </div>
                    <div class="mt-4 overflow-auto">
                        <div class="border border-t-[1px] border-gray-600 opacity-20"></div>
                        <div class="flex justify-between items-center mt-3">
                            <span class="truncate basis-2/6">Audrius Mosteika</span>
                            <span class="truncate">€ 150,00</span>
                            <span class="truncate">10 nov. '22</span>
                            
                        </div>
                        <div class="border border-t-[1px] border-gray-600 opacity-20 mt-3"></div>

                        <div class="flex justify-between items-center mt-3">
                            <span class="truncate basis-2/6">Audrius Mosteika</span>
                            <span class="truncate">€ 150,00</span>
                            <span class="truncate">10 nov. '22</span>
                            
                        </div>
                        <div class="border border-t-[1px] border-gray-600 opacity-20 mt-3"></div>

                        <div class="flex justify-between items-center mt-3">
                            <span class="truncate basis-2/6">Audrius Mosteika</span>
                            <span class="truncate">€ 150,00</span>
                            <span class="truncate">10 nov. '22</span>
                            
                        </div>
                        <div class="border border-t-[1px] border-gray-600 opacity-20 mt-3"></div>

                        <div class="flex justify-between items-center mt-2">
                            <span class="truncate basis-2/6">Audrius Mosteika</span>
                            <span class="truncate">€ 150,00</span>
                            <span class="truncate">10 nov. '22</span>
                            
                        </div>
                        <div class="border border-t-[1px] border-gray-600 opacity-20 mt-3"></div>

                        <div class="flex justify-between items-center mt-3">
                            <span class="truncate basis-2/6">Audrius Mosteika</span>
                            <span class="truncate">€ 150,00</span>
                            <span class="truncate">10 nov. '22</span>
                            
                        </div>
                        <div class="border border-t-[1px] border-gray-600 opacity-20 mt-3"></div>

                        <div class="flex justify-between items-center mt-3">
                            <span class="truncate basis-2/6">Audrius Mosteika</span>
                            <span class="truncate">€ 150,00</span>
                            <span class="truncate">10 nov. '22</span>
                            
                        </div>
                        <div class="border border-t-[1px] border-gray-600 opacity-20 mt-3"></div>

                        <div class="flex justify-between items-center mt-3">
                            <span class="truncate basis-2/6">Audrius Mosteika</span>
                            <span class="truncate">€ 150,00</span>
                            <span class="truncate">10 nov. '22</span>
                            
                        </div>
                        <div class="border border-t-[1px] border-gray-600 opacity-20 mt-3"></div>

                        <div class="flex justify-between items-center mt-3">
                            <span class="truncate basis-2/6">Audrius Mosteika</span>
                            <span class="truncate">€ 150,00</span>
                            <span class="truncate">10 nov. '22</span>
                            
                        </div>
                        <div class="border border-t-[1px] border-gray-600 opacity-20 mt-3"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
