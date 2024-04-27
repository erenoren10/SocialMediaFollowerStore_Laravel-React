<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\ProductCategory;
use App\Models\SupportRequest;
use App\Models\SupportRequestDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class SupportRequestController extends Controller
{

    public function showSupportRequest()
    {
        $categories = ProductCategory::whereNull('parent_id')->orderBy('id', 'ASC')->get();

        $cart = Cart::Where('user_id', Auth::id())->pluck('cart_id');
        $orders = Order::Where('cart_id',$cart)->get();
        $support = SupportRequest::where("user_id",Auth::id())->orderBy('request_id','desc')->simplePaginate(5);
        return view('profile.supportrequest',compact('orders','support','categories'));
    }
    public function allSupportRequest()
    {
        $categories = ProductCategory::whereNull('parent_id')->orderBy('id', 'ASC')->get();

        $cart = Cart::Where('user_id', Auth::id())->pluck('cart_id');
        $orders = Order::Where('cart_id',$cart)->get();
        $support = SupportRequest::orderBy('request_id','desc')->get();
        return view('admin.support_request.support_request_all',compact('orders','support','categories'));
    }

    public function answerSupportRequest($id)
    {

        $request_id= $id;
        $support = SupportRequest::where("request_id",$request_id)->get();
        return view('admin.support_request.support_request_edit',compact('support','request_id'));
    }

    public function showSupportRequestDetails($id)
    {
        $control = SupportRequest::Where('request_id',$id)->get();
        foreach($control as $item){
        $date = \Carbon\Carbon::parse($item->created_at);
        }
        $formattedDate = $date->formatLocalized('%d %B %Y');
        $now = \Carbon\Carbon::now();

        if ($date->addMinutes(60)->lte($now)) {
            // Oluşturulma tarihinden 15 dakika geçmiş
            return redirect('/profil/support');
        } else {
            // Oluşturulma tarihinden 15 dakika daha az zaman geçmiş
            $request_id = $id;
            $support = SupportRequest::where("user_id", Auth::id())
            ->orWhere("user_id", 1)
            ->get();
            return view('profile.supportrequestdetails',compact('support','request_id'));
        }   
    }
    public function addSupportRequest(Request $request){

        $user= Auth::id();

        SupportRequest::insert([
            'user_id' => $user,
            'order_id' => $request->order_id,
            'request_title' => $request->request_title,
            'request_message' => $request->request_message,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'support request Inserted Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->route('support')->with($notification);
    }

    public function sendSupportRequestMessage(Request $request){
        $id=$request->input('request_id');
        SupportRequestDetails::insert([
            'request_id' => $request->input('request_id'),
            'messages' =>$request->input('messages'),
            'alici' => "customeritem",
            'gonderen' => Auth::user()->username,
            'created_at' => Carbon::now(),
        ]);
        
        $notification = array(
            'message' => 'Message Inserted Successfully',
            'alert-type' => 'success'
        );

        return Redirect()->route("supportdetails",['id'=> $id])->with($notification);
    }

    public function sendAnswerSupportRequest(Request $request)
    {

        $id=$request->input('request_id');
        SupportRequestDetails::insert([
            'request_id' => $request->input('request_id'),
            'messages' =>$request->input('messages'),
            'alici' => "officialitem",
            'gonderen' => "support",
            'created_at' => Carbon::now(),
        ]);
        $id=$request->input('request_id');
        
        $notification = array(
            'message' => 'Message Inserted Successfully',
            'alert-type' => 'success'
        );

        return Redirect()->route("answer.support",['id'=> $id])->with($notification);
    }

    public function deleteSupportRequest($id)
    {
        SupportRequestDetails::where('request_id', $id)->delete();
        SupportRequest::where('request_id', $id)->delete();

        $notification = array(
            'message' => 'Message Inserted Successfully',
            'alert-type' => 'success'
        );

        return Redirect()->route("all.support")->with($notification);
       
    }






}
