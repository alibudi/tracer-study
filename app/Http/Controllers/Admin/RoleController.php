<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Groups;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Groups::paginate(10);
        return view('admin.role.index', compact('roles'));
    }

    public function create()
    {
        return view('admin.role.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
        ];

        $message = [
            'name.required' => 'Name is required',
        ];

        $validator = Validator::make($request->all(), $rules, $message);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $role = Groups::create([
            'name' => $request->name,
        ]);

        if($role) {
            return redirect()->route('role.index')->with('success', 'Role has been created');
        } else{
            return redirect()->back()->with('error', 'Failed to create role');
        }
    }

    public function edit($id)
    {
        $role = Groups::find($id);
        return view('admin.role.edit', compact('role'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required',
        ];

        $message = [
            'name.required' => 'Name is required',
        ];

        $validator = Validator::make($request->all(), $rules, $message);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $role = Groups::find($id);
        $role->name = $request->name;
        $role->save();

        if($role) {
            return redirect()->route('role.index')->with('success', 'Role has been updated');
        } else{
            return redirect()->back()->with('error', 'Failed to update role');
        }
    }

    public function destroy($id)
    {
        $role = Groups::find($id);
        $role->delete();

        if($role) {
            return redirect()->route('role.index')->with('success', 'Role has been deleted');
        } else{
            return redirect()->back()->with('error', 'Failed to delete role');
        }
    }
    
}
