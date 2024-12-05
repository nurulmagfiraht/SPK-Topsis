<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $departemenList = Departemen::all();
        return view('admin.admin', compact('departemenList'));
    }
}