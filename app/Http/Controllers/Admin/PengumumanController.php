<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use RealRashid\SweetAlert\Facades\Alert;

class PengumumanController extends Controller
{
    public function index()
    {
        if(Gate::allows('isAdmin')){
            if(request()->ajax())
        {
            $data = Pengumuman::latest()->get();
            return datatables()->of($data)
                    ->AddIndexColumn()
                    ->addColumn('action', function($data){
                        $edit = '<a href="'.route('pengumuman.edit', $data->id).'" class="btn btn-info btn-sm">Edit</a>';
                        $delete = '<a href="javascript:void(0)" onClick="deleteData('.$data->id.')" class="btn btn-danger btn-sm">Delete</a>
                        <form id="delete-form-'.$data->id.'" action="'.route('pengumuman.destroy', $data->id).'" method="POST" style="display: none;">
                            <input type="hidden" name="_method" value="DELETE">
                            '.csrf_field().'
                        </form>';
                        return $edit.' '.$delete;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin.pengumuman.index');
        } else {
            return redirect('login');
        }
   
    }

    public function create()
    {
        return view('admin.pengumuman.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ],
        [
            'title.required' => 'Name is required',
        ]);

        $menu = Pengumuman::create([
            'title' => $request->title,
            'content' => $request->content
        ]);
        
        if($menu) {
            Alert::success('Success', 'Success update menu');
            return redirect()->route('pengumuman.index');
        } else{
            Alert::error('Failed', 'Failed to update menu');
            return redirect()->back();
        }
    }

    
    public function edit($id)
    {
        $pengumuman = Pengumuman::find($id);
        return view('admin.pengumuman.edit', compact('pengumuman'));
    }

    public function show($id)
    {
        $pengumuman = Pengumuman::find($id);
        return view('user.pengumuman.show', compact('pengumuman'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
        ],
        [
            'title.required' => 'Name is required',
        ]);

        $pengumuman = Pengumuman::find($id);
        $pengumuman->title = $request->title;
        $pengumuman->content = $request->content;
        $pengumuman->save();

        if($pengumuman) {
            Alert::success('Success', 'Success update menu');
            return redirect()->route('pengumuman.index');
        } else{
            Alert::error('Failed', 'Failed to update menu');
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        $pengumuman = Pengumuman::find($id);
        $pengumuman->delete();

        if($pengumuman) {
            Alert::success('Success', 'Success delete menu');
            return redirect()->route('pengumuman.index');
        } else{
            Alert::error('Failed', 'Failed to delete menu');
            return redirect()->back();
         }
    }

    public function user_pengumuman()
    {
       

        if(Gate::allows('isUser')){
            $pengumuman = Pengumuman::all();
            return view('user.pengumuman.index ', compact('pengumuman'));
        } else {
            return redirect('login');
        }
    }
    
}
