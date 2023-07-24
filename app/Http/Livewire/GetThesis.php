<?php

namespace App\Http\Livewire;

use App\Models\Thesis;
use Livewire\Component;
use Livewire\WithPagination;

class GetThesis extends Component
{
    use WithPagination;

    protected $thesis;
    public function getPageRange($currentPage, $lastPage, $perPageCount = 5)
    {
        $halfPerPage = floor($perPageCount / 2);

        if ($currentPage <= $halfPerPage) {
            $start = 1;
            $end = min($perPageCount, $lastPage);
        } elseif ($currentPage > ($lastPage - $halfPerPage)) {
            $start = max($lastPage - $perPageCount + 1, 1);
            $end = $lastPage;
        } else {
            $start = max($currentPage - $halfPerPage, 1);
            $end = min($currentPage + $halfPerPage, $lastPage);
        }

        $paginationRange = range($start, $end);

        if ($start > 1) {
            array_unshift($paginationRange, '...');
        }

        if ($end < $lastPage) {
            array_push($paginationRange, '...');
        }

        return $paginationRange;
    }

    public function render()
    {
        $r=Thesis::with('guideMasterUser')->with('consultantMasterUser')->with('category')->paginate(10);
        return view('livewire.get-thesis')->with('thesis',$r);
    }
}
