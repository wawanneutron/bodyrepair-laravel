<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function myAccount()
    {
        return view('pages.dashboard-admin.profile.index');
    }
}
