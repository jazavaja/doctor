<!-- livewire/upload-excel.blade.php -->
<div>
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
</div>
