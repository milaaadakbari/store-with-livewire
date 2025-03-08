<div class="grid-cols-1 gap-6 pt-5">
    <div class="panel">
        <div class="panel">
            @include('admin.layouts.alert')
            @include('admin.layouts.waiting')
            <h1 class="m-4 text-xl font-semibold"> تنوع قیمت</h1>
            <form class="space-y-5">
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <div >
                        <label for="gridEmail">قیمت</label>
                        <input wire:model="main_price" id="main_price" type="text" class="form-input">
                        @error('name')
                        <p class="text-danger mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    <div >
                        <label for="gridEmail">درصد تخفیف</label>
                        <input wire:model="discount" id="discount" type="text" class="form-input">
                        @error('name')
                        <p class="text-danger mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    <div >
                        <label for="gridEmail">تعداد</label>
                        <input wire:model="count" id="count" type="text" class="form-input">
                        @error('name')
                        <p class="text-danger mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="gridEmail">حداکثر فروش</label>
                        <input wire:model="max_sell" id="max_sell" type="text" class="form-input">
                        @error('name')
                        <p class="text-danger mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    <div wire:ignore>
                        <label for="email">رنگ</label>
                        <select wire:model="color_id" id="color-select">
                            <option>انتخاب کنید</option>
                            @foreach($colors as $key=>$value)
                                <option value="{{$key}}">{{$value}}</option>
                            @endforeach
                        </select>
                        @error('color_id')
                        <p class="text-danger mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    <div wire:ignore>
                        <label for="email">'گارانتی'</label>
                        <select wire:model="guaranty_id" id="guaranty-select">
                            <option>انتخاب کنید</option>
                            @foreach($guaranties as $key=>$value)
                                <option value="{{$key}}">{{$value}}</option>
                            @endforeach
                        </select>
                        @error('guaranty_id')
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
    NiceSelect.bind(document.getElementById('color-select'), options);
    NiceSelect.bind(document.getElementById('guaranty-select'), options);

</script>

@endscript
