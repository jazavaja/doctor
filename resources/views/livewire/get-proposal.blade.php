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
