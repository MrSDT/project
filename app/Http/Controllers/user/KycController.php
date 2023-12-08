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
        // Get the ID of the currently authenticated user
        $userid = auth()->user()->id;

        // Validate Form
        $request->validate([
            'fullName' => 'required',
            'email' => 'required',
            'documentImage_path' => 'required|mimes:png,jpg,jpeg',
            'homeAddress' => 'required',
            'dateOfBirth' => 'required',
            'phoneNumber' => 'required',
        ]);

        // Handle the image upload
        $imageName = time() . '.' . $request->fullName . '.' . $request->documentImage_path->extension();
        $request->documentImage_path->move(public_path('kycImages'), $imageName);

        // store Advertise form data
        $kycData = KycData::create([
            'userid' => $userid,
            'fullName' => $request->input('fullName'),
            'documentImage_path' => $imageName,
            'phoneNumber' => $request->input('phoneNumber'),
            'email' => $request->input('email'),
            'homeAddress' => $request->input('homeAddress'),
            'dateOfBirth' => $request->input('dateOfBirth'),
            'verified' => 0,
        ]);

        return redirect()->route('user.kyc_dashboard');
    }


}
