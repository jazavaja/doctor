<!-- livewire/upload-excel.blade.php -->
<div>
    <div dir="rtl" class="text-center bg-success">
        فرمت فایل اکسل می بایست
        <br>
        id,name
        <br>
        باشد
        <br>
    </div>
    <hr>
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form wire:submit.prevent="upload">
        <input type="file" wire:model="file">
        @error('file')
        <span class="text-red-500">{{ $message }}</span>
        @enderror
        <button type="submit">Upload Excel</button>
    </form>
    <hr>
    <button wire:click="deletePositions" wire:loading.class="btn-loading" class="btn btn-danger">
        <span wire:loading wire:target="deletePositions">لطفاً صبر کنید...</span>
        <span wire:loading.remove wire:target="deletePositions"> حذف همه</span>
    </button>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ردیف</th>
            <th>عنوان</th>
        </tr>
        </thead>
        <tbody>
        @foreach($positions as $p)
            <tr>
                <td>{{$p->id}}</td>
                <td>{{$p->name}}</td>
            </tr>
        @endforeach

        <!-- Add more rows here as needed -->
        </tbody>
    </table>

</div>
