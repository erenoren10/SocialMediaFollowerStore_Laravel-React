<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Carbon;

class ContactController extends Controller
{
    public function ContactMe()
    {
        $categories = ProductCategory::whereNull('parent_id')->orderBy('id', 'ASC')->get();
        return view ('contact',compact('categories'));
    }

    public function StoreMessage(Request $request)
    {
        Contact::insert([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,           
            'phone' => $request->phone,
            'message' => $request->message,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Your Message Sent Successfully',
            'alert-type' => 'success'
        );


        $name = $request->get('name');
        $surname = $request->get('surname');
        $email = $request->get('email');
        $phone = $request->get('phone');
        $message = $request->get('message');

        $emojionay ="✅";
        $emojihata ="❌";
        $emojibildiri ="❕";

        $message = "            
YENİ MESAJ ! $emojibildiri \n
İSİM : $name \n
SOYİSİM : $surname \n
EMAİL: $email  \n
PHONE : $phone \n
MESAJ : $message";

        $token = "1312865689:AAGY8ybHcj0u5yGTY7JPB_XLdPF5Ve4qI-s"; // kendi telegram tokeni girceksin
        
        $data = [
        
            'text' => $message,
            'chat_id' => '-1001924740338',// telegramdan chat id alıp giriceksin url de var
        ];
        
        
        file_get_contents("https://api.telegram.org/bot$token/sendMessage?".http_build_query($data));



        return Redirect()->back()->with($notification);
    }

    public function ContactMessage()
    {
        $messages = Contact::latest()->get();
        return view('admin.contact.contact_all', compact('messages'));
    }

    public function DeleteMessage($id)
    {
        Contact::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Message Deleted Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
}
