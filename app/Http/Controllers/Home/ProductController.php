<?php

namespace App\Http\Controllers\Home;

use App\Models\HappyCustomer;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\sss;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{

    public function showAllProduct($id){

        if(request()->has('cat')){
            $categoryname = request('cat');
        } else {
            return redirect()->back();
        }
        $categories = ProductCategory::whereNull('parent_id')->orderBy('id', 'ASC')->get();
        $childcategories = ProductCategory::where('parent_id',$id)->get();
        return view('products.allproducts',compact('categories','childcategories','categoryname'));
        
    }
    public function showOneProducts($id){

        if(request()->has('cat')){
            $categoryname = request('cat');
        } else {
            return redirect()->back();
        }
        $categories = ProductCategory::whereNull('parent_id')->orderBy('id', 'ASC')->get();
        $childcategories = ProductCategory::where('parent_id',$id)->get();
        $all_products = Product::whereIn('product_category_id', $childcategories->pluck('id'))->get();
        $sss1 = sss::orderBy('id', 'asc')->take(5)->get();
        $sss2 = sss::orderBy('id', 'desc')->take(5)->get();
        $happycustomer = HappyCustomer::orderBy('id','asc')->get();
        return view('products.oneproducts',compact('categories','childcategories','categoryname','all_products','sss1','sss2','happycustomer'));
        
    }

    public function DeleteProduct($id)
    {

     

        Product::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Product Deleted Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);

    }
    public function AllProduct()
    {
        $product = Product::latest()->get();
        return view('admin.products.product_all', compact('product'));
    }

    public function AddProduct()
    {
        $categories = ProductCategory::whereNull('parent_id')->orderBy('product_category_name', 'ASC')->get();
        return view('admin.products.product_add', compact('categories'));
    }

    public function StoreProduct(Request $request)
    {


        Product::insert([
            'product_category_id' => $request->product_category_id,
            'product_title' => $request->product_title,
            'product_desc1' => $request->product_desc1,
            'product_desc2' => $request->product_desc2,
            'product_desc3' => $request->product_desc3,
            'product_desc4' => $request->product_desc4,
            'product_desc5' => $request->product_desc5,
            'product_desc6' => $request->product_desc6,
            'product_desc7' => $request->product_desc7,
            'product_desc8' => $request->product_desc8,
            'product_price' => $request->product_price,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Product Inserted Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->route('all.product')->with($notification);
    }

    public function EditProduct($id)
    {
        $product = Product::findOrFail($id);
        $categories = ProductCategory::orderBy('product_category_name', 'ASC')->get();
        return view('admin.products.product_edit', compact('product', 'categories'));
    }

    public function UpdateProduct(Request $request)
    {
        $product_id = $request->id;
        if ($request->file('product_image')) {
            $image = $request->file('product_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            \Nette\Utils\Image::make($image)->resize(430, 327)->save('upload/products/' . $name_gen);

            $save_url = 'upload/products/' . $name_gen;
            Product::findOrFail($product_id)->update([
                'product_category_id' => $request->product_category_id,
                'product_title' => $request->product_title,
                'product_desc1' => $request->product_desc1,
                'product_desc2' => $request->product_desc2,
                'product_desc3' => $request->product_desc3,
                'product_desc4' => $request->product_desc4,
                'product_desc5' => $request->product_desc5,
                'product_desc6' => $request->product_desc6,
                'product_desc7' => $request->product_desc7,
                'product_desc8' => $request->product_desc8,
                'product_price' => $request->product_price,
            ]);
            $notification = array(
                'message' => 'Product Updated Successfully with Image',
                'alert-type' => 'success'
            );
            return Redirect()->route('all.product')->with($notification);
        } else {
            Product::findOrFail($product_id)->update([
                'product_category_id' => $request->product_category_id,
                'product_title' => $request->product_title,
                'product_desc1' => $request->product_desc1,
                'product_desc2' => $request->product_desc2,
                'product_desc3' => $request->product_desc3,
                'product_desc4' => $request->product_desc4,
                'product_desc5' => $request->product_desc5,
                'product_desc6' => $request->product_desc6,
                'product_desc7' => $request->product_desc7,
                'product_desc8' => $request->product_desc8,
                'product_price' => $request->product_price,
            ]);
            $notification = array(
                'message' => 'Product Updated Successfully without Image',
                'alert-type' => 'success'
            );
            return Redirect()->route('all.product')->with($notification);
        }
    }

    public function ProductDetails($id)
    {
        $product = Product::findOrFail($id);
        $all_product = Product::latest()->limit(5)->get();
        $categories = ProductCategory::orderBy('product_category_name', 'ASC')->get();
        return view('productdetay', compact('product','all_product','categories'));
    }

    public function CategoryProduct($id)
    {
        $product_post = Product::where('product_category_id', $id)->orderBy('id','DESC')->get();
        $categories = ProductCategory::orderBy('product_category_name', 'ASC')->get();
        $all_product = Product::latest()->limit(5)->get();
        $category_name = ProductCategory::findOrFail($id);

        return view('productasc', compact('product_post','categories','all_product','category_name'));
    }

    public function getSubcategories($categoryId)
    {
      
        $subCategories = ProductCategory::where('parent_id', $categoryId)->get();

        return response()->json(['subCategories'=>$subCategories]);
    }
    public function getSubcategoriesAlt($categoryId)
    {
      
        $subCategories = ProductCategory::where('parent_id', $categoryId)->get();

        return response()->json(['subCategories'=>$subCategories]);
    }
    public function getSubProduct($categoryId)
    {
      
        $subProducts = Product::where('product_category_id', $categoryId)->get();

        return response()->json(['subProducts'=>$subProducts]);
    }


}
