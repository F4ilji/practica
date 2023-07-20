<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Olympiad;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function store(Request $request)
    {
        $data['user_id'] = auth()->user()->id;
        $data['olympiad_id'] = (int)$request->olympiad_id;
        $application = Application::create($data);

        return redirect()->route('dashboard');
    }

    public function delete($id)
    {

        $app = Application::where('user_id', '=', auth()->user()->id)
            ->where('olympiad_id', '=', $id)->first();

        $app->delete();

        return redirect()->route('dashboard');

    }

    public function acceptApplication($olympiad_id, $application_id)
    {
        $application = Application::find($application_id);

        $application->state = 1;
        $application->update();

        return redirect()->back();

    }

    public function deniedApplication($olympiad_id, $application_id)
    {
        $application = Application::find($application_id);

        $application->state = 2;
        $application->update();

        return redirect()->back();

    }

}
