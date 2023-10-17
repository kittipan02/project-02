<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::orderBy('id', 'DESC')->paginate(5);
        return view('category.index',compact('categories'));
    }
    public function create(){
        return view('category.create');
    }
    public function store(Request $request){
        $request->validate([
            'category_name' => 'required',
        ]);
        Category::create($request->post());

        return redirect()->route('category.index')->with('success','Category has been added');
    }
    public function show(Category $category){
        return view('category.show',compact('category'));
    }

    public function edit(Category $category){
        return view('category.edit',compact('category'));
    }
    public function update(Request $request,Category $category){
        $request->validate([
            'category_name' => 'required',
        ]);
        $category->fill($request->post())->save();

        return redirect()->route('category.index')->with('success','Category has been updated');
    }
    public function destroy(Category $category){
        $category->delete();
        return redirect()->route('category.index')->with('success','Category has been deleted');
    }
}
