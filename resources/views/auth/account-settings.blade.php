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
    function toggleNewPasswordVisibility() {
      var input = document.getElementById("password");
      var icon = document.getElementById("passwordIcon_new")

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

    function toggleRepeatNewPasswordVisibility() {
      var input = document.getElementById("password_confirmation");
      var icon = document.getElementById("passwordIcon_repeat_confirm")

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
            {{ __('Account Instellingen') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="font-bold flex flex-wrap items-center justify-between">
                        <div>Account Instellingen</div>
                        <x-primary-button class="bg-red-600 hover:bg-red-500">
                            {{ __('Account Verwijderen') }}
                        </x-primary-button>
                    </div>

                    <div class="mt-2">
                        <form method="POST">
                            @csrf

                            <!-- Email Address -->
                            <div class="mt-4">
                                <x-input-label for="email" :value="__('E-mailadres')" />
                
                                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{ Auth::user()->email }}" required />
                
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>
                
                            <!-- First Name -->
                            <div class="mt-4">
                                <x-input-label for="first_name" :value="__('Voornaam')" />
                
                                <x-text-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" value="{{ Auth::user()->first_name }}" required autofocus />
                
                                <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
                            </div>
                
                            <!-- Last Name -->
                            <div class="mt-4">
                                <x-input-label for="last_name" :value="__('Achternaam')" />
                
                                <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" value="{{ Auth::user()->last_name }}" required autofocus />
                
                                <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
                            </div>
                
                            <!-- Password -->
                            <div class="mt-4">
                                <x-input-label for="password" :value="__('Nieuw wachtwoord')" />
                
                                <x-text-input id="password" class="block mt-1 w-full"
                                                type="password"
                                                name="password"
                                                required autocomplete="new-password" />
                
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                <i id="passwordIcon_new" class="fas fa-eye password-icon" onclick="toggleNewPasswordVisibility()"></i>
                            </div>
                
                            <!-- Confirm Password -->
                            <div class="mt-4">
                                <x-input-label for="password_confirmation" :value="__('Herhaal nieuw wachtwoord')" />
                
                                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                                type="password"
                                                name="password_confirmation" required />
                
                                <x-input-error id="password" :messages="$errors->get('password_confirmation')" class="mt-2" />
                                <i id="passwordIcon_repeat_confirm" class="fas fa-eye password-icon" onclick="toggleRepeatNewPasswordVisibility()"></i>
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <a class="underline text-sm text-gray-600 hover:text-gray-900">
                                    {{ __('Annuleren') }}
                                </a>
                
                                <x-primary-button class="ml-4 bg-green-700 hover:bg-green-600">
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
