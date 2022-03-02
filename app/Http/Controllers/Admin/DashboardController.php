<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Groups;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = User::count();
        $role = Groups::count();
        $category = Category::count();
        return view('admin.dashboard.index',compact('user','role','category'));
    }
}
