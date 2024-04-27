<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartDetails;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Illuminate\View\View;




class CheckOutController extends Controller
{


    public function showCheckoutForm():View
    {
        return view('cart.cardinfo');
    }
    public function showStatusSuccess():View
    {
        return view('status.success');
    }
    public function showStatusDanger():View
    {
        return view('status.danger');
    }






    public function checkout(Request $request)
    {   
        $user_name = $request->get('user_name');
        $name = $request->get('name');
        $card_no = $request->get('card_no');
        $expire_month = $request->get('expire_month');
        $expire_year = $request->get('expire_year');
        $cvc = $request->get('cvc');
        $user=Auth::user();
        $total = $this->calculateCartTotal();
        $cart = $this->getOrCreateCart();
        $basket = $this->getBasketItems();

    }




    private function getOrCreateCart(): Cart
    {

        $user = Auth::user();
        $cart = Cart::firstOrCreate(
            ['user_id' => $user->id],
            ['code' => Str::random(8)],
        );
        return $cart;
    }

    private function calculateCartTotal(): float
    {
        $total=0;
        $cart = $this->getOrCreateCart();
        $cartDetails = $cart->details;  
        foreach ($cartDetails as $detail) {
        $total += $detail->producttitlename->product_price * $detail->quantity;
        }
        return $total;
    }

    private function getBasketItems(): array
    {
        $basketItems = array();
        $cart = $this->getOrCreateCart();
        $cartDetails = $cart->details;  
        foreach ($cartDetails as $detail) {
            $item = new BasketItem();
            $item->setId($detail->producttitlename->id);
            $item->setName( $detail->producttitlename->product_title);
            $item->setCategory1($detail->producttitlename->product_category->parentCategories->product_category_name);
            $item->setCategory2($detail->producttitlename->product_category->product_category_name);
            $item->setPrice($detail->producttitlename->product_price);

            for($i=0; $i < $detail->quantity; $i++)
            {
                array_push($basketItems, $item);
            }
        }
        return $basketItems;
    }
}
