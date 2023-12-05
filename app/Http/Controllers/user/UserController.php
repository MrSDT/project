<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

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


}
