<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Groups;
use App\Models\Kuesioner;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {   
        $user = User::count();
        $role = Groups::count();
        $category = Kuesioner::count();
        return view('admin.dashboard.index',compact('user','role','category'));
    }
}
