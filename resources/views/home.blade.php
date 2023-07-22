@extends('layout')

@section('content')
    <div class="container">
        <!-- Tabs -->
        <ul class="nav nav-tabs mb-3" id="myTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="tab1-tab" data-toggle="tab" href="/thesis" role="tab" aria-controls="tab1" aria-selected="true">Thesis</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="tab2-tab" data-toggle="tab" href="#tab2" role="tab" aria-controls="tab2" aria-selected="false">Proposal</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="tab3-tab" data-toggle="tab" href="#tab3" role="tab" aria-controls="tab3" aria-selected="false">Plan</a>
            </li>
        </ul>

        <!-- Tab Content -->
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab1-tab">
                <div class="container">
                    <!-- Search Bar -->
                    <div class="mb-3 input-group">
                        <input type="text" class="form-control" id="searchInput" placeholder="Search...">
                        <button class="btn btn-primary" id="searchButton">Search</button>
                    </div>

                    <!-- Table -->
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>John Doe</td>
                            <td>john@example.com</td>
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
