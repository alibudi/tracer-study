<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
       if(request()->ajax())
       {
           $category = Category::latest()->get();
           return datatables()->of($category)
           ->AddIndexColumn()
           ->addColumn('action', function($data){
               $edit = '<a href="'.route('category.edit', $data->id).'" class="btn btn-info btn-sm">Edit</a>';
                $delete = '<a href="javascript:void(0)" onClick="deleteData('.$data->id.')" class="btn btn-danger btn-sm">Delete</a>
                <form id="delete-form-'.$data->id.'" action="'.route('category.destroy', $data->id).'" method="POST" style="display: none;">
                   <input type="hidden" name="_method" value="DELETE">
                     '.csrf_field().'
                </form>';
                return $edit.' '.$delete;
           })
           ->rawColumns(['action'])
           ->make(true);
       }
         return view('admin.category.index');
    }
    
    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
       if ($request->method == 'patch') {
            $this->update($request, $request->id);
        } else {
            $validator = Validator::make($request->all(), [
                'name' => 'required|unique:categories',
                // 'slug' => 'required|unique:categories',
            ]);
            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()], 401);
            }
            $category = new Category;
            $category->name = $request->name;
            $category->slug = Str::slug($request->name);
            $category->save();
          return redirect()->route('category.index')->with('success', 'Category added successfully');

        }
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required',
            'slug' => 'required',
        ];

        $message = [
            'name.required' => 'Name is required',
            'slug.required' => 'Slug is required',
        ];

        $validator = Validator::make($request->all(), $rules, $message);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $category = Category::find($id);
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->save();

        if($category) {
            return redirect()->route('category.index')->with('success', 'Success update category');
        } else{
            return redirect()->back()->with('error', 'Failed to update category');
        }
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();

        if($category) {
            Alert::success('Success', 'Success delete category');
            return redirect()->route('category.index');
        } else{
            Alert::error('Error', 'Failed to delete category');
            return redirect()->route('category.index');
            // return redirect()->back()->with('error', 'Failed to delete category');
        }
    }
}
