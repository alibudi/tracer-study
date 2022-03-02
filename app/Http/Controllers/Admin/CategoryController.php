<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::paginate(10);
        return view('admin.category.index', compact('category'));
    }
    
    public function create()
    {
        return view('admin.category.create');
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

        $category = Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        if($category) {
            return redirect()->route('category.index')->with('success', 'Success create category');
        } else{
            return redirect()->back()->with('error', 'Failed to create category');
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
            return redirect()->route('category.index')->with('success', 'Success delete category');
        } else{
            return redirect()->back()->with('error', 'Failed to delete category');
        }
    }
}
