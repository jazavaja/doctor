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

        @if ($plan->hasPages())
            <nav>
                <ul class="pagination justify-content-center">
                    {{-- First Page Link --}}
                    @if ($plan->onFirstPage())
                        <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.first')">
                            <span class="page-link" aria-hidden="true">صفحه اول</span>
                        </li>
                    @else
                        <li class="page-item">
                            <button class="page-link" wire:click="gotoPage(1)" wire:loading.attr="disabled" aria-label="@lang('pagination.first')">صفحه اول</button>
                        </li>
                    @endif

                    {{-- Previous Page Link --}}
                    @if ($plan->onFirstPage())
                        <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                            <span class="page-link" aria-hidden="true">&lsaquo;</span>
                        </li>
                    @else
                        <li class="page-item">
                            <button class="page-link" wire:click="previousPage" wire:loading.attr="disabled" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</button>
                        </li>
                    @endif

                    {{-- Next Page Link --}}
                    @if ($plan->hasMorePages())
                        <li class="page-item">
                            <button class="page-link" wire:click="nextPage" wire:loading.attr="disabled" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</button>
                        </li>
                    @else
                        <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                            <span class="page-link" aria-hidden="true">&rsaquo;</span>
                        </li>
                    @endif

                    {{-- Last Page Link --}}
                    @if ($plan->hasMorePages())
                        <li class="page-item">
                            <button class="page-link" wire:click="gotoPage({{ $plan->lastPage() }})" wire:loading.attr="disabled" aria-label="@lang('pagination.last')">صفحه آخر</button>
                        </li>
                    @else
                        <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.last')">
                            <span class="page-link" aria-hidden="true">صفحه آخر</span>
                        </li>
                    @endif
                </ul>
            </nav>
    @endif
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
                    $rowNumber = ($this->page - 1) * 30 + ($index + 1);
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
