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
        $data = KycData::all();
        return view('admin.kyc.kyc', ['data' => $data]);
    }

    public function kyc_review($id)
    {
        $kycDetails = KycData::all()->find($id);
        return view('admin.kyc.kyc_review', ['kycDetails' => $kycDetails]);
    }
}
