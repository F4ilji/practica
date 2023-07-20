<?php

namespace App\Http\Controllers;

use App\Models\Olympiad;
use Illuminate\Http\Request;

class OlympiadController extends Controller
{
    public function index()
    {
        $olympiads = Olympiad::OrderBy('id', 'desc')->get();
        return view('dashboard', compact('olympiads'));
    }


    public function create()
    {
        return view('admin-dashboard-create-olympiad');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'string',
            'description' => 'string'
        ]);
        $olympiad = Olympiad::create($data);
        return redirect()->route('admin.index');
    }

    public function show($id)
    {
        $olympiad = Olympiad::find($id);

        return view('dashboard-show', compact('olympiad'));
    }

    public function checkApplications($id)
    {
        $olympiad = Olympiad::find($id);
        $applications = $olympiad->newApplications;
        return view('admin-dashboard-check-application', compact('applications', 'olympiad'));
    }
}
