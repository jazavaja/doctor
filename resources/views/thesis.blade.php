@extends('layout')

@section('title')
    پایان نامه ها
@endsection
@section('content')
    <div class="container">
        <!-- Tabs -->
        <ul class="nav nav-tabs mb-3 justify-content-center" id="myTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="tab1-tab" data-toggle="tab" href="/thesis" role="tab" aria-controls="tab1" aria-selected="true">پایان نامه ها</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="tab2-tab" data-toggle="tab" href="/proposal" role="tab" aria-controls="tab2" aria-selected="false">پروپزال ها</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="tab3-tab" data-toggle="tab" href="/plan" role="tab" aria-controls="tab3" aria-selected="false">طرح ها</a>
            </li>
        </ul>

        <!-- Tab Content -->
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab1-tab">
                <div class="container">
                    <!-- Search Bar -->
                    <div class="mb-3 input-group">
                        <input type="text" class="form-control text-center" id="searchInput" placeholder="نام عنوان مقاله یا استاد راهنمای مقاله را جستجو کنید">
                        <button class="btn btn-primary" id="searchButton">جستجو</button>
                    </div>

                    <!-- Table -->
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
                        <tr>
                            <td class="text-center">1</td>
                            <td class="text-center">علی محسنی</td>
                            <td class="text-center">بررسی هوش مصنوعی در علم دندان پزشکی</td>
                            <td class="text-center">
                                <details>
                                    <summary>مشاهده جزییات</summary>
                                    <!-- Additional details content -->
                                    <p>دسته بندی : </p>
                                    <p>استاد راهنما : </p>
                                    <p>استاد مشاور : </p>
                                    <p>تاریخ دفاع : </p>
                                    <p>تاریخ ثبت : </p>
                                </details>
                            </td>
                        </tr>
                        <!-- Add more rows here as needed -->
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab2-tab">
                <!-- Table 2 -->
                <table class="table table-bordered">
                    <!-- Table 2 Content -->
                </table>
            </div>

            <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="tab3-tab">
                <!-- Table 3 -->
                <table class="table table-bordered">
                    <!-- Table 3 Content -->
                </table>
            </div>
        </div>
    </div>

@endsection
