<?php


namespace App\Traits;


use App\Models\User;
use Illuminate\Http\Request;

trait ConnectTraining
{
    public function showConnect($id)
    {
        if ($id) {
            $client = User::with(['trainings', 'company'])->find($id);
            return view('trainings.connect', compact('client'));
        }
        return view('trainings.connect');
    }

    public function connect(Request $request)
    {


    }

}
