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
                @livewire('get-thesis')
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
