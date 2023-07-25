<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function createThesisOne(){
        return view('admin.add_one_thesis');
    }
    public function createThesisGroup(){
        return view('admin.add_group_thesis');
    }

    public function createProposalGroup(){
        return view('admin.add_group_proposal');
    }
    public function getListThesis(){
        return view('admin.manage_thesis');
    }
}
