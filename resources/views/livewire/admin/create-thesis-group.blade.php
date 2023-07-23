<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    <div class="form-group">
        <label for="fileInput">Select Excel File</label>
        <input type="file" wire:model="file" accept=".xlsx, .xls" class="form-control-file" id="fileInput" name="fileInput">
    </div>


    <button wire:click="submit" wire:loading.class="btn-loading" class="btn btn-primary">
        <span wire:loading wire:target="submit">Please wait...</span>
        <span wire:loading.remove wire:target="submit">Submit</span>
    </button>
</div>
