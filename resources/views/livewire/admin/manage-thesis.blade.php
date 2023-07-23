<div>

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
    <div class="form-row g-3">
        <div class="col-6">
            <div class="form-group">
                <label for="guideMasterUserId">Guide Master User ID</label>
                <input type="number" wire:model.defer="guideMasterUserId" class="form-control" id="guideMasterUserId"
                       name="guideMasterUserId" placeholder="Enter guide master user ID">
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="consultantMasterUserId">Consultant Master User ID</label>
                <input type="number" wire:model.defer="consultantMasterUserId" class="form-control"
                       id="consultantMasterUserId"
                       name="consultantMasterUserId" placeholder="Enter consultant master user ID">
            </div>
        </div>
    </div>

    <div class="form-group">
        <label for="category_id">Category ID</label>
        <input type="number" wire:model.defer="category_id" class="form-control" id="category_id" name="category_id"
               placeholder="Enter category ID">
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
            </script>
        @endpush
    </div>

    <div class="form-group">
        <label for="type">Type</label>
        <input type="text" wire:model.defer="type" class="form-control" id="type" name="type" placeholder="Enter type">
    </div>

    <button wire:click="submit" wire:loading.class="btn-loading" class="btn btn-danger">
        <span wire:loading wire:target="submit">لطفاً صبر کنید...</span>
        <span wire:loading.remove wire:target="submit">ثبت</span>
    </button>
</div>

