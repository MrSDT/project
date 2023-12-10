<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\AdvertiseData;
use App\Models\JobsData;
use App\Models\KycData;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        return view('user.index');
    }

    public function userDashboard()
    {
        $userinfo = auth()->user();
        $adcount = $userinfo->advertise->count();
        return view('user.dashboard', ['userinfo' => $userinfo, 'adcount' => $adcount]);
    }

    public function userDashboard_status()
    {
        $userinfo = auth()->user();
        $ads = AdvertiseData::all();
        $verifiedads = $ads->where('verified', 1)->count();
        $notverifiedads = $ads->where('verified', 0)->count();
        $jobs = JobsData::all();
        $verifiedjobs = $jobs->where('verified', 1)->count();
        $notverifiedjobs = $jobs->where('verified', 0)->count();
        $user = Auth::user();
        $userkyc = $user->kyc;

        if ($userkyc) {
            $verifiedkyc = $userkyc->verified;
        } else {
            $verifiedkyc = false;
        }
        return view('user.dashboard_status', ['userinfo' => $userinfo, 'ads' => $ads, 'verifiedads' => $verifiedads ,
            'notverifiedads' => $notverifiedads ,'jobs' => $jobs, 'verifiedjobs' => $verifiedjobs,
            'notverifiedjobs' => $notverifiedjobs, 'verifiedkyc' => $verifiedkyc]);
    }


    public function users_list()
    {
        $users = User::latest()->get();
        return view('user.users_list', ['users' => $users]);
    }


    public function user_profile($id)
    {
        $user = User::findorfail($id);
        return view('user.user_profile', ['user' => $user]);
    }


}
