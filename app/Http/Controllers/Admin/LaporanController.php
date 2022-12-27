<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        if(Gate::allows('isAdmin')){
            if(request()->ajax())
        {
            $data = User::
            join('users_groups','users.id','=','users_groups.user_id')
            ->select('users.*')
            ->where('users_groups.groups_id','=',2)
            ->get();
            return datatables()->of($data)
                    ->AddIndexColumn()
                 
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin.laporan.index');
        } else {
            return redirect('login');
        }
    
    }


}
