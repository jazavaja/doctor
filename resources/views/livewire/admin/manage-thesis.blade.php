<div dir="rtl">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th class="text-center">ردیف</th>
            <th class="text-center">نام پدید اورنده</th>
            <th class="text-center">عنوان پایان نامه</th>
            <th class="text-center">جزییات</th>
            <th class="text-center">عملیات</th>
        </tr>
        </thead>
        <tbody>
        @foreach($thesis as $t)
            <tr>
                <td class="text-center">1</td>
                <td class="text-center">{{$t->creatorName}}</td>
                <td class="text-center">{{$t->titleThesis}}</td>
                <td class="text-center">
                    <details>
                        <summary>مشاهده جزییات</summary>
                        <!-- Additional details content -->
                        <p>
                            <span class="text-bold">
                                دسته بندی :
                            </span>
                            <span>
                                {{ $t->category->title ?? 'No category' }}
                            </span>

                        </p>
                        <p>
                            <span class="text-bold">
                                استاد راهنما :
                            </span>
                            <span>
                                {{ $t->guideMasterUser->name ?? 'No guide' }}
                            </span>
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

                            <span class="text-bold">
                                تاریخ ثبت :
                           </span>

                            <span>
                                {{ $jalaliDate ?? '' }}
                            </span>
                        </p>
                        <p >
                            <span class="text-bold">
                                تاریخ دفاع :
                           </span>
                            {{ $jalaliDate2 ?? 'ثبت نشده' }}

                        </p>
                    </details>
                </td>

                <td>
                    <button class="btn btn-danger" wire:click="delete({{$t->id}})">
                        حذف
                    </button>
                </td>
            </tr>
        @endforeach

        <!-- Add more rows here as needed -->
        </tbody>
    </table>
</div>
