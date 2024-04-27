<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\FakeNotification;
use App\Models\HappyCustomer;
use App\Models\myFavorite;
use App\Models\PopupNotification;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\sss;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use PhpParser\Builder\Function_;

class DemoController extends Controller
{
    public function Home()
    {        
        return view('frontend.index');
    }

    public function NotFound()
    {
        $categories = ProductCategory::whereNull('parent_id')->orderBy('id', 'ASC')->get();
        $all_products = Product::latest()->get();
        $all_products1 = Product::orderBy('id','asc')->get();
        $fakenotification = FakeNotification::orderBy('id', 'asc')->get();
        $popupnotification = PopupNotification::orderBy('id', 'asc')->get();
        $users = User::where('id', Auth()->id())->with('child')->with('parent')->get();
        $sss1 = sss::orderBy('id', 'asc')->take(5)->get();
        $sss2 = sss::orderBy('id', 'desc')->take(5)->get();
        $happycustomer = HappyCustomer::orderBy('id','asc')->get();
        return view('index', compact('all_products','all_products1','categories','fakenotification','users','popupnotification','sss1','sss2','happycustomer'));

    }

    public function getSubcategories($categoryId)
    {
        $subCategories = ProductCategory::where('parent_id', $categoryId)->get();

        return response()->json(['subCategories'=>$subCategories]);
    }

    public function getPackages($categoryId)
    {
      
        $packages = Product::where('product_category_id', $categoryId)->get();

        return response()->json(['packages'=>$packages]);
    }

    public function getPrices($categoryId)
    {
      
        $packages = Product::where('id', $categoryId)->get();

        $price = $packages->pluck('product_price');

        $product_id =$packages->pluck('id');

        return response()->json(['price'=>$price,'product_id'=>$product_id]);
    }

}
