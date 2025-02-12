<div>
    {{-- Stop trying to control. --}}
    <div dir="rtl" class="container">
        <!-- Search Bar -->
        <div class="mb-3 input-group">
            <input type="text" class="form-control text-center" wire:model.defer="search_input" placeholder="نام عنوان پایان نامه یا استاد راهنمای پایان نامه و یا نویسنده پایان نامه را جستجو کنید">
            <button class="btn btn-primary" id="searchButton" wire:click="doSearch">جستجو</button>
        </div>

        <!-- Table -->


            @if ($thesis2->hasPages())
                <nav>
                    <ul class="pagination justify-content-center">
                        {{-- First Page Link --}}
                        @if ($thesis2->onFirstPage())
                            <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.first')">
                                <span class="page-link" aria-hidden="true">صفحه اول</span>
                            </li>
                        @else
                            <li class="page-item">
                                <button class="page-link" wire:click="gotoPage(1)" wire:loading.attr="disabled" aria-label="@lang('pagination.first')">صفحه اول</button>
                            </li>
                        @endif

                        {{-- Previous Page Link --}}
                        @if ($thesis2->onFirstPage())
                            <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                                <span class="page-link" aria-hidden="true">&lsaquo;</span>
                            </li>
                        @else
                            <li class="page-item">
                                <button class="page-link" wire:click="previousPage" wire:loading.attr="disabled" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</button>
                            </li>
                        @endif

                        {{-- Next Page Link --}}
                        @if ($thesis2->hasMorePages())
                            <li class="page-item">
                                <button class="page-link" wire:click="nextPage" wire:loading.attr="disabled" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</button>
                            </li>
                        @else
                            <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                                <span class="page-link" aria-hidden="true">&rsaquo;</span>
                            </li>
                        @endif

                        {{-- Last Page Link --}}
                        @if ($thesis2->hasMorePages())
                            <li class="page-item">
                                <button class="page-link" wire:click="gotoPage({{ $thesis2->lastPage() }})" wire:loading.attr="disabled" aria-label="@lang('pagination.last')">صفحه آخر</button>
                            </li>
                        @else
                            <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.last')">
                                <span class="page-link" aria-hidden="true">صفحه آخر</span>
                            </li>
                        @endif
                    </ul>
                </nav>
            @endif
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th class="text-center">ردیف</th>
                    <th class="text-center">نام پدید اورنده</th>
                    <th class="text-center">عنوان پایان نامه</th>
                    <th class="text-center">جزییات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($thesis2 as $index => $t)
                    @php
                        // Calculate the row number dynamically based on the current page and loop index
                        $rowNumber = ($this->page - 1) * 40 + ($index + 1);
                    @endphp
                    <tr>
                        <td class="text-center">{{$rowNumber}}</td>
                        <td class="text-center">{{$t->creatorName}}</td>
                        <td class="text-center">{{$t->titleThesis}}</td>
                        <td class="text-center">
                            <details>
                                <summary>مشاهده جزییات</summary>
                                <!-- Additional details content -->
                                <p>
                                    <span class="text-bold">دپارتمان :</span>
                                    <span>{{ $t->category->title ?? 'No category' }}</span>
                                </p>
                                <p>
                                    <span class="text-bold">استاد راهنما :</span>
                                    <span>{{ $t->guideMasterUser->name ?? 'استاد راهنما ندارد' }}</span>
                                </p>
                                @if($t->consultantMasterUser)
                                    <p>
                                        <span class="text-bold">استاد مشاور :</span>
                                        <span>{{ $t->consultantMasterUser->name ?? 'استاد مشاور ندارد' }}</span>
                                    </p>
                                @endif

                                @php
                                    $dateRegister = $t->dateOfRegister;
                                    $defenseDate = $t->DefenseDate;

                                    // Convert the dateRegister to Jalali (Shamsi) format if it is valid, otherwise set to 'InvalidDate'
                                    $jalaliDate = ($dateRegister && preg_match('/^\d{4}-\d{2}-\d{2}$/', $dateRegister))
                                        ? \Morilog\Jalali\Jalalian::fromCarbon(\Carbon\Carbon::parse($dateRegister))->format('Y-m-d')
                                        : 'ثبت نشده';

                                    // Convert the defenseDate to Jalali (Shamsi) format if it is valid, otherwise set to 'InvalidDate'
                                    $jalaliDate2 = ($defenseDate && preg_match('/^\d{4}-\d{2}-\d{2}$/', $defenseDate))
                                        ? \Morilog\Jalali\Jalalian::fromCarbon(\Carbon\Carbon::parse($defenseDate))->format('Y-m-d')
                                        : 'ثبت نشده';
                                @endphp
                                <p>
                                    <span class="text-bold">تاریخ دفاع :</span>
                                    <br>
                                    {{ $jalaliDate ?? 'ثبت نشده' }}
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
