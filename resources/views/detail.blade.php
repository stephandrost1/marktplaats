<style>
    img{
    width: 100%;
    display: block;
    }

    .img-showcase{
        display: flex;
        width: 100%;
        transition: all 0.5s ease;
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
    <script>
        $(document).ready(function(e)  {
            $('.img-select img').on("click", function(){
            $('#mainImage').attr('src', $(this).attr('src'));
        });
        });
    
       function favorite() {
            
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            }
        });
    
        $.ajax( {
                url:'/favorite',
                method:'POST',
                data: {
                    ad_id: '{{ $advertisement->id}}',
                },
                success: function( updated ) { 
                    if( updated ) { 
                        $(".favorite-buttons").load(" .favorite-buttons > *");
                    }
                },  
                fail: function() {
                    alert('NO');
                }   
            }); 
        }
    </script>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Eigen advertenties') }}
        </h2>
    </x-slot>

    @if(session()->has('succesMsg'))
        <x-succes-flash-message></x-succes-flash-message>
    @endif
    @if(session()->has('failedMsg'))
        <x-failed-flash-message></x-failed-flash-message>
    @endif
    

    <div class="py-12 items-center flex flex-col gap-2">
        <div class="max-w-full xl:max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="w-11/12 min-[920px]:flex-row lg:w-5/5 m-auto flex flex-col gap-2">
                <div class="flex flex-col gap-3 basis-11/12">
                    <div class="w-full flex flex-col lg:justify-between lg:space-x-10 lg:flex-row bg-white shadow p-4 rounded-lg items-center">
                        <div class="relative basis-6/12 flex flex-col gap-2">
                            <div class="flex items-center gap-5 mb-2">
                                <div><i class="fa-solid fa-eye text-gray-600 opacity-50"></i>&nbsp; {{ $advertisement->page_views }}</div>
                                <div><i class="fa-solid fa-heart text-gray-600 opacity-50 "></i>&nbsp; <span class="favorite-counter">{{ count($advertisement->favorites ) }}</span></div>
                            </div>
                            <div class="img-display">
                                <div class="img-showcase">
                                    @foreach  ($advertisement->images as $image)
                                        <img id="mainImage" class="rounded-md block" src="../images/advertisements/2/{{ $image->path }}">
                                    @break
                                    @endforeach
                                </div>
                                </div>
                                <div class="img-select">
                                    @foreach  ($advertisement->images as $image)
                                        <div class="img-item">
                                            <img class="rounded-md preview cursor-pointer" src="../images/advertisements/2/{{ $image->path }}">
                                        </div>
                                    @endforeach
                              </div>
                        </div>

                        
    
                        <div class="space-y-5 basis-6/12 w-full p-5">
                            <div class="flex items-center justify-between favorite-buttons">
                                <h4 class="text-xl font-semibold">Game Consoles</h4>
                                <div class="flex gap-1">
                                    @if (Auth::user() && Auth::user()->id !== $advertisement->user->id)
                                        @if (Auth::user() && in_array(Auth::user()->id, $favorites))
                                            <button onclick="favorite()" class=" border border-white rounded-full hover:bg-white text-red-600 hover:text-black">
                                                <i class="py-2 px-3 rounded-full shadow fa-solid fa-heart text-xl"></i>
                                            </button>
                                        @elseif (Auth::user())
                                            <button onclick="favorite()" class=" border border-white rounded-full hover:bg-white hover:text-red-600">
                                                <i class="py-2 px-3 rounded-full shadow fa-regular fa-heart text-xl"></i>
                                            </button>
                                        @else 
                                        @endif
                                    @endif
                                </div>
                            </div>
                            <h1 class="text-3xl font-bold">{{ $advertisement->name }}</h1>
                            <h2 class="text-xl font-bold flex gap-3 items-center">
                                €75,- 
                                <span class="bg-[#F7F7F6] text-xs rounded-md p-1">{{ $advertisement->sending_type }}</span>
                            </h2>
                            <div class="flex flex-col gap-1">
                                <p class="text-sm font-bold">Beschrijving</p>
                                <p class="text-sm">
                                    {{ $advertisement->description }}
                                </p>
                            </div>

                            <div class="flex flex-col gap-1">
                                <p class="text-sm font-bold">Kenmerken</p>
                                <div class="text-sm">
                                    
                                    <table class="table-fixed">
                                        <tbody>
                                            @foreach($advertisement->specifications as $specification)
                                                <tr>
                                                    <td class="w-14 font-semibold">{{$specification->specification_name}}</td>
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
                                    <div class="w-16 h-16 rounded-full">
                                        <img src="/images/users/{{ $advertisement->user->path }}" class="w-16 h-16 rounded-full"/>
                                    </div>
                                    <div class="flex flex-col justify-center gap-1">
                                        <div class="flex flex-col">
                                            <h4 class="font-bold">
                                                {{ $advertisement->user->first_name }} {{ $advertisement->user->prefix_name}} {{ $advertisement->user->last_name}}
                                            </h4>
                                            <h4 class="font-semibold text-sm">
                                                {{ $advertisement->user->city }}, {{ $advertisement->user->postal_code }}
                                            </h4>
                                        </div>

                                        <div class="flex flex-row gap-1 items-center text-[#FFD700]">
                                            @if ($average_stars)
                                                
                                            <div class="flex gap-1">
                                                @foreach(range(1,5) as $i)
                                                    <span class="fa-stack" style="width:1em">
                                                        <i class="far fa-star fa-stack-1x"></i>
                                                        @if($average_stars > 0)
                                                            @if($average_stars >0.5)
                                                                <i class="fas fa-star fa-stack-1x"></i>
                                                            @else
                                                                <i class="fas fa-star-half fa-stack-1x"></i>
                                                            @endif
                                                        @endif
                                                        @php $average_stars--; @endphp
                                                    </span>
                                                @endforeach
                                            </div>
                                                <span class="text-sm text-black whitespace-nowrap">({{count($reviews)}} stemmen)</span>
                                            @else

                                            <div class="flex gap-1">
                                                <span class="fa-stack" style="width:1em">
                                                    <i class="far fa-star fa-stack-1x"></i>
                                                </span><span class="fa-stack" style="width:1em">
                                                    <i class="far fa-star fa-stack-1x"></i>
                                                </span><span class="fa-stack" style="width:1em">
                                                    <i class="far fa-star fa-stack-1x"></i>
                                                </span><span class="fa-stack" style="width:1em">
                                                    <i class="far fa-star fa-stack-1x"></i>
                                                </span><span class="fa-stack" style="width:1em">
                                                    <i class="far fa-star fa-stack-1x"></i>
                                                </span>
                                            </div>
                                            <span class="text-sm text-black whitespace-nowrap">
                                                (
                                                @if($advertisement->user->reviews){{count($reviews)}}
                                                @else 0 
                                                @endif
                                                stemmen )
                                            </span>
                                            @endif
                                            
                                            
                                                
                                        </div>
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

                <div class="flex flex-col basis-1/12 bg-white shadow p-4 rounded-lg min-w-fit">
                    <div>
                        <h4 class="font-bold text-xl">Biedingen</h4>
                    </div>
                    <form class="mt-2 mb-0" method="POST">
                        @csrf
                        <div class="mb-2 relative">        
                            <x-text-input :disabled="!Auth::user() || $advertisement->user_id == Auth::user()->id" id="bidding_amount" name="bidding_amount" class="block pl-7 mt-1 w-full" type="number" required/>
                            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                <span class="text-gray-500 sm:text-sm">€</span>
                            </div>
                        </div>
                        <x-primary-button :disabled="!Auth::user() || $advertisement->user_id == Auth::user()->id" class="w-full whitespace-nowrap justify-center !bg-[#EEA766] hover:!bg-[#f0b27b] focus:!bg-[#f0b27b] focus:!border-[#f0b27b] active:!bg-[#f0b27b] focus:ring-0" type="submit">
                            <i class="fas fa-gavel"></i>&nbsp;{{ __('Plaats bod') }}
                        </x-primary-button>
                        @if($errors->has('succes'))
                            <x-input-error messages="Bod geplaatst!" class="mt-2 !text-green-600 text-center font-bold" />   
                        @endif
                        @if($errors->has('failed'))
                            <x-input-error messages="Bod moet hoger zijn dan huidige hoogste bod!" class="mt-2 text-center font-bold" />
                        @endif
                    </form>
                    <div class="mt-4 overflow-auto min-w-fit">
                        <div class="border border-t-[1px] border-gray-600 opacity-20"></div>
                        
                        @foreach ($advertisement->bids as $bid)
                            <div class="mt-3 grid grid-cols-3 gap-4">
                                <div class="truncate text-center">{{ $bid->user->first_name }} {{ $bid->user->prefix_name }} {{ $bid->user->last_name }}</div>
                                <div class="text-center">€ {{ preg_replace('/\.(\d{3})/', ',$1', $bid->bid) }}</div>
                                <div class="text-center">{{ \Carbon\Carbon::parse($bid->created_at)->isoFormat("D MMM 'YY") }}</div>
                            </div>
                            <div class="border border-t-[1px] border-gray-600 opacity-20 mt-3"></div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>