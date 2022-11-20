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
                    $('#image_preview').append("<div class='relative' id='img-div"+i+"'><img src='"+URL.createObjectURL(event.target.files[i])+"' class='img-responsive image img-thumbnail' title='"+total_file[i].name+"'><div class='absolute top-1/2 left-1/2 text-center'><button id='action-icon' value='img-div"+i+"' class='btn btn-danger' role='"+total_file[i].name+"'><i class='fa fa-trash'></i></button></div></div>");
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

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Eigen advertenties') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h4 class="mb-4 font-bold text-3xl">Advertentie plaatsen</h4>
            <div class="shadow p-4 rounded-lg bg-white">
                <div>
                    <div>
                        <div class="form-group">
                            <label for="images">Images</label>
                            <input type="file" name="images[]" id="images" multiple class="form-control" required>
                        </div>
                        <div class="form-group">
                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 w-full" id="image_preview" style="width:100%;">
                            </div>
                        </div>
                    </div>
                    
                    <div>
                        Inputs
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
