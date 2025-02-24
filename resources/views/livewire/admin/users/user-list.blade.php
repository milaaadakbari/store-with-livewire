<div class="grid-cols-1 gap-6 pt-5">
    <div class="panel">
        <div class="panel">
            <form class="space-y-5">
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <div>
                        <label for="gridEmail">نام و نام خانوادگی</label>
                        <input id="name" type="text" class="form-input">
                    </div>
                    <div>
                        <label for="email">ایمیل</label>
                        <input id="email" type="text" class="form-input">
                    </div>
                </div>
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">

                    <div>
                        <label for="mobile">موبایل</label>
                        <input id="mobile" type="Password" class="form-input">
                    </div>
                    <div>
                        <label for="gridPassword">رمز عبور</label>
                        <input id="password" type="Password" class="form-input">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary !mt-6">ثبت</button>
            </form>
        </div>
    </div>
    <div class="mb-5">
        <div class="table-responsive">
            <table>
                <thead>
                <tr>
                    <th class="text-center">ردیف</th>
                    <th class="text-center">نام و نام خانوادگی</th>
                    <th class="text-center">ایمیل</th>
                    <th class="text-center">موبایل</th>
                    <th class="text-center">عملیات</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td></td>
                    <td class="whitespace-nowrap">1</td>
                    <td class="whitespace-nowrap">میلاد اکبری</td>
                    <td class="whitespace-nowrap">milad@yahoo.com</td>
                    <td class="whitespace-nowrap">0911</td>
                    <td x-text="data.progress" class="whitespace-nowrap"
                        :class="{'text-success': data.status === 'Complete', 'text-secondary': data.status === 'Pending', 'text-info': data.status === 'In Progress', 'text-danger': data.status === 'Canceled'}"></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
