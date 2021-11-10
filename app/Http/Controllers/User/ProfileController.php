<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function myAccount()
    {
        return view('pages.dashboard-user.profile.index');
    }
}
