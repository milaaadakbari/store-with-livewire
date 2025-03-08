<div class="grid-cols-1 gap-6 pt-5">
    <div class="panel">
        <div class="panel">
            @include('admin.layouts.alert')
            @include('admin.layouts.waiting')
            <h1 class="m-4 text-xl font-semibold">ایجاد محصول</h1>
            <form class="space-y-5">
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <div >
                        <label for="gridEmail">نام محصول</label>
                        <input wire:model="name" id="name" type="text" class="form-input">
                        @error('name')
                        <p class="text-danger mt-1">{{$message}}</p>
                        @enderror
                    </div >
                    <div >
                        <label for="gridEmail">نام انگلیسی محصول</label>
                        <input wire:model="e_name" id="e_name" type="text" class="form-input">
                        @error('name')
                        <p class="text-danger mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    <div >
                        <label for="gridEmail">قیمت</label>
                        <input wire:model="price" id="price" type="text" class="form-input">
                        @error('price')
                        <p class="text-danger mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    <div >
                        <label for="gridEmail">درصد تخفیف</label>
                        <input wire:model="discount" id="discount" type="text" class="form-input">
                        @error('discount')
                        <p class="text-danger mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    <div >
                        <label for="gridEmail">تعداد</label>
                        <input wire:model="count" id="count" type="text" class="form-input">
                        @error('count')
                        <p class="text-danger mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="gridEmail">حداکثر فروش</label>
                        <input wire:model="max_sell" id="max_sell" type="text" class="form-input">
                        @error('max_sell')
                        <p class="text-danger mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    <div wire:ignore>
                        <label for="email">دسته بندی</label>
                        <select wire:model="category_id" id="category-select">
                            <option>انتخاب کنید</option>
                            @foreach($categories as $key=>$value)
                                <option value="{{$key}}">{{$value}}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <p class="text-danger mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    <div wire:ignore>
                        <label for="email">برندها</label>
                        <select wire:model="brand_id" id="brand-select">
                            <option>انتخاب کنید</option>
                            @foreach($brands as $key=>$value)
                                <option value="{{$key}}">{{$value}}</option>
                            @endforeach
                        </select>
                        @error('brand_id')
                        <p class="text-danger mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    <div >
                        <label for="mobile">عکس محصول</label>
                        <input wire:model="image" id="ctnFile" type="file" class="p-0 rtl:file-ml-5 form-input file:border-0 file:bg-primary/90 file:py-2
                         file:px-4 file:font-semibold file:text-white file:hover:bg-primary ltr:file:mr-5" required="">
                        @error('image')
                        <p class="text-danger mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    <div wire:ignore>
                        <label for="description">توضیحات</label>
                        <textarea wire:model="description" id="description" rows="3" class="form-textarea"></textarea>
                        @error('description')
                        <p class="text-danger mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    <div>
                            <button wire:click.prevent="createRow" class="btn btn-success !mt-6">ثبت</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@assets
<link rel="stylesheet" type="text/css" href="{{url('panel/css/nice-select2.css')}}" />
<script src="{{url('panel/js/nice-select2.js')}}"></script>
<script src="{{url('panel/js/ckeditor.js')}}"></script>
@endassets

@script
<script>

        let els = document.querySelectorAll('.selectize');
        els.forEach(function (select) {
            NiceSelect.bind(select);
        });


        let options = {
            searchable: true,
        };
        NiceSelect.bind(document.getElementById('category-select'), options);
        NiceSelect.bind(document.getElementById('brand-select'), options);


</script>

@endscript
