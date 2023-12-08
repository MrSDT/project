<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\JobsCategory;
use App\Models\JobsData;
use App\Models\KycData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobsController extends Controller
{
    public function jobs_list()
    {
        $jobs = JobsData::latest()->get();
        $hasSubmittedKYC = $this->hasSubmittedKYC();
        $user = Auth::user();
        $userkyc = $user->kyc;

        if ($userkyc) {
            $verifiedkyc = $userkyc->verified;
        } else {
            $verifiedkyc = false;
        }
        return view('user.jobs.jobs_list', ['jobs' => $jobs, 'hasSubmittedKYC' => $hasSubmittedKYC,
            'verifiedkyc' => $verifiedkyc]);
    }

    public function jobs_submit()
    {
        $user = auth()->user();
        $category = JobsCategory::all();
        return view('user.jobs.jobs_submit', ['user' => $user, 'category' => $category]);
    }

    public function jobs_store(Request $request)
    {
        // Get the ID of the currently authenticated user
        $userid = auth()->user()->id;

        // Validate Form
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'jobImage_path' => 'required|mimes:png,jpg,jpeg',
            'phoneNumber' => 'required',
            'email' => 'required',
            'workingHours' => 'required',
        ]);

        // Handle the image upload
        $imageName = time() . '.' . $request->title . '.' . $request->jobImage_path->extension();
        $request->jobImage_path->move(public_path('jobImages'), $imageName);

        // store Advertise form data
        $jobsData = JobsData::create([
            'userid' => $userid,
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'jobImage_path' => $imageName,
            'phoneNumber' => $request->input('phoneNumber'),
            'email' => $request->input('email'),
            'workingHours' => $request->input('workingHours'),
            'verified' => 0,
            'categoryName' => $request->input('categoryName'),
        ]);
        return redirect()->route('user.jobs')->with('success', 'Your Job Has Been Created');
    }

    public function jobs_details($id)
    {
        $job = JobsData::findorfail($id);
        return view('user.jobs.jobs_details', ['job' => $job]);
    }

    public function hasSubmittedKYC()
    {
        $user = auth()->user();
        return KycData::where('email', $user->email)->count() > 0;
    }
}
