<div>
    {{-- The whole world belongs to you. --}}
    <div class="container">
        <!-- Search Bar -->
        <div class="mb-3 input-group">
            <input type="text" class="form-control text-center" wire:model.defer="search_input"
                   placeholder="نام عنوان طرح یا نام و نام خانوادگي مجري طرح جستجو کنید">
            <button class="btn btn-primary" id="searchButton" wire:click="doSearch">
                جستجو
            </button>
        </div>

        <!-- Table -->
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ردیف</th>
                <th>عنوان طرح</th>
                <th>نام و نام خانوادگي مجري طرح </th>
                <th>مدت طرح</th>
                <th>تاریخ شروع</th>
                <th>تاریخ پایان</th>
                <th>تاریخ قرارداد</th>
                <th>تعهدات مجري در خصوص مقالات</th>
                <th>اسامی همکاران</th>
                <th>توضیحات</th>
            </tr>
            </thead>
            <tbody>
            @foreach($plan as $index =>$t)
                @php
                    // Calculate the row number dynamically based on the current page and loop index
                    $rowNumber = ($this->page - 1) * 20 + ($index + 1);
                @endphp
                <tr>
                    <td>{{$rowNumber}}</td>
                    <td>{{$t->title_plan}}</td>
                    <td>{{$t->name_project_manager}}</td>
                    <td>{{$t->time_project}}</td>
                    <td>{{$t->date_start}}</td>
                    <td>{{$t->date_end}}</td>
                    <td>{{$t->date_contract}}</td>
                    <td>{{$t->executive_obligations_summary}}</td>
                    <td>{{$t->names_colleagues}}</td>
                    <td>{{$t->description}}</td>
                </tr>
            @endforeach

            <!-- Add more rows here as needed -->
            </tbody>
        </table>
    </div>
</div>
