<?php

namespace App\Http\Controllers;

use App\Media\Categories;
use Illuminate\Http\Request;

use App\Http\Requests;

class CategoriesController extends Controller
{
    protected function create()
    {
        $categories = Categories::orderBy('created_at','desc')->get();
        return view('admin.category.categories',compact('categories'));
    }

    protected function store(Request $request)
    {
        $this->validate($request,['mediaCategory'=> 'required']);

        $categoryStore = Categories::create([
            'catTitle' => $request->input('mediaCategory'),
            'remember_token' => $request->input('_token')
        ]);
        if($categoryStore == true)
            return redirect('/admin/categories')->with('success','create Category succesfully');
        return back()->with('warning','error happened')->withInput();
    }

    protected function edit($id)
    {
        $category = $this->getCat($id);
        return view('admin.category.editCategory',compact('category'));
    }


    protected function update($id,Request $request)
    {
        $this->validate($request,['mediaCategory'=> 'required']);
        $this->getCat($id)->update(['catTitle' => $request->input('mediaCategory')]);
        return redirect('/admin/categories')->with('success','edited category');
    }

    protected function catDelete($id)
    {
        $category = $this->getCat($id);
        $category->delete();
        return redirect('/admin/categories')->with('warning','Delete category');
    }

    private function getCat($id)
    {
        return Categories::where('id',$id)->first();
    }
}
