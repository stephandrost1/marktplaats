<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.0/dist/alpine.min.js" defer></script>

<script src="https://cdn.jsdelivr.net/gh/alpine-collective/alpine-magic-helpers@0.3.x/dist/index.js"></script>

<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <form method="POST" enctype="multipart/form-data" action="{{ route('register') }}">
            @csrf

            <div class="block sm:flex gap-5">
                <div class="flex items-center">
                    <div class="py-3 center m-auto">
                        <div class="bg-white px-4 py-5 rounded-lg shadow-lg text-center w-48">
                          <div class="mb-4">
                            <img id="preview_image" class="w-24 h-24 max-w-lg mx-auto rounded-full object-cover object-center" src="https://i1.pngguru.com/preview/137/834/449/cartoon-cartoon-character-avatar-drawing-film-ecommerce-facial-expression-png-clipart.jpg" alt="Avatar Upload" />
                          </div>
                          <label class="cursor-pointer mt-6">
                            <span class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150" >Profielfoto selecteren</span>
                            <input type='file' name="profile_image" accept="image/*" id="profile_image" class="hidden" :multiple="multiple" :accept="accept" onchange="document.getElementById('preview_image').src = window.URL.createObjectURL(this.files[0])" />
                          </label>
                        </div>
                      </div>
                </div>

                <div>
                    <div class="flex gap-5">
                        <!-- First Name -->
                        <div class="mt-4">
                            <x-input-label for="first_name" :value="__('Voornaam')" />
        
                            <x-text-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name')" required />
        
                            <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
                        </div>
        
                        <!-- Prefix Name -->
                        <div class="mt-4">
                            <x-input-label for="prefix_name" :value="__('Tussenvoegsel')" />
        
                            <x-text-input id="prefix_name" class="block mt-1 w-full" type="text" name="prefix_name" :value="old('prefix_name')"  />
        
                            <x-input-error :messages="$errors->get('prefix_name')" class="mt-2" />
                        </div>
        
                        <!-- Last Name -->
                        <div class="mt-4">
                            <x-input-label for="last_name" :value="__('Achternaam')" />
        
                            <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')" required />
        
                            <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
                        </div>
                    </div>
        
                    <!-- Email Address -->
                    <div class="mt-4">
                        <x-input-label for="email" :value="__('E-mailadres')" />
        
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
        
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
        
                    <!-- City -->
                    <div class="mt-4">
                        <x-input-label for="city" :value="__('Plaatsnaam')" />
        
                        <x-text-input id="city" class="block mt-1 w-full" type="text" name="city" :value="old('city')" required />
        
                        <x-input-error :messages="$errors->get('city')" class="mt-2" />
                    </div>
        
                    <!-- Postal Code -->
                    <div class="mt-4">
                        <x-input-label for="postal_code" :value="__('Postcode')" />
        
                        <x-text-input id="postal_code" class="block mt-1 w-full" type="text" name="postal_code" :value="old('postal_code')" required />
        
                        <x-input-error :messages="$errors->get('postal_code')" class="mt-2" />
                    </div>
        
                    <div class="flex gap-5">
                        <!-- Street Name -->
                        <div class="mt-4 basis-5/6">
                            <x-input-label for="street_name" :value="__('Straatnaam')" />
        
                            <x-text-input id="street_name" class="block mt-1 w-full" type="text" name="street_name" :value="old('street_name')" required />
        
                            <x-input-error :messages="$errors->get('street_name')" class="mt-2" />
                        </div>
        
                        <!-- House Number -->
                        <div class="mt-4">
                            <x-input-label for="house_number" :value="__('Huisnummer')" />
        
                            <x-text-input id="house_number" class="block mt-1 w-full" type="number" name="house_number" :value="old('house_number')" required />
        
                            <x-input-error :messages="$errors->get('house_number')" class="mt-2" />
                        </div>
                    </div>
        
                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Wachtwoord')" />
        
                        <x-text-input id="password" class="block mt-1 w-full"
                                        type="password"
                                        name="password"
                                        required autocomplete="new-password" />
        
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
        
                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <x-input-label for="password_confirmation" :value="__('Wachtwoord herhalen')" />
        
                        <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                        type="password"
                                        name="password_confirmation" required />
        
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>
        
                    <div class="flex items-center justify-end mt-4">
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                            {{ __('Al geregistreerd?') }}
                        </a>
        
                        <x-primary-button class="ml-4">
                            {{ __('Register') }}
                        </x-primary-button>
                    </div>
                </div>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
