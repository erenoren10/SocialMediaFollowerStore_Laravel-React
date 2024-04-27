<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use Illuminate\Http\Request;

class AboutYController extends Controller
{
    public function index()
    {
        $categories = ProductCategory::whereNull('parent_id')->orderBy('id', 'ASC')->get();
        return view('about',compact('categories'));
    }
}
