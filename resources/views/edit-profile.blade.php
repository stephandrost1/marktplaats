<style>
    .password-icon {
        float: right;
        margin-right: 15px;
        margin-top: -30px;
        position: relative;
        z-index: 2;
        color: rgb(31 41 55);
        font-size: large;
        cursor: pointer;
    }
</style>

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

    function togglePasswordVisibility(input) {
        if (input == 1) {
            var input = document.getElementById("new_password");
            var icon = document.getElementById("new_passwordIcon")
        } else if (input == 2) {
            var input = document.getElementById("confirm_new_password");
            var icon = document.getElementById("confirm_new_passwordIcon")
        } else {
            var input = document.getElementById("password");
            var icon = document.getElementById("passwordIcon")
        }
      
        if (input.type === "password") {
        input.type = "text";
        icon.classList.remove("fa-eye");
        icon.classList.add("fa-eye-slash");
        } else {
        input.type = "password";
        icon.classList.remove("fa-eye-slash");
        icon.classList.add("fa-eye");
        }
    }
    </script>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mijn Profiel') }}
        </h2>
    </x-slot>

    @if(session()->has('failedMsg'))
        <x-failed-flash-message></x-failed-flash-message>
    @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="font-bold flex flex-wrap items-center justify-between">
                        <div>Profiel Bewerken</div>
                    </div>

                    <div class="mt-2">
                        <form method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="block sm:flex items-center gap-5">

                                <div>
                                    <div class="flex justify-center items-center">
                                        <div class="py-3 center m-auto">
                                            <div class="bg-white px-4 py-5 rounded-lg shadow-lg text-center w-48">
                                              <div class="mb-4">
                                                <img id="preview_image" class="w-24 h-24 max-w-lg mx-auto rounded-full object-cover object-center" src="images/users/{{ $user->path }}" alt="Avatar Upload" />
                                              </div>
                                              <label class="cursor-pointer mt-6">
                                                <span class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150" >Profielfoto selecteren</span>
                                                <input type='file' name="profile_image" id="profile_image" class="hidden" :multiple="multiple" :accept="accept" onchange="document.getElementById('preview_image').src = window.URL.createObjectURL(this.files[0])" />
                                              </label>
                                            </div>
                                          </div>
                                    </div>
                                </div>

                                <div class="grow">
                                    <div class="flex gap-5">
                                        <!-- First Name -->
                                        <div class="mt-4 basis-5/12">
                                            <x-input-label for="first_name" :value="__('Voornaam')" />
                        
                                            <x-text-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" value="{{ Auth::user()->first_name }}" />
                        
                                            <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
                                        </div>
                        
                                        <!-- Prefix Name -->
                                        <div class="mt-4 basis-2/12">
                                            <x-input-label for="prefix_name" :value="__('Tussenvoegsel')" />
                        
                                            <x-text-input id="prefix_name" class="block mt-1 w-full" type="text" name="prefix_name" value="{{ Auth::user()->prefix_name }}"  />
                        
                                            <x-input-error :messages="$errors->get('prefix_name')" class="mt-2" />
                                        </div>
                        
                                        <!-- Last Name -->
                                        <div class="mt-4 basis-5/12">
                                            <x-input-label for="last_name" :value="__('Achternaam')" />
                        
                                            <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" value="{{ Auth::user()->last_name }}" />
                        
                                            <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
                                        </div>
                                    </div>
                        
                                    <!-- Email Address -->
                                    <div class="mt-4">
                                        <x-input-label for="email" :value="__('E-mailadres')" />
                        
                                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{ Auth::user()->email }}" />
                        
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                    </div>
                        
                                    <div class="flex gap-5">
                                        <!-- City -->
                                        <div class="mt-4 basis-5/6">
                                            <x-input-label for="city" :value="__('Plaatsnaam')" />
                            
                                            <x-text-input id="city" class="block mt-1 w-full" type="text" name="city" value="{{ Auth::user()->city }}" />
                            
                                            <x-input-error :messages="$errors->get('city')" class="mt-2" />
                                        </div>
                            
                                        <!-- Postal Code -->
                                        <div class="mt-4">
                                            <x-input-label for="postal_code" :value="__('Postcode')" />
                            
                                            <x-text-input id="postal_code" class="block mt-1 w-full" type="text" name="postal_code" value="{{ Auth::user()->postal_code }}" />
                            
                                            <x-input-error :messages="$errors->get('postal_code')" class="mt-2" />
                                        </div>
                                    </div>
                        
                                    <div class="flex gap-5">
                                        <!-- Street Name -->
                                        <div class="mt-4 basis-5/6">
                                            <x-input-label for="street_name" :value="__('Straatnaam')" />
                        
                                            <x-text-input id="street_name" class="block mt-1 w-full" type="text" name="street_name" value="{{ Auth::user()->street_name }}" />
                        
                                            <x-input-error :messages="$errors->get('street_name')" class="mt-2" />
                                        </div>
                        
                                        <!-- House Number -->
                                        <div class="mt-4">
                                            <x-input-label for="house_number" :value="__('Huisnummer')" />
                        
                                            <x-text-input id="house_number" class="block mt-1 w-full" type="number" name="house_number" value="{{ Auth::user()->house_number }}" />
                        
                                            <x-input-error :messages="$errors->get('house_number')" class="mt-2" />
                                        </div>
                                    </div>
                        
                                    <!-- Password -->
                                    <div class="mt-4">
                                        <x-input-label for="new_password" :value="__('Nieuw wachtwoord')" />
                        
                                        <x-text-input id="new_password" class="block mt-1 w-full"
                                                        type="password"
                                                        name="new_password"
                                                        />
                        
                                        <x-input-error :messages="$errors->get('new_password')" class="mt-2" />
                                        <i id="new_passwordIcon" class="fas fa-eye password-icon" onclick="togglePasswordVisibility(1)"></i>
                                    </div>
                        
                                    <!-- Confirm Password -->
                                    <div class="mt-4">
                                        <x-input-label for="confirm_new_password" :value="__('Nieuw wachtwoord herhalen')" />
                        
                                        <x-text-input id="confirm_new_password" class="block mt-1 w-full"
                                                        type="password"
                                                        name="confirm_new_password" />
                        
                                        <x-input-error :messages="$errors->get('confirm_new_password')" class="mt-2" />
                                        <i id="confirm_new_passwordIcon" class="fas fa-eye password-icon" onclick="togglePasswordVisibility(2)"></i>
                                    </div>
        
                                    <!-- Current Password -->
                                    <div class="mt-4">
                                        <x-input-label for="password" :value="__('Huidig wachtwoord')" />
                        
                                        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required />
                        
                                        <x-input-error id="password" :messages="$errors->get('password')" class="mt-2" />
                                        <i id="passwordIcon" class="fas fa-eye password-icon" onclick="togglePasswordVisibility(3)"></i>
                                    </div>
                                    @if($errors->has('failed'))
                                        <x-input-error messages="Het ingevoerde wachtwoord is onjuist!" class="mt-2 text-center font-bold" />
                                    @endif
                                </div>
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <a href="{{ route('mijn-profiel') }}" class="cursor-pointer underline text-sm text-gray-600 hover:text-gray-900">
                                    {{ __('Annuleren') }}
                                </a>
                
                                <x-primary-button type="submit" class="ml-4 bg-green-700 hover:bg-green-600 focus:bg-green-600 focus:border-green-600 active:bg-green-600 focus:ring-0">
                                    {{ __('Opslaan') }}
                                </x-primary-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
