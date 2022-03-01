<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
class UserController extends Controller
{
    public function index()
    {
        return view('admin.user.index');
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password',
        ];
        
        $message = [
            'name.required' => 'Name is required',
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
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'remember_token' => Str::random(60),
        ]);

        $user->role()->sync($request['groups_id']);

        if($user) {
            return redirect()->route('admin.user.index')->with('success', 'User has been created');
        } else{
            return redirect()->back()->with('error', 'Failed to create user');
        }
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        $user->role()->sync($request['groups_id']);

        return redirect()->route('admin.user.index')->with('success', 'User has been updated');
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
            return redirect()->route('admin.user.index')->with('success', 'Password has been changed');
        } else {
            return redirect()->back()->with('error', 'Password lama tidak sama');
        }
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('admin.user.index')->with('success', 'User has been deleted');
    }
}
