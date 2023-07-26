<!-- livewire/upload-excel.blade.php -->
<div>
    <div dir="rtl" class="text-center bg-warning">
        فرمت فایل اکسل می بایست
        <br>
        title_plan, name_project_manager, time_project, date_start, date_end, amount_contract, date_contract, executive_obligations_summary, names_colleagues, description
        <br>
        باشد
        <br>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <hr>
    در اینجا فایل اکسل را اپلود کنید
    <form wire:submit.prevent="upload">
        <input type="file" wire:model="file">
        @error('file')
        <span class="text-red-500">{{ $message }}</span>
        @enderror
        <button type="submit">Upload Excel</button>
    </form>
    <hr>
    <button wire:click="deleteAllPlan" wire:loading.class="btn-loading" class="btn btn-danger">
        <span wire:loading wire:target="deleteAllPlan">لطفاً صبر کنید...</span>
        <span wire:loading.remove wire:target="deleteAllPlan"> حذف همه</span>
    </button>
</div>
