<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    <div dir="rtl" class="container">
        <!-- Search Bar -->
        <div class="mb-3 input-group">
            <input type="text" wire:model.defer="search"
                   class="form-control text-center" id="searchInput"
                   placeholder="جستجو در پروپزال ها بر اساس نام پروپزال یا پژوهشگر یا کد رهگیری ">
            <button class="btn btn-primary" id="searchButton" wire:click="doSearch">Search</button>
        </div>

        <!-- Table -->
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ردیف</th>
                <th>پژوهشگر</th>
                <th>سیستم</th>
                <th>عنوان پایان نامه</th>
                <th>خلاصه نتیجه</th>
                <th>جزییات</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>1</td>
                <td>علی محسنی</td>
                <td>بررسی هوش مصنوعی در علم دندان پزشکی</td>
                <td>بررسی هوش مصنوعی در علم دندان پزشکی</td>
                <td>بررسی هوش مصنوعی در علم دندان پزشکی</td>
                <td>
                    <details>
                        <summary>مشاهده جزییات</summary>
                        <!-- Additional details content -->
                        <p>کد رهگیری : </p>
                        <p>کد طرح : </p>
                        <p>جایگاه : </p>
                        <p>متن مصوبه : </p>
                        <p>تاریخ ثبت : </p>
                    </details>
                </td>
            </tr>
            <!-- Add more rows here as needed -->
            </tbody>
        </table>
    </div>

</div>
