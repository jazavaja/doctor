<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    <div dir="rtl" class="container">
        <!-- Search Bar -->
        <div class="mb-3 input-group">
            <input type="text" wire:model.defer="search"
                   class="form-control text-center" id="searchInput"
                   placeholder="جستجو در پروپزال ها بر اساس نام پروپزال یا پژوهشگر یا کد رهگیری ">
            <button class="btn btn-primary" id="searchButton" wire:click="doSearch">جستجو</button>
        </div>

        @if ($proposal->hasPages())
            <nav>
                <ul class="pagination justify-content-center">
                    {{-- First Page Link --}}
                    @if ($proposal->onFirstPage())
                        <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.first')">
                            <span class="page-link" aria-hidden="true">صفحه اول</span>
                        </li>
                    @else
                        <li class="page-item">
                            <button class="page-link" wire:click="gotoPage(1)" wire:loading.attr="disabled" aria-label="@lang('pagination.first')">صفحه اول</button>
                        </li>
                    @endif

                    {{-- Previous Page Link --}}
                    @if ($proposal->onFirstPage())
                        <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                            <span class="page-link" aria-hidden="true">&lsaquo;</span>
                        </li>
                    @else
                        <li class="page-item">
                            <button class="page-link" wire:click="previousPage" wire:loading.attr="disabled" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</button>
                        </li>
                    @endif

                    {{-- Next Page Link --}}
                    @if ($proposal->hasMorePages())
                        <li class="page-item">
                            <button class="page-link" wire:click="nextPage" wire:loading.attr="disabled" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</button>
                        </li>
                    @else
                        <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                            <span class="page-link" aria-hidden="true">&rsaquo;</span>
                        </li>
                    @endif

                    {{-- Last Page Link --}}
                    @if ($proposal->hasMorePages())
                        <li class="page-item">
                            <button class="page-link" wire:click="gotoPage({{ $proposal->lastPage() }})" wire:loading.attr="disabled" aria-label="@lang('pagination.last')">صفحه آخر</button>
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
                <th>پژوهشگر</th>
                <th>سیستم</th>
                <th>عنوان پایان نامه</th>
                <th>خلاصه نتیجه</th>
                <th>جزییات</th>
            </tr>
            </thead>
            <tbody>
            @foreach($proposal as $p)
                <tr>
                    <td>1</td>
                    <td>{{$p->researcher}}</td>
                    <td>{{ $p->system->name ?? '' }}</td>
                    <td>{{ $p->title_proposal ?? '' }}</td>
                    <td>{{ $p->summary_result ?? '' }}</td>
                    <td>
                        <details>
                            <summary>مشاهده جزییات</summary>
                            <!-- Additional details content -->
                            <p>
                                <span>
                                    کد رهگیری :
                                </span>
                                {{$p->tracking_code}}
                            </p>
                            <p>
                                <span>کد طرح : </span>
                                {{$p->proposal_code}}

                            </p>
                            <p>
                                <span>جایگاه : </span>
                                {{$p->position->name ?? ''}}
                            </p>
                            <p>
                                <span>متن مصوبه : </span>
                                {{$p->result ?? ''}}
                            </p>
                            <p>
                                <span>تاریخ ثبت : </span>
                                <span>
                                    {{\Morilog\Jalali\Jalalian::fromCarbon(\Carbon\Carbon::parse($p->date_register))->format('d-m-Y')}}
                                </span>

                            </p>
                        </details>
                    </td>
                </tr>
            @endforeach

            <!-- Add more rows here as needed -->
            </tbody>
        </table>
    </div>

</div>
