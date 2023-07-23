<div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if($success)
        <div class="alert alert-danger">
            <ul>
                <li>عملیات با موفقیت انجام شد</li>
            </ul>
        </div>
    @endif
    <div class="form-group">
        <label for="creatorName">Creator Name</label>
        <input type="text" wire:model.defer="creatorName" class="form-control" id="creatorName" name="creatorName"
               placeholder="Enter creator name">
    </div>
    <div class="form-group">
        <label for="titleThesis">Title Thesis</label>
        <input type="text" wire:model.defer="titleThesis" class="form-control" id="titleThesis" name="titleThesis"
               placeholder="Enter title thesis">
    </div>
    <div class="row">
        <div class="col-5">
            <div class="form-group">
                <label for="guideMasterUserId">Guide Master User ID</label>
                <select wire:model.defer="guideMasterUserId" class="form-control p-1" id="guideMasterUserId"
                        name="guideMasterUserId">
                    <option value="">Select guide master user ID</option>
                    <!-- Add your options here -->
                </select>
            </div>
        </div>
        <div class="col-5">
            <div class="form-group">
                <label for="guideMasterUserId">Consultant ID</label>
                <select wire:model.defer="consultantMasterUserId" class="form-control p-1" id="consultantMasterUserId"
                        name="guideMasterUserId">
                    <option value="">Select guide consultant ID</option>
                    <!-- Add your options here -->
                </select>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="guideMasterUserId">Category ID</label>
        <select wire:model.defer="category_id" class="form-control p-1" id="category_id" name="category_id">
            <option value="">Select Category ID</option>
            <!-- Add your options here -->
        </select>
    </div>
    <div class="form-group">
        <label for="category_id">Date defense</label>
        <input type="text" wire:model.defer="defenseDate" class="form-control text-center example1">
        @push('scripts')
            <script>
                $(document).ready(function () {
                    $(".example1").pDatepicker({
                        format: 'YYYY/MM/DD',
                        locale: 'fa',
                        onSelect: function () {
                            var date = $('.example1').val() // Use correct class name here
                                @this.set('defenseDate', date, true); // Use 'defenseDate' instead of 'date_accounting'
                        },
                    });
                });
            </script>
        @endpush
    </div>
    <div class="form-group">
        <label for="category_id">Date dateOfRegister</label>
        <input type="text" wire:model.defer="dateOfRegister" class="form-control text-center example2">
    </div>

    {{--    <div class="form-group">--}}
    {{--        <label for="type">Type</label>--}}
    {{--        <input type="text" wire:model.defer="type" class="form-control" id="type" name="type" placeholder="Enter type">--}}
    {{--    </div>--}}
    @push('scripts')
        <script>
            $(document).ready(function () {
                $(".example2").pDatepicker({
                    format: 'YYYY/MM/DD',
                    locale: 'fa',
                    onSelect: function () {
                        var date = $('.example2').val() // Use correct class name here
                            @this.set('dateOfRegister', date, true); // Use 'defenseDate' instead of 'date_accounting'
                    },
                });
            });

            $(document).ready(function () {
                $('#guideMasterUserId').select2();
                $('#consultantMasterUserId').select2();
            });

            $(document).ready(function () {
                $('#guideMasterUserId').select2();
            });
        </script>
    @endpush
    <button wire:click="submit" wire:loading.class="btn-loading" class="btn btn-danger">
        <span wire:loading wire:target="submit">لطفاً صبر کنید...</span>
        <span wire:loading.remove wire:target="submit">ثبت</span>
    </button>
</div>

