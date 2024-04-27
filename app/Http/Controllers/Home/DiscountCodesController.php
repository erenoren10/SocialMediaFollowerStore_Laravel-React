<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\DiscountCodes;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DiscountCodesController extends Controller
{
    public function DeleteDiscountCodes($id)
    {
        $discountcodes = DiscountCodes::findOrFail($id);

        DiscountCodes::findOrFail($id)->delete();

        $notification = array(
            'message' => 'DiscountCodes Deleted Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);

    }
    public function AllDiscountCodes()
    {
        $discountcodes = DiscountCodes::latest()->get();
        return view('admin.discount_codes.discount_codes_all', compact('discountcodes'));
    }

    public function AddDiscountCodes()
    {
        return view('admin.discount_codes.discount_codes_add');
    }

    public function StoreDiscountCodes(Request $request)
    {

        DiscountCodes::insert([
            'category' => $request->category,
            'discount_code' => $request->discount_code,
            'discount_rate' => $request->discount_rate,
            'end_date' => $request->end_date,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'DiscountCodes Inserted Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->route('all.discountcodes')->with($notification);
    }

    public function EditDiscountCodes($id)
    {
        $discountcodes = DiscountCodes::findOrFail($id);
        return view('admin.discount_codes.discount_codes_edit', compact('discountcodes'));
    }

    public function UpdateDiscountCodes(Request $request)
    {
        $discount_id = $request->id;

            DiscountCodes::findOrFail($discount_id)->update([
                'category' => $request->category,
                'discount_code' => $request->discount_code,
                'discount_rate' => $request->discount_rate,
                'end_date' => $request->end_date
            ]);
            $notification = array(
                'message' => 'DiscountCodes Updated Successfully without Image',
                'alert-type' => 'success'
            );
            return Redirect()->route('all.discountcodes')->with($notification);
    }

    public function DiscountCodesDetails($id)
    {
        $discountcodes = DiscountCodes::findOrFail($id);
        $all_discountcodes = DiscountCodes::latest()->limit(5)->get();
        return view('discountcodesdetay', compact('discountcodes','all_discountcodes'));
    }

    public function HomeDiscountCodes()
    {
        $all_discountcodess = DiscountCodes::latest()->get();
        return view('discountcodes', compact('all_discountcodess',));
    }
}
