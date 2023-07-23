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
                <input type="number" wire:model.defer="consultantMasterUserId" class="form-control" id="consultantMasterUserId"
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

        <input type="text" wire:model="date" class="example1">

            <script>
                $(document).ready(function() {
                    $(".example1").pDatepicker({
                        format: 'YYYY/MM/DD',
                        locale: 'fa'
                    });
                });
            </script>
        <div>
            <label for="dateOfRegister">Date Of Register</label>
            <input type="text" wire:model.defer="dateOfRegister" class="form-control" id="dateOfRegister"
                   name="dateOfRegister" placeholder="Enter date of register">
        </div>

    </div>

    <div class="form-group">
        <label for="type">Type</label>
        <input type="text" wire:model.defer="type" class="form-control" id="type" name="type" placeholder="Enter type">
    </div>

    <button wire:click="submit" class="btn btn-primary">Submit</button>
</div>

