<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\PopupNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class PopupController extends Controller
{ 
    public function DeletePopupNotification($id)
    {
        $popupnotification = PopupNotification::findOrFail($id);

        PopupNotification::findOrFail($id)->delete();

        $notification = array(
            'message' => 'PopupNotification Deleted Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);

    }
    public function AllPopupNotification()
    {
        $popupnotification = PopupNotification::latest()->get();
        return view('admin.popup_notification.popup_notification_all', compact('popupnotification'));
    }

    public function AddPopupNotification()
    {
        return view('admin.popup_notification.popup_notification_add');
    }

    public function StorePopupNotification(Request $request)
    {

        PopupNotification::insert([
            'popup_title' => $request->popup_title,
            'popup_description' => $request->popup_description,
            'discount_rate' => $request->discount_rate,
            'code' => $request->code,
            'validity_date' => $request->validity_date,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'PopupNotification Inserted Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->route('all.popupnotification')->with($notification);
    }

    public function EditPopupNotification($id)
    {
        $popupnotification = PopupNotification::findOrFail($id);
        return view('admin.popup_notification.popup_notification_edit', compact('popupnotification'));
    }

    public function UpdatePopupNotification(Request $request)
    {
        $popup_id = $request->id;

            PopupNotification::findOrFail($popup_id)->update([
                'popup_title' => $request->popup_title,
                'popup_description' => $request->popup_description,
                'discount_rate' => $request->discount_rate,
                'code' => $request->code,
                'validity_date' => $request->validity_date,
            ]);
            $notification = array(
                'message' => 'PopupNotification Updated Successfully without Image',
                'alert-type' => 'success'
            );
            return Redirect()->route('all.popupnotification')->with($notification);
    }

    public function PopupNotificationDetails($id)
    {
        $popupnotification = PopupNotification::findOrFail($id);
        $all_popupnotification = PopupNotification::latest()->limit(5)->get();
        return view('popupnotificationdetay', compact('popupnotification','all_popupnotification'));
    }

    public function HomePopupNotification()
    {
        $all_popupnotifications = PopupNotification::latest()->get();
        return view('popupnotification', compact('all_popupnotifications',));
    }
}
