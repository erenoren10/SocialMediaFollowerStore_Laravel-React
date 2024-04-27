<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartDetails;
use App\Models\DiscountCodes;
use App\Models\myFavorite;
use App\Models\Order;
use App\Models\ProductCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function showProfile()
    {
        $categories = ProductCategory::whereNull('parent_id')->orderBy('id', 'ASC')->get();

        return view('profile.profil',compact('categories'));
    }

    public function showOrders()
    {
        $categories = ProductCategory::whereNull('parent_id')->orderBy('id', 'ASC')->get();

        $cart = Cart::Where('user_id', Auth::id())->pluck('cart_id');
        $orders = Order::Where('cart_id',$cart)->simplePaginate(12);
        return view('profile.orders',compact('orders','categories'));
    }
    public function showCustomerPanel()
    {
        $categories = ProductCategory::whereNull('parent_id')->orderBy('id', 'ASC')->get();

        $cart = Cart::Where('user_id', Auth::id())->pluck('cart_id');
        $orders = Order::Where('cart_id',$cart)->simplePaginate(13);
        return view('profile.customerpanel',compact('orders','categories'));
    }
    

    public function showAffiliateMarketing()
    {
        $categories = ProductCategory::whereNull('parent_id')->orderBy('id', 'ASC')->get();

        $users = User::where('id', Auth()->id())->with('child')->with('parent')->first();
        return view('profile.affiliatemarketing',compact('users','categories'));
    }
    public function showMyFavorite()
    {
        $categories = ProductCategory::whereNull('parent_id')->orderBy('id', 'ASC')->get();

        $favorite = myFavorite::where('user_id', Auth()->id())->get();
        return view('profile.myfavorite',compact('favorite','categories'));
    }

    public function showBalance()
    {
        $categories = ProductCategory::whereNull('parent_id')->orderBy('id', 'ASC')->get();

        return view('profile.balance',compact('categories'));
    }
    public function showCodes()
    {
        $categories = ProductCategory::whereNull('parent_id')->orderBy('id', 'ASC')->get();

        $discode = DiscountCodes::latest()->get();
        return view('profile.discountcodes',compact('discode','categories'));
    }

    public function update(Request $request)
    {   
        if(Auth::check()){
            $user = Auth::user();

            $user->update([
                'username'=> $request->input('username'),
                'name'=> $request->input('name'),
                'email'=> $request->input('email'),
                'company_name' => $request->input('company_name'),
                'tax_number' => $request->input('tax_number'),
                'billing_address' => $request->input('billing_address'),
            ]);
        }

        return redirect()->route('profil')->with('success', 'Profile updated successfully.');
    }
    public function uploadProfilePhoto(Request $request)
    {
        $request->validate([
            'profile_photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = Auth::user();

        if ($request->hasFile('profile_photo')) {
            $photoPath = $request->file('profile_photo')->store('profile_photos', 'public');
            $user->profile_photo = $photoPath;
            $user->save();
        }

        return redirect()->back()->with('success', 'Profil fotoğrafı başarıyla yüklendi.');
    }


}
