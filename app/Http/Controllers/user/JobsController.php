<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\JobsCategory;
use App\Models\JobsData;
use Illuminate\Http\Request;

class JobsController extends Controller
{
    public function jobs_list()
    {
        $jobs = JobsData::latest()->get();
        return view('user.jobs.jobs_list', ['jobs' => $jobs]);
    }

    public function jobs_submit()
    {
        $user = auth()->user();
        $category = JobsCategory::all();
        return view('user.jobs.jobs_submit', ['user' => $user , 'category' => $category]);
    }

    public function jobs_store(Request $request)
    {
        // Get the ID of the currently authenticated user
        $userid = auth()->user()->id;

        // Validate and store KYC form data
        $jobsData = JobsData::create(array_merge($request->all(), ['userid' => $userid]));

        // Handle the image upload

        if ($request->hasFile('jobImage_path')) {

            $image = $request->file('jobImage_path');

            $name = time().'.'.$image->getClientOriginalExtension();

            $destinationPath = public_path('jobImages');

            $image->move($destinationPath, $name);

            $jobsData->image_path = $name;
        }
        return redirect()->route('user.jobs')->with('success', 'Your Job Has Been Created');
    }

    public function jobs_details($id)
    {
        $job = JobsData::findorfail($id);
        return view('user.jobs.jobs_details', ['job' => $job]);
    }
}
