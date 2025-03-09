<div class="grid-cols-1 gap-6 pt-5">
    <div class="panel">
        <div class="panel">
            @include('admin.layouts.alert')
            @include('admin.layouts.waiting')
            <h1 class="m-4 text-xl font-semibold">گالری محصول</h1>
            <form class="space-y-5">
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <div>
                        <label for="mobile">عکس محصول</label>
                        <input wire:model="images" multiple id="ctnFile" type="file" class="p-0 rtl:file-ml-5 form-input file:border-0 file:bg-primary/90 file:py-2
                         file:px-4 file:font-semibold file:text-white file:hover:bg-primary ltr:file:mr-5" >
                        @error('images')
                        <p class="text-danger mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    <div>
                        <button wire:click.prevent="createRow" class="btn btn-success !mt-6">ذخیره عکس ها</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

