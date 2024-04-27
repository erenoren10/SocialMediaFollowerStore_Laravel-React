<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use View;

class ServicesController extends Controller
{
    public function showServices()
    {
        $categories = ProductCategory::whereNull("parent_id")->orderBy('product_category_name', 'ASC')->get();
        return view('services', compact('categories'));
    }
}
