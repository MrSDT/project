<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\AdvertiseData;
use App\Models\User;
use Illuminate\Http\Request;

class AdvertiseController extends Controller
{
    public function advertise_list()
    {
        return view('user.advertise.advertise_list');
    }

    public function advertise_submit()
    {
        $user = auth()->user();
        return view('user.advertise.advertise_submit', ['user' => $user]);
    }

    public function advertise_store(Request $request)
    {
        // Get the ID of the currently authenticated user
        $userid = auth()->user();

        // Validate and store Advertise form data
        $advertiseData = AdvertiseData::create(array_merge($request->all(), ['userid' => $userid]));

        if ($request->hasFile('advertiseImage_path')) {

            $image = $request->file('advertiseImage_path');

            $name = time().'.'.$image->getClientOriginalExtension();

            $destinationPath = public_path('advertiseImages');

            $image->move($destinationPath, $name);

            $advertiseData->image_path = $name;
        }
        return redirect()->route('user.advertises');
    }
}
