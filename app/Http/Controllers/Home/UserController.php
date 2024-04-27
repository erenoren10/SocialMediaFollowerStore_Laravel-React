<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Balance;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function DeleteUser($id)
    {
        $user = User::findOrFail($id);
        $image = $user->profile_photo;
        unlink($image);

        User::findOrFail($id)->delete();

        $notification = array(
            'message' => 'User Deleted Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);

    }

    public function AllUser()
    {
        $users = User::where('id', Auth()->id())->with('child')->with('parent')->get();
        $user = User::latest()->get();
        $balance = Balance::latest()->get();
        return view('admin.users.user_all', compact('user','users'));
    }

    public function EditUser($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.user_edit', compact('user'));
    }

    public function UpdateUser(Request $request)
    {
        $user_id = $request->id;
        if ($request->file('profile_photo')) {
            $image = $request->file('profile_photo');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            \Nette\Utils\Image::make($image)->resize(430, 327)->save('upload/blogs/' . $name_gen);

            User::findOrFail($user_id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'username' => $request->username,
                'phone_number' => $request->phone_number,
                'user_parent_id' => $request->user_parent_id,
                'company_name' => $request->company_name,
                'tax_number' => $request->tax_number,
                'billing_adress' => $request->billing_adress,
            ]);
            $notification = array(
                'message' => 'User Updated Successfully with Image',
                'alert-type' => 'success'
            );
            return Redirect()->route('all.user')->with($notification);
        } else {
            User::findOrFail($user_id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'username' => $request->username,
                'phone_number' => $request->phone_number,
                'user_parent_id' => $request->user_parent_id,
                'company_name' => $request->company_name,
                'tax_number' => $request->tax_number,
                'billing_adress' => $request->billing_adress,
            ]);
            $notification = array(
                'message' => 'User Updated Successfully without Image',
                'alert-type' => 'success'
            );
            return Redirect()->route('all.user')->with($notification);
        }
    }
}
