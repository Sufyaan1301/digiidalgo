<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Citizen;
use Illuminate\View\view;
use Redirect;


class CitizenImgController extends Controller
{
    public function index() : view 
    {
        $citizens = Citizen::all();
        return view('index', compact('citizens'));
    }
    public function update($Request,$id){
        $_REQUEST->validate([
            'image'=>'required|image|mimes:jpeg,jpg,png|max:2080',
        ]);
        //cari data berdasarkan id
        $product=Product::findorfail($id);
        $input=$Request->all();
        if($image=$Request->file('image')){
            $destinationPath='image/';
            $profileImage=date('YmdHis') . '.' . $image->getclientoriginalextension();
            $image->move($destinationPath,$profileImage);
            if($product->image&&file::exists(public_path($product->image))){
                file::delete(public_path($product->image));
            }
            $input['image']='image/' . $profileImage;
        }
        //upload data gambar baru
        $product->update($input);
        return redirect()->route('update')->with('formupdate','product created successfully');
    }
    public function destroy($id){
        $product=product::findorfail($id);
        if($product->image&&file::exists(public_path($product->image))){
            file::delete(public_path($product->image));
        }
        $product->delete();
        return redirect()->route('destroy')->with('formdelete','product delete succsessfully');
    }
}
