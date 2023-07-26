<!-- livewire/upload-excel.blade.php -->
<div>
    <div dir="rtl" class="text-center bg-warning">
        فرمت فایل اکسل می بایست
        <br>
        id,name
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
    <button wire:click="deleteCategory" wire:loading.class="btn-loading" class="btn btn-danger">
        <span wire:loading wire:target="deleteCategory">لطفاً صبر کنید...</span>
        <span wire:loading.remove wire:target="deleteCategory"> حذف همه</span>
    </button>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ردیف</th>
            <th>نام</th>
        </tr>
        </thead>
        <tbody>
        @foreach($masters as $p)
            <tr>
                <td>{{$p->id}}</td>
                <td>{{$p->name}}</td>
            </tr>
        @endforeach

        <!-- Add more rows here as needed -->
        </tbody>
    </table>

</div>
