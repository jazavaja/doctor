<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function createThesisOne(){
        return view('admin.add_one_thesis');
    }
}
