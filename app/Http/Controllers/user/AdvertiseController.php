<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\AdvertiseData;
use App\Models\Category;
use App\Models\KycData;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdvertiseController extends Controller
{
    public function advertise_list()
    {
        $advertises = AdvertiseData::latest()->get();
        $hasSubmittedKYC = $this->hasSubmittedKYC();
        $user = Auth::user();
        $userkyc = $user->kyc;

        if ($userkyc) {
            $verifiedkyc = $userkyc->verified;
        } else {
            $verifiedkyc = false;
        }

        return view('user.advertise.advertise_list', ['advertises' => $advertises, 'hasSubmittedKYC' => $hasSubmittedKYC,
            'verifiedkyc' => $verifiedkyc]);
    }

    public function advertise_submit()
    {
        $user = auth()->user();
        $category = Category::all();
        return view('user.advertise.advertise_submit', ['user' => $user , 'category' => $category]);
    }

    public function advertise_store(Request $request)
    {
        // Get the ID of the currently authenticated user
        $userid = auth()->user()->id;

        // Validate and store KYC form data
        $advertiseData = AdvertiseData::create(array_merge($request->all(), ['userid' => $userid]));

        // Handle the image upload

        if ($request->hasFile('advertiseImage_path')) {

            $image = $request->file('advertiseImage_path');

            $name = time().'.'.$image->getClientOriginalExtension();

            $destinationPath = public_path('advertiseImages');

            $image->move($destinationPath, $name);

            $advertiseData->image_path = $name;
        }
        return redirect()->route('user.advertises')->with('success', 'Your Advertise Has Been Created');
    }

    public function advertise_details($id)
    {
        $ad = AdvertiseData::findorfail($id);
        return view('user.advertise.advertise_details', ['ad' => $ad]);
    }

    public function hasSubmittedKYC()
    {
        $user = auth()->user();
        return KycData::where('email', $user->email)->count() > 0;
    }
}
