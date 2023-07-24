<?php

namespace App\Http\Livewire\Admin;

use App\Models\Thesis;
use Livewire\Component;
use Livewire\WithPagination;

class ManageThesis extends Component
{
    use WithPagination;
    protected $thesis;



    public function delete($id)
    {
        Thesis::find($id)->delete();
    }

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
        $r=Thesis::with('guideMasterUser')->with('consultantMasterUser')->with('category')->paginate(40);
        return view('livewire.admin.manage-thesis')->with('thesis',$r);
    }

}
