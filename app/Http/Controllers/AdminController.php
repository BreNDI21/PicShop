<?php

namespace App\Http\Controllers;

use App\Model\Admin;
use App\Model\Category;
use App\Model\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.admin_index');
    }
    public function enter(Request $request)
    {

        $admin = Admin::all();
        foreach ($admin as $item) {

        }
        if($item->name == $request->name && $item->email == $request->email && $item->password == $request->password){
            return redirect(route('adminPanel'));
        }
        else {
            return redirect(route('admin.index'));
        }
    }
    public function adminPanel()
    {
        return view('admin.adminPanel');
    }
    public function createCategory(Request $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();
        return redirect(route('adminPanel'));
    }
    public function createProduct(Request $request)
    {
        $product = new Products();
        $product->name = $request->name;
        $product->comment = $request->comment;
        $product->price = $request->price;
        $max = 0;
        $products = Products::all();
        foreach ($products as $pr){

            if ($max < $pr->id){
                $max = $pr->id;
            }
        }
        $image = $request->file('image');
        $imageName = $max+1 . '.' . $request->file('image')->getClientOriginalExtension();
        $request->file('image')->move(base_path() . '/public/images', $imageName);
        $path = base_path() . '\public\images'. $imageName;
        $prod_id = $max + 1;

        $path = URL::asset('/images/') . "/" .$prod_id . "." . $request->file('image')->getClientOriginalExtension();
        $product->image = $path;
        $product->category_id = $request->category_id;
        $product->save();
        return redirect(route('adminPanel'));
    }
}
