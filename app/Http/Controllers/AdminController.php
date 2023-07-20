<?php

namespace App\Http\Controllers;

use App\Models\Olympiad;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $olympiads = Olympiad::all();
        return view('admin-dashboard', compact('olympiads'));

    }
}
