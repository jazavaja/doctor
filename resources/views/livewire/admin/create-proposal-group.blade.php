<!-- livewire/upload-excel.blade.php -->
<div>
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <hr>
    <form wire:submit.prevent="upload">
        <input type="file" wire:model="file">
        @error('file')
        <span class="text-red-500">{{ $message }}</span>
        @enderror
        <button type="submit">Upload Excel</button>
    </form>
    <hr>
        <button class="btn btn-danger" wire:click="deleteProposals">
            حذف همه پروپزال ها
        </button>
        <button wire:click="deleteProposals" wire:loading.class="btn-loading" class="btn btn-danger">
            <span wire:loading wire:target="deleteProposals">لطفاً صبر کنید...</span>
            <span wire:loading.remove wire:target="deleteProposals"> حذف همه</span>
        </button>
</div>
