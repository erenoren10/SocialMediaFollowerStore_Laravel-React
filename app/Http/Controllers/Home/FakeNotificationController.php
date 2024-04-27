<?php

namespace App\Http\Controllers\Home;

use App\Models\FakeNotification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class FakeNotificationController extends Controller
{
    public function DeleteFakeNotification($id)
    {
        $fakenotification = FakeNotification::findOrFail($id);

        FakeNotification::findOrFail($id)->delete();

        $notification = array(
            'message' => 'FakeNotification Deleted Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);

    }
    public function AllFakeNotification()
    {
        $fakenotification = FakeNotification::latest()->get();
        return view('admin.fake_notification.fake_notification_all', compact('fakenotification'));
    }

    public function AddFakeNotification()
    {
        return view('admin.fake_notification.fake_notification_add');
    }

    public function StoreFakeNotification(Request $request)
    {

        FakeNotification::insert([
            'fake_title' => $request->fake_title,
            'fake_description' => $request->fake_description,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'FakeNotification Inserted Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->route('all.fakenotification')->with($notification);
    }

    public function EditFakeNotification($id)
    {
        $fakenotification = FakeNotification::findOrFail($id);
        return view('admin.fake_notification.fake_notification_edit', compact('fakenotification'));
    }

    public function UpdateFakeNotification(Request $request)
    {
        $fake_id = $request->id;

            FakeNotification::findOrFail($fake_id)->update([
                'fake_title' => $request->fake_title,
                'fake_description' => $request->fake_description,
            ]);
            $notification = array(
                'message' => 'FakeNotification Updated Successfully without Image',
                'alert-type' => 'success'
            );
            return Redirect()->route('all.fakenotification')->with($notification);
    }

    public function FakeNotificationDetails($id)
    {
        $fakenotification = FakeNotification::findOrFail($id);
        $all_fakenotification = FakeNotification::latest()->limit(5)->get();
        return view('fakenotificationdetay', compact('fakenotification','all_fakenotification'));
    }

    public function HomeFakeNotification()
    {
        $all_fakenotifications = FakeNotification::latest()->get();
        return view('fakenotification', compact('all_fakenotifications',));
    }
}
