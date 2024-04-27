<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use Illuminate\Support\Carbon;


class ProductCategoryController extends Controller
{
    public function AllProductCategory()
    {
        $product_category = ProductCategory::latest()->get();
        return view('admin.product_category.product_category_all',compact('product_category'));
    }

    public function AddProductCategory()
    {
        $categories = ProductCategory::whereNull('parent_id')->latest()->get();
        return view('admin.product_category.product_category_add',compact('categories'));
    }

    public function StoreProductCategory(Request $request)
    {
        $request->validate([
            'product_category_name' => 'required',
        ],[
            'product_category_name.required' => 'Input Product Category Name',
        ]);

        ProductCategory::insert([
            'product_category_name' => $request->product_category_name,
            'parent_id' => $request->product_category_id,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Product Category Inserted Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->route('all.product.category')->with($notification);
    }

    public function EditProductCategory($id)
    {
        $product_category = ProductCategory::findOrFail($id);
        return view('admin.product_category.product_category_edit',compact('product_category'));
    }

    public function UpdateProductCategory(Request $request,$id)
    {
        ProductCategory::findOrFail($id)->update([
            'product_category_name' => $request->product_category_name,
            'parent_id' => $request->parent_id,
            'updated_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Product Category Updated Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->route('all.product.category')->with($notification);
    }

    public function DeleteProductCategory($id)
    {
        ProductCategory::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Product Category Deleted Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    
    
}
