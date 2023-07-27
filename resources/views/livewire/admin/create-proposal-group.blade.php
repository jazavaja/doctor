<!-- livewire/upload-excel.blade.php -->
<div>
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <hr>
    <form wire:submit="upload">
        <input type="file" wire:model.defer="file">
        @error('file')
        <span class="text-red-500">{{ $message }}</span>
        @enderror
        <button type="submit">Upload Excel</button>
    </form>
    <hr>
        <button wire:click="deleteProposals" wire:loading.class="btn-loading" class="btn btn-danger">
            <span wire:loading wire:target="deleteProposals">لطفاً صبر کنید...</span>
            <span wire:loading.remove wire:target="deleteProposals"> حذف همه</span>
        </button>
        @if ($proposal->hasPages())
            <nav>
                <ul class="pagination justify-content-center">
                    {{-- First Page Link --}}
                    @if ($proposal->onFirstPage())
                        <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.first')">
                            <span class="page-link" aria-hidden="true">صفحه اول</span>
                        </li>
                    @else
                        <li class="page-item">
                            <button class="page-link" wire:click="gotoPage(1)" wire:loading.attr="disabled" aria-label="@lang('pagination.first')">صفحه اول</button>
                        </li>
                    @endif

                    {{-- Previous Page Link --}}
                    @if ($proposal->onFirstPage())
                        <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                            <span class="page-link" aria-hidden="true">&lsaquo;</span>
                        </li>
                    @else
                        <li class="page-item">
                            <button class="page-link" wire:click="previousPage" wire:loading.attr="disabled" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</button>
                        </li>
                    @endif

                    {{-- Next Page Link --}}
                    @if ($proposal->hasMorePages())
                        <li class="page-item">
                            <button class="page-link" wire:click="nextPage" wire:loading.attr="disabled" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</button>
                        </li>
                    @else
                        <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                            <span class="page-link" aria-hidden="true">&rsaquo;</span>
                        </li>
                    @endif

                    {{-- Last Page Link --}}
                    @if ($proposal->hasMorePages())
                        <li class="page-item">
                            <button class="page-link" wire:click="gotoPage({{ $proposal->lastPage() }})" wire:loading.attr="disabled" aria-label="@lang('pagination.last')">صفحه آخر</button>
                        </li>
                    @else
                        <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.last')">
                            <span class="page-link" aria-hidden="true">صفحه آخر</span>
                        </li>
                    @endif
                </ul>
            </nav>
        @endif
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ردیف</th>
                <th>کد رهگیری</th>
                <th>کد طرح</th>
                <th>عنوان پروپزال</th>
                <th>محقق</th>
                <th>خلاصه نتیجه</th>
                <th> نتیجه</th>
            </tr>
            </thead>
            <tbody>
            @foreach($proposal as $p)
                <tr>
                    <td>{{$p->id}}</td>
                    <td>{{$p->tracking_code}}</td>
                    <td>{{$p->proposal_code}}</td>
                    <td>{{$p->title_proposal}}</td>
                    <td>{{$p->researcher}}</td>
                    <td>{{$p->summary_result}}</td>
                    <td>{{$p->result}}</td>
                    <td>
                        <button wire:click="delete({{$p->id}})">
                            حذف
                        </button>
                    </td>
                </tr>
            @endforeach

            <!-- Add more rows here as needed -->
            </tbody>
        </table>


</div>
