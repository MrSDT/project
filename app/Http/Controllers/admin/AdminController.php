<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\KycData;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function users()
    {
        $users = User::all();
        return view('admin.users.users', ['users' => $users]);
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
        if ($request->isMethod('post'))
        {
            // Verify KYC
            if ($kycdata->verified == 0)
            {
                $kycdata->update(['verified' => 1]);
            }
            else
            {
                $kycdata->update(['verified' => 0]);
            }
        }
        elseif ($request->isMethod('delete'))
        {
            // Delete KYC
            $kycdata->delete();
        }
        return redirect()->route('admin.kyc')->with('success', 'KYC Updated');
    }


}
