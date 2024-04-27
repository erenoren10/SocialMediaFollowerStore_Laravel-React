<?php

namespace App\Http\Controllers;

use App\Models\HappyCustomer;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class HappyCustomerController extends Controller
{
    public function DeleteHappyCustomer($id)
    {
        $happycustomer = HappyCustomer::findOrFail($id);

        HappyCustomer::findOrFail($id)->delete();

        $notification = array(
            'message' => 'HappyCustomer Deleted Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);

    }
    public function Allhappycustomer()
    {
        $happycustomer = HappyCustomer::latest()->get();
        return view('admin.happy_customer.happy_customer_all', compact('happycustomer'));
    }

    public function Addhappycustomer()
    {
        return view('admin.happy_customer.happy_customer_add');
    }

    public function Storehappycustomer(Request $request)
    {

        HappyCustomer::insert([
            'customer_name' => $request->customer_name,
            'customer_job' => $request->customer_job,
            'customer_comments' => $request->customer_comments,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'HappyCustomer Inserted Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->route('all.happycustomer')->with($notification);
    }

    public function EditHappyCustomer($id)
    {
        $happycustomer = HappyCustomer::findOrFail($id);
        return view('admin.happy_customer.happy_customer_edit', compact('happycustomer'));
    }

    public function UpdateHappyCustomer(Request $request)
    {
        $happycustomer_id = $request->id;

            HappyCustomer::findOrFail($happycustomer_id)->update([
                'customer_name' => $request->customer_name,
                'customer_job' => $request->customer_job,
                'customer_comments' => $request->customer_comments,
            ]);
            $notification = array(
                'message' => 'HappyCustomer Updated Successfully without Image',
                'alert-type' => 'success'
            );
            return Redirect()->route('all.happycustomer')->with($notification);
    }

    public function HappyCustomerDetails($id)
    {
        $happycustomer = HappyCustomer::findOrFail($id);
        $all_happycustomer = HappyCustomer::latest()->limit(5)->get();
        return view('happycustomerdetay', compact('happycustomer','all_happycustomer'));
    }

    public function HomeHappyCustomer()
    {
        $all_happycustomer = HappyCustomer::latest()->get();
        return view('happycustomer', compact('all_happycustomer',));
    }
    
}
