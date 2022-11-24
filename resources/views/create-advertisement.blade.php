<x-app-layout>
    <script>
        $(document).ready(function() {
            var fileArr = [];
            $("#images").change(function(){
                // check if fileArr length is greater than 0
                if (fileArr.length > 0) fileArr = [];
                $('#image_preview').html("");
                var total_file = document.getElementById("images").files;
                if (!total_file.length) return;
                for (var i = 0; i < total_file.length; i++) {
                    if (total_file[i].size > 1048576) {
                        return false;
                    } else {
                        fileArr.push(total_file[i]);
                        $('#image_preview').append("<div class='relative' id='img-div"+i+"'><img src='"+URL.createObjectURL(event.target.files[i])+"' class='img-responsive image img-thumbnail rounded-md' title='"+total_file[i].name+"'><div style='bottom: 10px; right: 10px;' class='absolute text-center'><button id='action-icon' value='img-div"+i+"' class='inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 bg-red-600 hover:bg-red-500 focus:bg-red-500 focus:border-red-500 active:bg-red-500 focus:ring-0' role='"+total_file[i].name+"'><i class='fa fa-trash'></i>&nbsp;Verwijderen</button></div></div>");
                    }
                }
            });
        
            $('body').on('click', '#action-icon', function(evt){
                var divName = this.value;
                var fileName = $(this).attr('role');
                $(`#${divName}`).remove();
                
                for (var i = 0; i < fileArr.length; i++) {
                    if (fileArr[i].name === fileName) {
                    fileArr.splice(i, 1);
                    }
                }
                document.getElementById('images').files = FileListItem(fileArr);
                evt.preventDefault();
            });
        
            function FileListItem(file) {
                    file = [].slice.call(Array.isArray(file) ? file : arguments)
                    for (var c, b = c = file.length, d = !0; b-- && d;) d = file[b] instanceof File
                    if (!d) throw new TypeError("expected argument to FileList is File or array of File objects")
                    for (b = (new ClipboardEvent("")).clipboardData || new DataTransfer; c--;) b.items.add(file[c])
                    return b.files
            }
        });
    </script>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Eigen advertenties') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h4 class="mb-4 font-bold text-3xl">Advertentie plaatsen</h4>
            <div class="shadow p-4 rounded-lg bg-white">
                <form method="POST" enctype="multipart/form-data"* class="flex flex-col gap-3">
                    @csrf

                    <div class="flex flex-col">
                        <div class="form-group">
                            <label class="w-fit gap-2 flex items-center !bg-[#EEA766] hover:!bg-[#f0b27b] focus:!bg-[#f0b27b] focus:!border-[#f0b27b] active:!bg-[#f0b27b] focus:ring-0 px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest focus:outline-none ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                                <i class="fas fa-upload"></i>
                                <span>Selecteer afbeeldingen</span>
                                <input type="file" name="images[]" hidden id="images" multiple class="form-control" required>
                            </label>
                        </div>
                        <div class="form-group mt-2">
                            <div class="grid grid-cols-4 gap-6 w-full" id="image_preview" style="width:100%;">
                            </div>
                        </div>
                    </div>
                    
                    <div class="flex items-center gap-5 mt-4">
                        <!-- Categorie -->
                        <select id="categorie" name="categorie" class="block w-56 rounded-md shadow-sm border-gray-300 focus:border-[#EEA766] focus:ring focus:ring-[#EEA766] focus:ring-opacity-50">
                            <option selected="true" disabled="disabled">Kies een categorie</option>    
                            @foreach ($categories as $categorie)
                                <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
                            @endforeach
                        </select>

                        <!-- Sending Type -->
                        <select id="sending_type" name="sending_type" class="block w-56 rounded-md shadow-sm border-gray-300 focus:border-[#EEA766] focus:ring focus:ring-[#EEA766] focus:ring-opacity-50">
                            <option selected="true" disabled="disabled">Kies een verzend type</option>
                            <option value="ophalen">Ophalen</option>
                            <option value="verzenden">Verzenden</option> 
                            <option value="ophalen of verzenden">Ophalen of verzenden</option>
                        </select>
                    </div>

                        <!-- Name -->
                        <div class="mt-4">
                            <x-input-label for="name" :value="__('Naam')" />
        
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" />
        
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Price -->
                        <div class="mt-4">
                            <x-input-label for="price" :value="__('Prijs')" />
        
                            <x-text-input id="price" class="block mt-1 w-full" type="number" name="price" />
        
                            <x-input-error :messages="$errors->get('price')" class="mt-2" />
                        </div>
                        
                        <!-- Description -->
                        <div class="mt-4">
                            <x-input-label for="description" :value="__('Beschrijving')" />
        
                            <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" />
        
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>

                        <!-- Specifications -->
                        <div>
                            <div class="flex gap-5">
                                <div class="mt-4 basis-2/6">
                                    <x-input-label for="spec" :value="__('Specificatie')" />
                
                                    <x-text-input id="spec" class="block mt-1 w-full" type="text" name="spec" />
                
                                    <x-input-error :messages="$errors->get('spec')" class="mt-2" />
                                </div>
                                
                                <div class="mt-4 basis-2/6">
                                    <x-input-label for="spec_value" :value="__('Waarde')" />
                
                                    <x-text-input id="spec_value" class="block mt-1 w-full" type="text" name="spec_value" />
                
                                    <x-input-error :messages="$errors->get('spec_value')" class="mt-2" />
                                </div>
                            </div>

                            <div class="flex gap-5">
                                <div class="mt-4 basis-2/6">
                                    <x-input-label for="spec" :value="__('Specificatie')" />
                
                                    <x-text-input id="spec" class="block mt-1 w-full" type="text" name="spec" />
                
                                    <x-input-error :messages="$errors->get('spec')" class="mt-2" />
                                </div>
                                
                                <div class="mt-4 basis-2/6">
                                    <x-input-label for="spec_value" :value="__('Waarde')" />
                
                                    <x-text-input id="spec_value" class="block mt-1 w-full" type="text" name="spec_value" />
                
                                    <x-input-error :messages="$errors->get('spec_value')" class="mt-2" />
                                </div>
                            </div>
                        </div>

                        <x-primary-button class="w-fit !bg-[#EEA766] hover:!bg-[#f0b27b] focus:!bg-[#f0b27b] focus:!border-[#f0b27b] active:!bg-[#f0b27b] focus:ring-0">
                            <i class="fa-solid fa-plus"></i>&nbsp;{{ __('Specificatieveld toevoegen') }}
                        </x-primary-button>



                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
