<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    public function index(){
        $brands = Brand::orderBy('id', 'DESC')->paginate(5);
        return view('brand.index',compact('brands'));
    }
    public function create(){
        return view('brand.create');
    }
    public function store(Request $request){
        $request->validate([
            'brand_name' => 'required',
        ]);
        Brand::create($request->post());

        return redirect()->route('brand.index')->with('success','brand has been added');
    }
    public function show(Brand $brand){
        return view('brand.show',compact('brand'));
    }

    public function edit(Brand $brand){
        return view('brand.edit',compact('brand'));
    }
    public function update(Request $request,Brand $brand){
        $request->validate([
            'brand_name' => 'required',
        ]);
        $brand->fill($request->post())->save();

        return redirect()->route('brand.index')->with('success','brand has been updated');
    }
    public function destroy(Brand $brand){
        $brand->delete();
        return redirect()->route('brand.index')->with('success','brand has been deleted');
    }
}