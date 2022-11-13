<div class="relative mx-auto w-full">
    <a href="#" class="relative inline-block duration-300 ease-in-out transition-transform transform hover:-translate-y-2 w-full">
      <div class="shadow p-4 rounded-lg bg-white">
        <div class="flex justify-center relative rounded-lg overflow-hidden h-52">
          <div class="transition-transform duration-500 transform ease-in-out hover:scale-110 w-full">
            <div class="absolute inset-0 bg-black">
              <img src="/images/advertisements/1/test-image.jpg">
            </div>
          </div>

          <span class="absolute top-0 left-0 inline-flex mt-3 ml-3 px-3 py-2 rounded-lg z-10 bg-[#EEA766] text-sm font-medium text-white select-none">
            {{ $advertisement->categorie->name }}
          </span>
        </div>

        <div class="mt-4">
          <h2 class="font-medium text-base md:text-lg text-gray-800 line-clamp-1" title="New York">
            {{ $advertisement->name }}
          </h2>
          <p class="mt-2 text-sm text-gray-800 line-clamp-1" title="New York, NY 10004, United States">
            {{ $advertisement->user->city }}, {{ $advertisement->user->postal_code }}
          </p>
        </div>

        <div class="grid grid-cols-2 grid-rows-2 gap-4 mt-8">
          <p class="inline-flex flex-col xl:flex-row xl:items-center text-gray-800">
            Staat:
            <span class="mt-2 xl:mt-0">
                Nieuw
            </span>
          </p>
        </div>

        <div class="grid grid-cols-2 mt-8">
          <div class="flex items-center">
            <div class="relative">
              <div class="rounded-full w-6 h-6 md:w-8 md:h-8 bg-gray-200">
                  <img class="rounded-full" src="images/users/{{ $advertisement->user->userImage[0]->path }}">
              </div>
              <span class="absolute top-0 right-0 inline-block w-3 h-3 bg-primary-red rounded-full"></span>
            </div>

            <p class="ml-2 text-gray-800 whitespace-nowrap line-clamp-1">
              {{ $advertisement->user->first_name }} {{ $advertisement->user->prefix_name }} {{ $advertisement->user->last_name }}
            </p>
          </div>

          <div class="flex justify-end">
            <p class="inline-block font-semibold text-primary whitespace-nowrap leading-tight rounded-xl">
              <span class="text-sm uppercase">
                €
              </span>
              <span class="text-lg">{{ $advertisement->price }}</span>
            </p>
          </div>
        </div>
      </div>
    </a>
  </div>