<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\AdvertiseData;
use App\Models\Category;
use App\Models\JobsCategory;
use App\Models\JobsData;
use App\Models\KycData;
use App\Models\User;
use App\Models\UserGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function users()
    {
        $users = User::latest()->get();
        return view('admin.users.users', ['users' => $users]);
    }

    public function users_edit($id)
    {
        $user = User::findorfail($id);
        return view('admin.users.users_edit', ['user' => $user]);
    }

    public function user_update(Request $request, $id)
    {
        $userinfo = User::findOrFail($id);
        if ($request->isMethod('post'))
        {
            // Verify PhoneNumber
            if ($userinfo->phoneNumber_verified == 0)
            {
                $userinfo->update(['phoneNumber_verified' => 1]);
            }
            else
            {
                $userinfo->update(['phoneNumber_verified' => 0]);
            }
        }
        elseif ($request->isMethod('delete'))
        {
            // Delete KYC
            $userinfo->delete();
        }
        return redirect()->route('admin.users')->with('success', 'User Updated');
    }

    public function kyc()
    {
        $data = KycData::latest()->get();
        return view('admin.kyc.kyc', ['data' => $data]);
    }

    public function kyc_review($id)
    {
        $kycDetails = KycData::all()->find($id);
        return view('admin.kyc.kyc_review', ['kycDetails' => $kycDetails]);
    }


    public function kyc_update(Request $request, $id)
    {
        $kycdata = KycData::findOrFail($id);
        $user = $kycdata->user;
        if ($request->isMethod('post'))
        {
            // Verify KYC
            if ($kycdata->verified == 0)
            {
                $kycdata->update(['verified' => 1]);
                $user->update(['userGroup' => 'verified_user']);
            }
            else
            {
                $kycdata->update(['verified' => 0]);
                $user->update(['userGroup' => 'registered_user']);
            }
        }
        elseif ($request->isMethod('delete'))
        {
            // Delete KYC
            $kycdata->delete();
        }
        return redirect()->route('admin.kyc')->with('success', 'KYC Updated');
    }

    // Advertise Section

    public function categories()
    {
        $category = Category::all();

        return view('admin.advertise.categoryList', ['category' => $category]);
    }

    public function categories_create()
    {
        return view('admin.advertise.category_create');
    }

    public function categories_store(Request $request)
    {
        $validate = $request->validate([
            'categoryName' => 'required|max:255'
        ]);
        Category::create($validate);

        return redirect()->route('admin.categories')->with('success', 'Category Created');
    }

    public function categories_edit($id)
    {
        $category = Category::all()->find($id);
        return view('admin.advertise.categories_edit', ['category' => $category]);
    }

    public function categories_update(Request $request, $id)
    {
        $validate = $request->validate([
            'categoryName' => 'required|max:255'
        ]);
        $category = Category::find($id);

        $category->update($validate);
        return redirect()->route('admin.categories')->with('success' , 'Category Updated');
    }

    public function categories_delete($id)
    {
        $category = Category::findorfail($id);
        $category->delete();
        return redirect()->route('admin.categories')->with('success' , 'Category Deleted');
    }

    public function advertises()
    {
        $advertise = AdvertiseData::latest()->get();
        return view('admin.advertise.advertise_list', ['advertise' => $advertise]);
    }

    public function advertise_review($id)
    {
        $hasSubmittedKYC = $this->hasSubmittedKYC();
        $user = Auth::user();
        $userkyc = $user->kyc;

        if ($userkyc) {
            $verifiedkyc = $userkyc->verified;
        } else {
            $verifiedkyc = false;
        }
        $advertise = AdvertiseData::findorfail($id);
        return view('admin.advertise.advertise_review', ['advertise' => $advertise, 'hasSubmittedKYC' => $hasSubmittedKYC,
            'verifiedkyc' => $verifiedkyc]);
    }

    public function advertise_delete($id)
    {
        $advertise = AdvertiseData::findorfail($id);
        $advertise->delete();
        return redirect()->route('admin.advertises')->with('success', 'Advertise Deleted');
    }

    public function advertise_update(Request $request, $id)
    {
        $advertise = AdvertiseData::findOrFail($id);
        if ($request->isMethod('post'))
        {
            // Verify KYC
            if ($advertise->verified == 0)
            {
                $advertise->update(['verified' => 1]);
            }
            else
            {
                $advertise->update(['verified' => 0]);
            }
        }
        elseif ($request->isMethod('delete'))
        {
            // Delete KYC
            $advertise->delete();
        }
        return redirect()->route('admin.advertises')->with('success', 'Advertise Updated');
    }

    // Jobs

    public function jobsCategories()
    {
        $category = JobsCategory::all();

        return view('admin.jobs.jobsCategoryList', ['category' => $category]);
    }

    public function jobsCategories_create()
    {
        return view('admin.jobs.jobsCategory_create');
    }

    public function jobsCategories_store(Request $request)
    {
        $validate = $request->validate([
            'categoryName' => 'required|max:255'
        ]);
        JobsCategory::create($validate);

        return redirect()->route('admin.jobsCategories')->with('success', 'Category Created');
    }

    public function jobsCategories_edit($id)
    {
        $category = JobsCategory::all()->find($id);
        return view('admin.jobs.jobsCategory_edit', ['category' => $category]);
    }

    public function jobsCategories_update(Request $request, $id)
    {
        $validate = $request->validate([
            'categoryName' => 'required|max:255'
        ]);
        $category = JobsCategory::find($id);

        $category->update($validate);
        return redirect()->route('admin.jobsCategories')->with('success' , 'Category Updated');
    }

    public function jobsCategories_delete($id)
    {
        $category = JobsCategory::findorfail($id);
        $category->delete();
        return redirect()->route('admin.jobsCategories')->with('success' , 'Category Deleted');
    }

    public function jobs()
    {
        $jobs = JobsData::latest()->get();
        return view('admin.jobs.jobs_list', ['jobs' => $jobs]);
    }

    public function jobs_review($id)
    {
        $hasSubmittedKYC = $this->hasSubmittedKYC();
        $user = Auth::user();
        $userkyc = $user->kyc;

        if ($userkyc) {
            $verifiedkyc = $userkyc->verified;
        } else {
            $verifiedkyc = false;
        }
        $jobs = JobsData::findorfail($id);
        return view('admin.jobs.jobs_review', ['jobs' => $jobs, 'hasSubmittedKYC' => $hasSubmittedKYC,
            'verifiedkyc' => $verifiedkyc]);
    }

    public function jobs_delete($id)
    {
        $jobs = JobsData::findorfail($id);
        $jobs->delete();
        return redirect()->route('admin.jobs')->with('success', 'Job Deleted');
    }

    public function jobs_update(Request $request, $id)
    {
        $jobs = JobsData::findOrFail($id);
        $user = $jobs->user;
        if ($request->isMethod('post'))
        {
            // Verify Jobs
            if ($jobs->verified == 0)
            {
                $jobs->update(['verified' => 1]);
                if ($user->userGroup == 'verified_user')
                    {
                        $user->update(['userGroup' => 'job_owner']);
                    }
            }
            else
            {
                $jobs->update(['verified' => 0]);

                // Check if user has another verified job
                $hasAnotherVerifiedJob = JobsData::where('userid', $user->id)->where('verified', 1)->where('id', '<>', $id)->exists();

                if (!$hasAnotherVerifiedJob)
                {
                    // Update User Group
                    $user->update(['userGroup' => 'verified_user']);
                }
            }
        }
        elseif ($request->isMethod('delete'))
        {
            // Delete Jobs
            $jobs->delete();
        }
        return redirect()->route('admin.jobs')->with('success', 'Job Updated');
    }



    // Check if users has KYC in KYC_Data Table by email
    public function hasSubmittedKYC()
    {
        $user = auth()->user();
        return KycData::where('email', $user->email)->count() > 0;
    }
}
