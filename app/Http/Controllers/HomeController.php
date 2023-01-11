<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class HomeController extends Controller
{
    public function index()
    {
        if (Gate::allows('isUser')) {
            // The user is authorized, retrieve all the rows from the Pengumuman model
            $pengumuman = Pengumuman::all();
        
            // Return the view 'user.pengumuman.index', passing the variable $pengumuman as data to the view
            return view('user.pengumuman.index', compact('pengumuman'));
         } else {
            // The user is not authorized, redirect them to the login page
            return redirect('login');
         }
        
    }
}
