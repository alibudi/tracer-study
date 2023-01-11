<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\Usersimport;
use App\Models\Groups;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public function index(Request $request)
    {

        if(Gate::allows('isAdmin')){
            if(request()->ajax())
        {
            // $data = User::latest()->get();
            $data = User::
            join('users_groups','users.id','=','users_groups.user_id')
            ->select('users.*')
            ->where('users_groups.groups_id','=',2)
            ->get();
            return datatables()->of($data)
                    ->AddIndexColumn()
                    ->addColumn('action', function($data){
                        $edit = '<a href="'.route('user.edit', $data->id).'" class="btn btn-info btn-sm">Edit</a>';
                        $delete = '<a href="javascript:void(0)" onClick="deleteData('.$data->id.')" class="btn btn-danger btn-sm">Delete</a>
                        <form id="delete-form-'.$data->id.'" action="'.route('user.destroy', $data->id).'" method="POST" style="display: none;">
                            <input type="hidden" name="_method" value="DELETE">
                            '.csrf_field().'
                        </form>';
                        return $edit.' '.$delete;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin.user.index');
        } else {
            return redirect('login');
        }
        // $user = User::paginate(10);
        // return view('admin.user.index', compact('user'));
    }

    public function create()
    {
        $roles = Groups::all();
        return view('admin.user.create',compact('roles'));
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'nis'   => 'required',
            'agama' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required|max:13',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password',
        ];
        
        $message = [
            'name.required' => 'Name is required',
            'nis.required'   => 'Nis is required',
            'agama.required' => 'Agama is required',
            'jenis_kelamin.required' => 'Jenis kelamin is required',
            'alamat.required' => 'Alamat is required',
            'no_hp.required' => 'No handphone is required',
            'email.required' => 'Email is required',
            'email.email' => 'Email is invalid',
            'email.unique' => 'Email is already exists',
            'password.required' => 'Password is required',
            'password.min' => 'Password is at least 6 characters',
            'password_confirmation.required' => 'Password confirmation is required',
            'password_confirmation.same' => 'Password confirmation is not match',
        ];

        $validator = Validator::make($request->all(), $rules, $message);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $user = User::create([
            'nis'   => $request->nis,
            'alamat' => $request->alamat,
            'agama' => $request->agama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'no_hp' => $request->no_hp,
            'name' => $request->name,
            'email' => $request->email,
            'tahun' => $request->tahun,
            'jurusan' => $request->jurusan,
            'pekerjaan' => $request->pekerjaan,
            'password' => bcrypt($request->password),
            'remember_token' => Str::random(60),
        ]);

        $user->role()->sync($request['group_id']);

        if($user) {
            return redirect()->route('user.index')->with('success', 'User has been created');
        } else{
            return redirect()->back()->with('error', 'Failed to create user');
        }
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.user.edit', compact('user'));
    }

    public function editUser($id)
    {
        $user = User::find($id);
        return view('user.profil.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->nis = $request->nis;
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->agama = $request->agama;
        $user->alamat = $request->alamat;
        $user->email = $request->email;
        $user->tahun = $request->tahun;
        $user->jurusan = $request->jurusan;
        $user->pekerjaan = $request->pekerjaan;
        $user->save();

        $user->role()->sync($request['groups_id']);

        return redirect()->route('user.index')->with('success', 'User has been updated');
    }

    public function updateUser(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->nis = $request->nis;
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->agama = $request->agama;
        $user->alamat = $request->alamat;
        $user->email = $request->email;
        $user->tahun = $request->tahun;
        $user->jurusan = $request->jurusan;
        $user->pekerjaan = $request->pekerjaan;
        $user->save();

        // $user->role()->sync($request['groups_id']);
        // return redirect()-back();
        return redirect()->back()->with('success', 'Success update user');
        // return redirect()->route('admin.user.edit')->with('success', 'User has been updated');
    }

    public function changePassword(Request $request, $id)
    {
        $rules = [
            'old_password'          => 'required',
            'password'              => 'required|confirmed'
        ];
 
        $messages = [
            'old_password.required' => 'Password Lama wajib diisi',
            'password.required'     => 'Password Baru wajib diisi',
            'password.confirmed'    => 'Password tidak sama dengan konfirmasi password'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        $account = User::find($id);
        $old_password = $account->password;
        if(Hash::check($request->old_password, $old_password)) {
            $account->password = Hash::make($request->password);
            $account->save();
            return redirect()->route('user.index')->with('success', 'Password has been changed');
        } else {
            return redirect()->back()->with('error', 'Password lama tidak sama');
        }
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('user.index')->with('success', 'User has been deleted');
    }

    public function import_excel(Request $request)
    {  
        //  $user = new User();
         $data =  Excel::import(new Usersimport, $request->file('file')->store('files'));
    //     $user->role()->sync($request['group_id']));
       
       
    //    if($user) {
    //     return redirect()->route('user.index')->with('success', 'User has been created');
    // } else{
    //     return redirect()->back()->with('error', 'Failed to create user');
    // }
        return redirect()->back();
        // dd($data);
    }

    public function alumni()
    {
        $user =  User::
                        join('users_groups','users.id','=','users_groups.user_id')
                        ->select('users.*')
                        ->where('users_groups.groups_id','=',2)
                        ->get();
                    
        // dd($alumni);
        return view('admin.user.index', compact('user'));

    }
}
