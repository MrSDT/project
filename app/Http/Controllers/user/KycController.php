<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\KycData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KycController extends Controller
{
    // Dashboard of KYC & KYC Status
    public function index()
    {
        $hasSubmittedKYC = $this->hasSubmittedKYC();
        $user = Auth::user();
        $userkyc = $user->kyc;

        if ($userkyc) {
            $verifiedkyc = $userkyc->verified;
        } else {
            $verifiedkyc = false;
        }
        return view('user.kyc.kyc_dashboard', ['hasSubmittedKYC' => $hasSubmittedKYC, 'verifiedkyc' => $verifiedkyc]);
    }

    // Check if users has KYC in KYC_Data Table by email
    public function hasSubmittedKYC()
    {
        $user = auth()->user();
        return KycData::where('email', $user->email)->count() > 0;
    }

    // Submit KYC
    public function submit_kyc()
    {
        $hasSubmittedKYC = $this->hasSubmittedKYC();
        if ($hasSubmittedKYC) {
            return redirect()->route('user.kyc_dashboard')->with('message', 'You Already Submitted KYC');
        }
        else
        $user = auth()->user();
        return view('user.kyc.submit_kyc', ['user' => $user]);
    }

    // Store KYC
    public function store_kyc(Request $request)
    {

        // Get the ID of the currently authenticated users
        $userid = auth()->id();

        // Validate and store KYC form data
        $kycData = KycData::create(array_merge($request->all(), ['userid' => $userid]));

        // Handle the image upload

        if ($request->hasFile('documentImage_path')) {

            $image = $request->file('documentImage_path');

            $name = time().'.'.$image->getClientOriginalExtension();

            $destinationPath = public_path('documents');

            $image->move($destinationPath, $name);

            $kycData->image_path = $name;

        }

        return redirect()->route('user.kyc_dashboard');
    }
}
