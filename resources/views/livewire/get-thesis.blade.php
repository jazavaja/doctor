<div>
    {{-- Stop trying to control. --}}
    <div class="container">
        <!-- Search Bar -->
        <div class="mb-3 input-group">
            <input type="text" class="form-control text-center" id="searchInput"
                   placeholder="نام عنوان مقاله یا استاد راهنمای مقاله را جستجو کنید">
            <button class="btn btn-primary" id="searchButton">جستجو</button>
        </div>

        <!-- Table -->


            @if ($thesis2->hasPages())
                <nav>
                    <ul class="pagination justify-content-center">
                        {{-- First Page Link --}}
                        @if ($thesis2->onFirstPage())
                            <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.first')">
                                <span class="page-link" aria-hidden="true">Page 1</span>
                            </li>
                        @else
                            <li class="page-item">
                                <button class="page-link" wire:click="gotoPage(1)" wire:loading.attr="disabled" aria-label="@lang('pagination.first')">Page 1</button>
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
                                <button class="page-link" wire:click="gotoPage({{ $thesis2->lastPage() }})" wire:loading.attr="disabled" aria-label="@lang('pagination.last')">Last Page</button>
                            </li>
                        @else
                            <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.last')">
                                <span class="page-link" aria-hidden="true">Last Page</span>
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
                @foreach($thesis2 as $t)
                    <tr>
                        <td class="text-center">1</td>
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
                                    <span>{{ $t->guideMasterUser->name ?? 'No guide' }}</span>
                                </p>
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
                                    <span class="text-bold">تاریخ ثبت   </span>
                                    <br>
                                    {{ $jalaliDate ?? '' }}
                                </p>
                                <p>
                                    <span class="text-bold">تاریخ دفاع :</span>
                                    <br>
                                    {{ $jalaliDate2 ?? 'ثبت نشده' }}
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
