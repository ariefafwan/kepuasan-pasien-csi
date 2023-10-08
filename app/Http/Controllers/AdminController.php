<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $page = 'Dashboard Admin';
        return view('admin.dashboard', compact('page'));
    }
}
