<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\AdvertiseData;
use App\Models\Category;
use App\Models\KycData;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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

        // Validate Form
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'advertiseImage_path' => 'required|mimes:png,jpg,jpeg',
            'phoneNumber' => 'required',
            'email' => 'required',
            'startingPrice' => 'required',
        ]);

        // Handle the image upload
        $imageName = time() . '.' . $request->title . '.' . $request->advertiseImage_path->extension();
        $request->advertiseImage_path->move(public_path('advertiseImages'), $imageName);

        // store Advertise form data
        $advertiseData = AdvertiseData::create([
            'userid' => $userid,
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'advertiseImage_path' => $imageName,
            'phoneNumber' => $request->input('phoneNumber'),
            'email' => $request->input('email'),
            'startingPrice' => $request->input('startingPrice'),
            'verified' => 0,
            'categoryName' => $request->input('categoryName'),
        ]);

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
