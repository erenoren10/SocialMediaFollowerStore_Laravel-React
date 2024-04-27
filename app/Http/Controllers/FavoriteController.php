<?php

namespace App\Http\Controllers;

use App\Models\myFavorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function addFavorite(Request $request)
    {
        if (Auth::check()) {
            $user = $request->user_id;
            $product = $request->product_id;


            $existingFavorite = myFavorite::where('user_id', $user)
                ->where('product_id', $product)
                ->first();

            if (!$existingFavorite) {
                // Eğer aynı product_id'ye sahip favori yoksa ekle
                myFavorite::create([
                    'user_id' => $user,
                    'product_id' => $product,
                ]);
            }
            return redirect()->back();
        }else{
           return redirect()->route('/login');  
        }
    }

    public function deleteFavorite($id)
    {
        myFavorite::find($id)->delete();
        return redirect()->back();
    }



}