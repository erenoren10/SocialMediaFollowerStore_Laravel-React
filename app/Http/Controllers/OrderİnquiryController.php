<?php

namespace App\Http\Controllers;

use App\Models\HappyCustomer;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\ProductCategory;
use App\Models\sss;
use Illuminate\Http\Request;

class OrderİnquiryController extends Controller
{
    public function showOrderInquiry()
    {
        $categories = ProductCategory::whereNull('parent_id')->orderBy('id', 'ASC')->get();
        $sss1 = sss::orderBy('id', 'asc')->take(5)->get();
        $sss2 = sss::orderBy('id', 'desc')->take(5)->get();
        $happycustomer = HappyCustomer::orderBy('id','asc')->get();
        return view('orderinquiry',compact('sss1','sss2','happycustomer','categories'));
    }
    public function showOrderInquiryResult(Request $request)
    {   

        $inquiry= $request->input('siparis');
        if($inquiry[0] === '#'){
        $inquiry = substr($inquiry, 1);
        }
        $categories = ProductCategory::whereNull('parent_id')->orderBy('id', 'ASC')->get();
        if(OrderDetails::where('order_details_id',$inquiry)->first()){
            $order = OrderDetails::where('order_details_id',$inquiry)->get();
            $sss1 = sss::orderBy('id', 'asc')->take(5)->get();
            $sss2 = sss::orderBy('id', 'desc')->take(5)->get();
            $happycustomer = HappyCustomer::orderBy('id','asc')->get();
            return view('orderinquiryresult',compact('inquiry','order','sss1','sss2','happycustomer','categories'));
            
        }else{
            $notification = array(
                'message' => 'Sipariş Numarası Bulunamadı',
                'alert-type' => 'success'
            );
            return redirect('orderinquiry')->with($notification);
        }

    }

}
