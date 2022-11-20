<script>
    function toggleModal() {
        var deleteModal = document.getElementById("delete-modal");

        if (deleteModal.classList.contains('hidden')) {
            deleteModal.classList.remove('hidden');
            deleteModal.classList.add('block');
        } else {
            deleteModal.classList.remove('block');
            deleteModal.classList.add('hidden');
        }
    }
</script>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mijn Profiel') }}
        </h2>
    </x-slot>

    <div class="hidden relative z-10" id="delete-modal" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
      
        <div class="fixed inset-0 z-10 overflow-y-auto">
          <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
            <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
              <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                  <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                    <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M12 10.5v3.75m-9.303 3.376C1.83 19.126 2.914 21 4.645 21h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 4.88c-.866-1.501-3.032-1.501-3.898 0L2.697 17.626zM12 17.25h.007v.008H12v-.008z" />
                    </svg>
                  </div>
                  <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                    <h3 class="text-lg font-medium leading-6 text-gray-900" id="modal-title">Account verwijderen</h3>
                    <div class="mt-2">
                      <p class="text-sm text-gray-500">Weet je zeker dat je je account wilt verwijderen? Al uw gegevens worden permanent verwijderd. Deze actie kan niet ongedaan gemaakt worden.</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                <form class="m-0" action="{{ route('mijn-profiel') }}" method="POST">
                    @csrf
                    @method('post')

                    <button type="submit" class="inline-flex w-full justify-center rounded-md border border-transparent bg-red-600 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-red-500 focus:outline-none sm:ml-3 sm:w-auto sm:text-sm">Verwijderen</button>
                </form>
                <button onclick="toggleModal()" type="button" class="mt-3 underline text-gray-600 hover:text-gray-900 inline-flex w-full justify-center px-4 py-2 text-base font-medium focus:outline-none sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Annuleren</button>
              </div>
            </div>
          </div>
        </div>
    </div>

    <x-input-error messages="Profiel is succesvol geüpdate!" class="p-2 bg-green-300 !text-green-600 text-center font-bold" /> 

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="font-bold flex flex-wrap items-center justify-between">
                        <div>Mijn Profiel</div>
                        <div class="flex gap-3">
                            <a href="{{ route('profiel-bewerken') }}">
                                <x-primary-button>
                                    {{ __('Account Bewerken') }}
                                </x-primary-button>
                            </a>
                            <x-primary-button onclick="toggleModal()" class="bg-red-600 hover:bg-red-500 focus:bg-red-500 focus:border-red-500 active:bg-red-500 focus:ring-0">
                                {{ __('Account Verwijderen') }}
                            </x-primary-button>
                        </div>
                    </div>

                    <div class="mt-2">
                        <form method="POST">
                            @csrf
                            @method('PUT')

                            <div class="block sm:flex items-center gap-5">

                                <div>
                                    <div class="flex justify-center items-center">
                                        <div class="py-3 center m-auto">
                                            <div class="bg-white px-4 py-5 rounded-lg shadow-lg text-center w-48">
                                              <div>
                                                <img id="preview_image" class="w-24 h-24 max-w-lg mx-auto rounded-full object-cover object-center" src="images/users/{{ $user->path }}" alt="Avatar Upload" />
                                                <div class="flex flex-col text-[#FFD700] items-center justify-center">
                                                    @if ($user->review)
                                                        <div class="flex gap-1">
                                                            @foreach(range(1,5) as $i)
                                                                <span class="fa-stack" style="width:1em">
                                                                    <i class="far fa-star fa-stack-1x"></i>
                                                                    @if($user->review->stars > 0)
                                                                        @if($user->review->stars >0.5)
                                                                            <i class="fas fa-star fa-stack-1x"></i>
                                                                        @else
                                                                            <i class="fas fa-star-half fa-stack-1x"></i>
                                                                        @endif
                                                                    @endif
                                                                    @php $user->review->stars--; @endphp
                                                                </span>
                                                            @endforeach
                                                        </div>
                                                        <span class="text-sm text-black whitespace-nowrap">({{ $user->review->vote_amount }} stemmen)</span>
                                                 
                                                    @else

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

                                                    @endif
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                    </div>
                                </div>

                                <div class="grow">
                                    <div class="flex gap-5">
                                        <!-- First Name -->
                                        <div class="mt-4 basis-5/12">
                                            <x-input-label for="first_name" :value="__('Voornaam')" />
                        
                                            <x-text-input id="first_name" :disabled="true" class="block mt-1 w-full" type="text" name="first_name" value="{{ Auth::user()->first_name }}" required />
                                        </div>
                        
                                        <!-- Prefix Name -->
                                        <div class="mt-4 basis-2/12">
                                            <x-input-label for="prefix_name" :value="__('Tussenvoegsel')" />
                        
                                            <x-text-input id="prefix_name" :disabled="true" class="block mt-1 w-full" type="text" name="prefix_name" value="{{ Auth::user()->prefix_name }}"  />
                                        </div>
                        
                                        <!-- Last Name -->
                                        <div class="mt-4 basis-5/12">
                                            <x-input-label for="last_name" :value="__('Achternaam')" />
                        
                                            <x-text-input id="last_name" :disabled="true" class="block mt-1 w-full" type="text" name="last_name" value="{{ Auth::user()->last_name }}" required />
                                        </div>
                                    </div>
                        
                                    <!-- Email Address -->
                                    <div class="mt-4">
                                        <x-input-label for="email" :value="__('E-mailadres')" />
                        
                                        <x-text-input id="email" class="block mt-1 w-full" :disabled="true" type="email" name="email" value="{{ Auth::user()->email }}" required />
                                    </div>
                        
                                    <div class="flex gap-5">
                                        <!-- City -->
                                        <div class="mt-4 basis-5/6">
                                            <x-input-label for="city" :value="__('Plaatsnaam')" />
                            
                                            <x-text-input id="city" class="block mt-1 w-full" :disabled="true" type="text" name="city" value="{{ Auth::user()->city }}" required />
                                        </div>
                            
                                        <!-- Postal Code -->
                                        <div class="mt-4">
                                            <x-input-label for="postal_code" :value="__('Postcode')" />
                            
                                            <x-text-input id="postal_code" class="block mt-1 w-full" :disabled="true" type="text" name="postal_code" value="{{ Auth::user()->postal_code }}" required />
                                        </div>
                                    </div>
                        
                                    <div class="flex gap-5">
                                        <!-- Street Name -->
                                        <div class="mt-4 basis-5/6">
                                            <x-input-label for="street_name" :value="__('Straatnaam')" />
                        
                                            <x-text-input id="street_name" class="block mt-1 w-full" :disabled="true" type="text" name="street_name" value="{{ Auth::user()->street_name }}" required />
                                        </div>
                        
                                        <!-- House Number -->
                                        <div class="mt-4">
                                            <x-input-label for="house_number" :value="__('Huisnummer')" />
                        
                                            <x-text-input id="house_number" class="block mt-1 w-full" :disabled="true" type="number" name="house_number" value="{{ Auth::user()->house_number }}" required />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
