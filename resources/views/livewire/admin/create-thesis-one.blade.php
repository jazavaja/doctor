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
        <div class="alert alert-success">
            <ul>
                <li>عملیات با موفقیت انجام شد</li>
            </ul>
        </div>
    @endif
    <div class="form-group">
        <label for="creatorName">نام پدید آور</label>
        <input type="text" wire:model.defer="creatorName" class="form-control" id="creatorName" name="creatorName"
               placeholder="Enter creator name">
    </div>
    <div class="form-group">
        <label for="titleThesis">عنوان پایان نامه</label>
        <input type="text" wire:model.defer="titleThesis" class="form-control" id="titleThesis" name="titleThesis"
               placeholder="Enter title thesis">
    </div>
    <div class="row">
        <div class="col-5">
            <div class="form-group" wire:ignore>
                <label for="guideMasterUserId">انتخاب استاد راهنما</label>
                <select wire:model.defer="guideMasterUserId" class="form-control p-1" id="guideMasterUserId"
                        name="guideMasterUserId">
                    <option value="">Select guide master user ID</option>
                    @foreach($listUsers as $user)
                        <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
                <!-- Add your options here -->
                </select>
            </div>
        </div>
        <div class="col-5">
            <div class="form-group" wire:ignore>
                <label for="consultantMasterUserId">انتخاب استاد مشاور(درصورت وجود در غیر این صورت خالی بگذارید)</label>
                <select wire:model.defer="consultantMasterUserId" class="form-control p-1" id="consultantMasterUserId"
                        name="guideMasterUserId">
                    <option value="">Select guide consultant ID</option>
                    <!-- Add your options here -->
                </select>
            </div>
        </div>
    </div>
    <div class="form-group" wire:ignore>
        <label for="category_id">انتخاب گروه(دانشکده)</label>
        <select wire:model="category_id" class="form-control p-1" id="category_id" name="category_id">
            <option value="">Select Category ID</option>
            @foreach($listCategory as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>

        <div class="form-group">
            <label for="category_id">تاریخ ثبت</label>
            <input type="text" wire:model.defer="dateOfRegister" class="form-control text-center example2">
        </div>
    <div class="form-group">
        <label for="category_id">تاریخ دفاع</label>
        <input type="text" wire:model.defer="defenseDate" class="form-control text-center example1">
    </div>

    <button wire:click="submit" wire:loading.class="btn-loading" class="btn btn-danger">
        <span wire:loading wire:target="submit">لطفاً صبر کنید...</span>
        <span wire:loading.remove wire:target="submit">ثبت</span>
    </button>
    @push('scripts')
        <script>
            // Function to initialize Select2
            function initSelect2() {
                $('#guideMasterUserId, #consultantMasterUserId, #category_id').select2();

                // Add event listeners for all select2 elements
                $('#guideMasterUserId, #consultantMasterUserId, #category_id').on('change', function (e) {
                    var elementId = $(this).attr('id');
                    var data = $('#' + elementId).select2("val");
                    @this.
                    set(elementId, data);
                });
            }

            document.addEventListener('livewire:load', function () {
                // Initialize Select2 after Livewire component is loaded or updated
                initSelect2();

                $(".example1").pDatepicker({
                    format: 'YYYY/MM/DD',
                    locale: 'fa',
                    onSelect: function () {
                        var date = $('.example1').val();
                        @this.
                        set('defenseDate', date, true);
                    },
                });

                $(".example2").pDatepicker({
                    format: 'YYYY/MM/DD',
                    locale: 'fa',
                    onSelect: function () {
                        var date = $('.example2').val();
                        @this.
                        set('dateOfRegister', date, true);
                    },
                });
            });

            // Reinitialize Select2 after Livewire updates
            Livewire.on('select2:initialized', function () {
                initSelect2();
            });
        </script>
    @endpush

</div>
