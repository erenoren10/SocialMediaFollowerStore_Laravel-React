<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{


    public function DeleteOrder($id)
    {

        OrderDetails::findOrFail($id)->delete();
      
        $notification = array(
            'message' => 'Order Deleted Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);

    }
    public function AllOrder()
    {
        $order = Order::latest()->get();
        return view('admin.orders.orders_all', compact('order'));
    }

    public function EditOrder($id)
    {
        $order = OrderDetails::findorfail($id);

        return view('admin.orders.orders_edit', compact('order'));
    }

    public function UpdateOrder(Request $request)
    {
        $order_id = $request->id;

            OrderDetails::findOrFail($order_id)->update([
                'order_id'=>$request->order_id,
                'platform_username' => $request->platform_username,
                'product_id' => $request->product_id,
                'quantity' => $request->quantity,
            ]);
            $notification = array(
                'message' => 'Order Updated Successfully without Image',
                'alert-type' => 'success'
            );
            $name = $request->get('a_name');
            $date = Carbon::now();
            $email = $request->get('a_email');
            $phone_number = $request->get('a_phone_number');
            $code = $request->get('a_code');
            $urun = Product::where('id',$request->product_id)->get();
            $username = $request->platform_username;
            $itemsjson = $urun;
            $itemsjson2 = html_entity_decode($itemsjson);
            $itemsjson3 = json_decode($itemsjson2, true);
            $itemsjson4 = json_encode($itemsjson3, JSON_UNESCAPED_UNICODE);


            $isim = $urun[0]->product_title;
            $tur1 = $urun[0]->Product_category->parentCategories->product_category_name;
            $tur2 = $urun[0]->Product_category->product_category_name;
            $fiyat = $urun[0]->product_price;


    
  
            $itemsText = "Ürün: $isim ($tur1 - $tur2) - Fiyat: $fiyat TL \n ----------------------------\n";
        


    
    
    
            $emojionay = "✅";
            $emojihata = "❌";
            $emojibildiri = "❕";
    
            $message = "            
ÖDEME BİLDİRİMİ GÜNCELLEMESİ! $emojibildiri\n
EMAİL: $email \n
TELEFON : $phone_number \n
İSİM : $name \n
TARİH : $date \n
KOD: $code \n
Kullanıcı Adı: $username\n 
ÜRÜNLER: \n$itemsText


";
    
    
    
            $token = "1312865689:AAGY8ybHcj0u5yGTY7JPB_XLdPF5Ve4qI-s"; // kendi telegram tokeni girceksin
    
            $data = [
    
                'text' => $message,
                'chat_id' => '-1001924740338', // telegramdan chat id alıp giriceksin url de var
            ];
    
    
            file_get_contents("https://api.telegram.org/bot$token/sendMessage?" . http_build_query($data));





    
                
                $product = $request->product_id;
                $quantity = $request->quantity;
                $username = $request->platform_username;
            
                $orderDetails = new OrderDetails([
                    'order_id' =>$request->order_id,
                    'product_id' => $product, 
                    'quantity' => $quantity,   
                    'platform_username' => $username,
                ]);
                
                $orderDetails->save();
            
    
            return Redirect()->route('all.order')->with($notification);
    }

    public function OrderDetails($id)
    {
        $order = OrderDetails::findOrFail($id);
        $all_order = OrderDetails::latest()->limit(5)->get();
        return view('orderdetay', compact('order','all_order'));
    }

    public function HomeOrders()
    {
        $all_order = OrderDetails::latest()->get();
        return view('order', compact('all_order'));
    }

    public static function getOrderItemCount()
    {
        $cart = Cart::Where('user_id', Auth::id())->pluck('cart_id')->all();
        
        $order = Order::where('cart_id', $cart)->pluck('order_id')->all();
        

        if ($order) {
            $i=0;
            $totalItemsInCart=0;
            foreach($order as $orders){
                $i++;
            $totalItems = OrderDetails::Where('order_id',$orders)->count();
            $totalItemsInCart +=$totalItems;
            }
        } else {
            $totalItemsInCart = 0;
        }

        return $totalItemsInCart;
    }

}
