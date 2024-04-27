<?php

namespace App\Http\Controllers\Home;

use App\Models\Balance;
use App\Models\bank;
use App\Models\Cart;
use App\Models\CartDetails;
use App\Models\DiscountCodes;
use App\Models\Invoice;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CartController extends Controller
{
    public function ordercheck1()
    {
        $details = CartDetails::latest()->get();
        $cart = $this->getOrCreateCart();
        $totalPrice = 0;
        $categories = ProductCategory::whereNull('parent_id')->orderBy('id', 'ASC')->get();


        if (Auth::check()) {
            $userId = Auth::user()->id;
            $sepetId = Cart::where('user_id', Auth::id())->pluck('cart_id')->first();
            $sepetdetayId = CartDetails::Where('cart_id', $sepetId)->pluck('product_id')->first();
            $urunaltkategoriId = Product::Where('id', $sepetdetayId)->pluck('product_category_id')->first();
            $uruncategoryId = ProductCategory::where('id', $urunaltkategoriId)->pluck('parent_id')->first();
            $parent = ProductCategory::where('parent_id', $uruncategoryId)->pluck('id');
            $randomproduct = collect();
            for ($i = 0; $parent->count() > $i; $i++) {
                $mergedProducts = Product::where('product_category_id', $parent[$i])->inRandomOrder()->get();
                $randomproduct = $randomproduct->merge($mergedProducts);
            }

            $cart_ids = DB::table('carts')
                ->where('user_id', $userId)
                ->pluck('cart_id')
                ->toArray();
            return view('cart.mycart', compact('details', 'cart', 'totalPrice', 'randomproduct', 'cart_ids','categories'));
        } else {
            $userId = session()->getId();
            $sepetId = Cart::where('session_id', $userId)->pluck('cart_id')->first();
            $sepetdetayId = CartDetails::Where('cart_id', $sepetId)->pluck('product_id')->first();
            $urunaltkategoriId = Product::Where('id', $sepetdetayId)->pluck('product_category_id')->first();
            $uruncategoryId = ProductCategory::where('id', $urunaltkategoriId)->pluck('parent_id')->first();
            $parent = ProductCategory::where('parent_id', $uruncategoryId)->pluck('id');
            $randomproduct = collect();
            for ($i = 0; $parent->count() > $i; $i++) {
                $mergedProducts = Product::where('product_category_id', $parent[$i])->inRandomOrder()->get();
                $randomproduct = $randomproduct->merge($mergedProducts);
            }

            $sessionId = session()->getId();
            $cart_idunk = DB::table('carts')
                ->where('session_id', $sessionId)
                ->pluck('cart_id');
            return view('cart.mycart', compact('details', 'cart', 'totalPrice', 'randomproduct', 'cart_idunk','categories'));
        }

    }

    public function ordercheck2()
    {
        $details = CartDetails::latest()->get();
        $cart = $this->getOrCreateCart();
        $categories = ProductCategory::whereNull('parent_id')->orderBy('id', 'ASC')->get();

        return view('cart.createorder', compact('cart','details','categories'));
    }
    public function ordercheck3()
    {
        $details = CartDetails::latest()->get();
        $cart = $this->getOrCreateCart();
        $totalPrice = 0;
        $categories = ProductCategory::whereNull('parent_id')->orderBy('id', 'ASC')->get();


        if (Auth::check()) {
            $userId = Auth::user()->id;
            $sepetId = Cart::where('user_id', Auth::id())->pluck('cart_id')->first();
            $sepetdetayId = CartDetails::Where('cart_id', $sepetId)->pluck('product_id')->first();
            $urunaltkategoriId = Product::Where('id', $sepetdetayId)->pluck('product_category_id')->first();
            $uruncategoryId = ProductCategory::where('id', $urunaltkategoriId)->pluck('parent_id')->first();
            $parent = ProductCategory::where('parent_id', $uruncategoryId)->pluck('id');
            $randomproduct = collect();
            for ($i = 0; $parent->count() > $i; $i++) {
                $mergedProducts = Product::where('product_category_id', $parent[$i])->inRandomOrder()->take(1)->get();
                $randomproduct = $randomproduct->merge($mergedProducts);
            }

            $cart_ids = DB::table('carts')
                ->where('user_id', $userId)
                ->pluck('cart_id')
                ->toArray();
            return view('cart.ordercompletion', compact('details', 'cart', 'totalPrice', 'randomproduct', 'cart_ids','categories'));
        } else {
            $userId = session()->getId();
            $sepetId = Cart::where('session_id', $userId)->pluck('cart_id')->first();
            $sepetdetayId = CartDetails::Where('cart_id', $sepetId)->pluck('product_id')->first();
            $urunaltkategoriId = Product::Where('id', $sepetdetayId)->pluck('product_category_id')->first();
            $uruncategoryId = ProductCategory::where('id', $urunaltkategoriId)->pluck('parent_id')->first();
            $parent = ProductCategory::where('parent_id', $uruncategoryId)->pluck('id');
            $randomproduct = collect();
            for ($i = 0; $parent->count() > $i; $i++) {
                $mergedProducts = Product::where('product_category_id', $parent[$i])->inRandomOrder()->take(1)->get();
                $randomproduct = $randomproduct->merge($mergedProducts);
            }

            $sessionId = session()->getId();
            $cart_idunk = DB::table('carts')
                ->where('session_id', $sessionId)
                ->pluck('cart_id');
            return view('cart.ordercompletion', compact('details', 'cart', 'totalPrice', 'randomproduct', 'cart_idunk','categories'));
        }

    }

    public function cardcc()
    {
        $details = CartDetails::latest()->get();
        $cart = $this->getOrCreateCart();
        $categories = ProductCategory::whereNull('parent_id')->orderBy('id', 'ASC')->get();


        return view('cart.card_cc', compact('details','cart'));
    }
    public function cardmobile()
    {
        $details = CartDetails::latest()->get();
        $cart = $this->getOrCreateCart();
        $categories = ProductCategory::whereNull('parent_id')->orderBy('id', 'ASC')->get();


        return view('cart.card_mobile', compact('details','cart','categories'));
    }
    public function cardccpaytr()
    {
        $details = CartDetails::latest()->get();
        $cart = $this->getOrCreateCart();
        $categories = ProductCategory::whereNull('parent_id')->orderBy('id', 'ASC')->get();


        return view('cart.card_cc', compact('details','cart','categories'));
    }

    public function cardeft()
    {
        $details = CartDetails::latest()->get();
        $cart = $this->getOrCreateCart();
        $bank = bank::orderBy('id', 'asc')->latest()->get();

        return view('cart.card_eft', compact('details','cart','categories','bank'));
    }

    public function cardbalance()
    {
        if (Auth::check()) {
            $kullanici = Auth::user();
            if (!empty($_GET['totalprice'])) {
                $totalprice = $_GET['totalprice'];
            } else {
                $totalprice = "Hesaplanamadı Tekrar deneyin";
            }
            foreach ($kullanici->balances as $item) {
                $balance = $item->balance;
            }
            if ($balance > $totalprice) {

                $name = $kullanici->name;
                $price = $totalprice;
                $date = Carbon::now();
                $email = $kullanici->email;
                $vergiNo = $kullanici->tax_number;
                $vergiAdres = $kullanici->billing_adress;
                $faturaAdres = $kullanici->company_name;
                $phone_number = $kullanici->phone_number;



                $user_id = $kullanici->id;
                $bakiye = Balance::where('user_id', $user_id)->first();

                if ($bakiye) {
                    $newbalance = floatval($balance);
                    $newprice = floatval($totalprice);
                    $newBalanceValue = ($newbalance - $newprice); // Yeni bakiye değeri
                    $bakiye->update(['balance' => $newBalanceValue]);


                    $bakiye->save();
                }


                $itemsjson = $this->getBasketItems();
                $itemsjson2 = html_entity_decode($itemsjson);
                $itemsjson3 = json_decode($itemsjson2, true);
                $itemsjson4 = json_encode($itemsjson3, JSON_UNESCAPED_UNICODE);
                $itemsText = '';
                $i = 1;
                foreach ($itemsjson3 as $items) {

                    $isim = $items[0];
                    $tur = $items[1];
                    $fiyat = $items[2];
                    $detay = $items[3];


                    $itemsText .= "$i.Ürün: $isim ($tur) - Fiyat: $fiyat TL - Kullanıcı adı: $detay\n ----------------------------\n";
                    $i++;
                }



                $emojionay = "✅";
                $emojihata = "❌";
                $emojibildiri = "❕";


                $message = "            
YENİ ÖDEME BİLDİRİMİ (KULLANICI - Bakiye)! $emojionay\n
EMAİL: $email \n
TELEFON : $phone_number \n
İSİM : $name \n
FİYAT: $price TL \n
TARİH : $date \n
VERGİ NO : $vergiNo \n
VERGİ ADRESİ : $vergiAdres \n
FATURA ADRESİ : $faturaAdres \n
ÜRÜNLER: \n$itemsText";

                $token = "1312865689:AAGY8ybHcj0u5yGTY7JPB_XLdPF5Ve4qI-s"; // kendi telegram tokeni girceksin

                $data = [

                    'text' => $message,
                    'chat_id' => '-1001924740338', // telegramdan chat id alıp giriceksin url de var
                ];


                file_get_contents("https://api.telegram.org/bot$token/sendMessage?" . http_build_query($data));



                $cart = $this->getOrCreateCart();


                $order = new Order([
                    "cart_id" => $cart->cart_id,
                    "code" => $cart->code,
                ]);
                $order->save();
                $carts = $cart->details;

                $l = 0;

                foreach ($carts as $items) {
                    $product = $carts[$l]->product_id;
                    $quantity = $carts[$l]->quantity;
                    $username = $carts[$l]->platform_username;

                    $orderDetails = new OrderDetails([
                        'order_id' => $order->order_id,
                        'product_id' => $product,
                        'quantity' => $quantity,
                        'platform_username' => $username,
                        'adSoyad' => $name,
                        'mail' => $email,
                        'telefon' => $phone_number,
                        'vergiNo' => $vergiNo,
                        'VergiDaire' => $vergiAdres,
                        'FaturaAdresi' => $faturaAdres,
                    ]);
                    $l++;
                    $orderDetails->save();
                }

                $userId = Auth::user()->id;
                $cart_ids = DB::table('carts')
                    ->where('user_id', $userId)
                    ->pluck('cart_id')
                    ->toArray();

                $details = CartDetails::where("cart_id", $cart_ids[0])->latest()->get();
                foreach ($details as $detail) {
                    $detail->delete();
                }




                return view('status.success');




            } else {
                return redirect('/checkout/danger');
            }
        } else {
            return redirect('/checkout/danger');
        }


    }

    public function getOrderInfo(Request $request)
    {
        $name = $request->get('o_ad_soyad');
        $bank = $request->get('o_banka');
        $price = $request->get('o_price');
        $date = $request->get('o_date');
        $email = $request->get('o_email');
        $vergiNo = $request->get('o_vergino');
        $vergiAdres = $request->get('o_vergiadres');
        $faturaAdres = $request->get('o_faturaadres');
        $phone_number = $request->get('o_phone_number');
        $description = $request->get('o_description');


        if (is_null($description)) {
            $description = "YOK";
        }
        $code = $request->get('o_code');
        $itemsjson = $this->getBasketItems();
        $itemsjson2 = html_entity_decode($itemsjson);
        $itemsjson3 = json_decode($itemsjson2, true);
        $itemsjson4 = json_encode($itemsjson3, JSON_UNESCAPED_UNICODE);
        $itemsText = '';
        $i = 1;
        foreach ($itemsjson3 as $items) {

            $isim = $items[0];
            $tur = $items[1];
            $fiyat = $items[2];
            $detay = $items[3];


            $itemsText .= "$i.Ürün: $isim ($tur) - Fiyat: $fiyat TL - Kullanıcı adı: $detay\n ----------------------------\n";
            $i++;
        }



        $emojionay = "✅";
        $emojihata = "❌";
        $emojibildiri = "❕";

        if (Auth::check()) {
            $message = "            
YENİ ÖDEME BİLDİRİMİ (KULLANICI)! $emojionay\n
EMAİL: $email \n
TELEFON : $phone_number \n
İSİM : $name \n
BANKA : $bank Bankası\n
FİYAT: $price TL \n
TARİH : $date \n
VERGİ NO : $vergiNo \n
VERGİ ADRESİ : $vergiAdres \n
FATURA ADRESİ : $faturaAdres \n
AÇIKLAMA : $description\n
KOD: $code \n
ÜRÜNLER: \n$itemsText";
        } else {
            $message = "            
YENİ ÖDEME BİLDİRİMİ (ANONİM)! $emojionay\n
EMAİL: $email \n
TELEFON : $phone_number \n
İSİM : $name \n
BANKA : $bank Bankası\n
FİYAT: $price TL \n
TARİH : $date \n
VERGİ NO : $vergiNo \n
VERGİ ADRESİ : $vergiAdres \n
FATURA ADRESİ : $faturaAdres \n
AÇIKLAMA : $description\n
KOD: $code \n
ÜRÜNLER: \n$itemsText";
        }



        $token = "1312865689:AAGY8ybHcj0u5yGTY7JPB_XLdPF5Ve4qI-s"; // kendi telegram tokeni girceksin

        $data = [

            'text' => $message,
            'chat_id' => '-1001924740338', // telegramdan chat id alıp giriceksin url de var
        ];


        file_get_contents("https://api.telegram.org/bot$token/sendMessage?" . http_build_query($data));



        $cart = $this->getOrCreateCart();


        $order = new Order([
            "cart_id" => $cart->cart_id,
            "code" => $cart->code,
        ]);
        $order->save();
        $carts = $cart->details;

        $l = 0;

        foreach ($carts as $items) {
            $product = $carts[$l]->product_id;
            $quantity = $carts[$l]->quantity;
            $username = $carts[$l]->platform_username;

            $orderDetails = new OrderDetails([
                'order_id' => $order->order_id,
                'product_id' => $product,
                'quantity' => $quantity,
                'platform_username' => $username,
                'adSoyad' => $name,
                'mail' => $email,
                'telefon' => $phone_number,
                'vergiNo' => $vergiNo,
                'VergiDaire' => $vergiAdres,
                'FaturaAdresi' => $faturaAdres,
            ]);
            $l++;
            $orderDetails->save();
        }

        if (Auth::check()) {
            $userId = Auth::user()->id;
            $cart_ids = DB::table('carts')
                ->where('user_id', $userId)
                ->pluck('cart_id')
                ->toArray();
        } else {
            $sessionId = session()->getId();
            $cart_idunk = DB::table('carts')
                ->where('session_id', $sessionId)
                ->pluck('cart_id');
        }


        if (Auth::check()) {
            $details = CartDetails::where("cart_id", $cart_ids[0])->latest()->get();
            foreach ($details as $detail) {
                $detail->delete();
            }
        } else {
            $details = CartDetails::where("cart_id", $cart_idunk[0])->latest()->get();
            foreach ($details as $detail) {
                $detail->delete();
            }

        }



        return view('status.success');
    }

    public function add(Product $product, int $quantity = 1)
    {
        $cart = $this->getOrCreateCart();
        $details = new CartDetails(
            [
                "cart_id" => $cart->cart_id,
                "product_id" => $product->id,
                "quantity" => $quantity,
            ],
        );
        $details->save();
        return redirect("/cartcheck/product");
    }

    public function remove(CartDetails $cartDetails): RedirectResponse
    {
        $cartDetails->delete();
        return redirect("/mycart");
    }

    public static function getCartItemCount()
    {

        if (Auth::check()) {
            $userId = Auth::user()->id;
            $cart_ids = DB::table('carts')
                ->where('user_id', $userId)
                ->pluck('cart_id')
                ->toArray();
        } else {
            $sessionId = session()->getId();
            $cart_idunk = DB::table('carts')
                ->where('session_id', $sessionId)
                ->pluck('cart_id');
        }

        if (Auth::check()) {
            $user = Auth::user();
            $cart = Cart::where('user_id', $user->id)->first();

            if ($cart) {
                $totalItemsInCart = CartDetails::where('cart_id', $cart_ids[0])->count();

            } else {
                $totalItemsInCart = 0;
            }
        } else {
            $sessionId = session()->getId();
            $cart = Cart::where('session_id', $sessionId)->first();
            if ($cart) {
                $totalItemsInCart = CartDetails::where('cart_id', $cart_idunk[0])->count();

            } else {
                $totalItemsInCart = 0;
            }

        }

        return $totalItemsInCart;
    }

    public function updatePlatformUsername(Request $request)
    {
        $cartDetailId = $request->input('cart_detail_id');
        $platformUsername = $request->input('platform_username');
        $cartDetail = CartDetails::find($cartDetailId);
        if ($cartDetail) {
            $cartDetail->platform_username = $platformUsername;
            $cartDetail->save();
            return response()->json(['success' => true]);

        }

        return response()->json(['success' => false, 'message' => 'Cart detail not found.']);
    }

    public function applyDiscount(Request $request)
    {
        $code = $request->input('coupon_code');
        if (DiscountCodes::where('discount_code', $code)->first()) {
            $discount = DiscountCodes::where('discount_code', $code)->first();
            $o_tutar = $this->calculateCartTotal();
            $newprice = $o_tutar - (($o_tutar * $discount->discount_rate) / 100);
            $notification = array(
                'message' => 'İndirim Kodu Uygulandı',
                'alert-type' => 'success'
            );
            return redirect("ordercheck/completion?newprice={$newprice}")->with($notification);
        } else {
            $notification = array(
                'message' => 'İndirim Kodunun süresi geçmiş yada Kullanılmıyor',
                'alert-type' => 'danger'
            );
            return redirect("ordercheck/completion")->with($notification)->with('notificationTimeout', 5);
            ;
        }
    }


    /**
     * @return Cart
     */
    private function getOrCreateCart(): Cart
    {
        $random = Str::random(8);

        if (Auth::check()) {
            $user = Auth::user();
            $cart = Cart::firstOrCreate(
                ['user_id' => $user->id],
                ['code' => $random],
            );
        } else {
            $sessionId = session()->getId();
            if ($sessionId) {
                $cart = Cart::firstOrCreate(
                    ['session_id' => $sessionId],
                    ['code' => $random],
                );
            }
        }

        return $cart;
    }

    private function calculateCartTotal(): float
    {
        $total = 0;
        $cart = $this->getOrCreateCart();
        $cartDetails = $cart->details;
        foreach ($cartDetails as $detail) {
            $total += $detail->producttitlename->product_price * $detail->quantity;
        }
        return $total;
    }

    private function getBasketItems()
    {

        $basketItems = array();
        $cart = $this->getOrCreateCart();
        $cartDetails = $cart->details;
        foreach ($cartDetails as $detail) {
            $parentCategory = $detail->producttitlename->product_category->parentCategories->product_category_name;
            $subCategory = $detail->producttitlename->product_category->product_category_name;

            $categoryCombined = $parentCategory . ' - ' . $subCategory;
            for ($i = 0; $i < $detail->quantity; $i++) {
                $itemData[] = array(
                    $detail->producttitlename->product_title,
                    $categoryCombined,
                    $detail->producttitlename->product_price,
                    $detail->platform_username
                );
                $basketItems = htmlentities(json_encode($itemData));
            }
        }
        return $basketItems;
    }



}