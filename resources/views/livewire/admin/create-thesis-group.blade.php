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
        <div wire:loading wire:target="file">
            در حال آپلود لطفا صبر کنید.....
        </div>
        @error('file')
        <span class="text-red-500">{{ $message }}</span>
        @enderror
        <button type="submit">Upload Excel</button>
    </form>
    <hr>
    <button wire:click="deleteAllThesis" wire:loading.class="btn-loading" class="btn btn-danger">
        <span wire:loading wire:target="deleteAllThesis">لطفاً صبر کنید...</span>
        <span wire:loading.remove wire:target="deleteAllThesis"> حذف همه</span>
    </button>

</div>
